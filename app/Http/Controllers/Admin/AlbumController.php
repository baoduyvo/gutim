<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Album\StoreRequest;
use App\Models\Album;
use App\Models\Gym;
use App\Models\Images;
use App\Rules\GymIdRule;
use App\Rules\NameRule;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::join('gym as g', 'album.gym_id', '=', 'g.id')
            ->select('album.name as name_album', 'album.id as id_album', 'album.*', 'g.*')
            ->get();

        return view('admin.modules.album.index', [
            'albums' => $albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gyms = Gym::get();
        return view('admin.modules.album.create', [
            'gyms' => $gyms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album = new Album();
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
            'gym_id' => [new GymIdRule()],
            'images' => 'required',
        ], [
            'name.required' => 'Please Enter Name',
            'status.required' => 'Please Enter Status',
            'images.required' => 'Please Enter Images',
        ]);

        $album->name = $request->name;
        $album->status = $request->status;
        $album->gym_id = $request->gym_id;

        $album->save();

        $files = $request->file('images');

        if (count($files) > 0) {
            foreach ($files as $file) {
                $fileName = $this->generateFileName($file->getClientOriginalName());

                $images = new Images();
                $images->image = $fileName;
                $images->album_id = $album->id;

                $images->save();

                $file->move(public_path('uploads/album/'), $fileName);
            }
        }

        return redirect()->route('admin.album.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $albums = Album::findOrFail($id);

        $images = Images::where('album_id', $albums->id)->get();

        // for ($i = 0; $i < count($images); $i++) {
        //     print_r($images[$i]->image);
        // }
        return view('admin.modules.album.detail', [
            'images' => $images
        ]);
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
        $album = Album::findOrFail($id);

        $images = Images::where('album_id', $album->id)->get();

        if (count($images) > 0) {
            foreach ($images as $image) {
                $file_old_url = public_path('uploads/album/' . $image->image);

                if ($file_old_url) {
                    unlink($file_old_url);
                }
            }
        }
        $album->delete();

        return redirect()->route('admin.album.index');
    }

    function generateFileName($fileName)
    {
        $lastIndex = strrpos($fileName, '.');
        $ext = substr($fileName, $lastIndex);
        return uniqid() . $ext;
    }
}
