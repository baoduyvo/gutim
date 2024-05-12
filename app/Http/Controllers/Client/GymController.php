<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Comments;
use App\Models\Images;
use App\Models\Sub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\New_;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function comment(Request $request)
    {
        $validator = $request->post('description');
        $validator = Validator::make($request->all(), [
            'description' => 'required'
        ], [
            'description.required' => 'Please Enter Message'
        ]);
        if ($validator->passes()) {
            $comment = new Comments;

            $comment->email = $request->session()->get('email');
            $comment->full_name = $request->session()->get('username');
            $comment->description = $request->post('description');
            $comment->status = 0;
            $comment->user_id = $request->session()->get('id');
            $comment->gym_id = $request->post('gym_id');

            $comment->save();

            $comments = Comments::where('status', 0)->orWhere('status', 1)->where('gym_id', $request->post('gym_id'))->orderBy('created_at', 'DESC')->get();

            return response()->json(array('data' => $comments), 200);
        }


        return response()->json(array('error' => $validator->errors()->first()), 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $services = Sub::join('gym as g', 'sub.gym_id', '=', 'g.id')
            ->join('service as s', 'sub.service_id', '=', 's.id')
            ->where('sub.gym_id', $id)
            ->select('s.*')
            ->get();

        $nameAlbums = Album::where('album.gym_id', $id)->get();

        $images_gym_ids = Images::where('album_id', function ($query) use ($id) {
            $query->select('id')
                ->from((new Album)->getTable())
                ->where('gym_id', '=', $id)
                ->limit(1);
        })->get();

        $comments = Comments::where('status', 0)->orWhere('status', 1)->where('gym_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('Client.pages.gym.index', [
            'services' => $services,
            'nameAlbums' => $nameAlbums,
            'images_gym_ids' => $images_gym_ids,
            'id' => $id,
            'comments' => $comments
        ]);
    }

    public function change(Request $request)
    {
        $id = $request->get('albumId');

        $images_gym_ids = Images::where('images.album_id', $id)->get();

        return response()->json(array('images_gym_ids' => $images_gym_ids), 200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
