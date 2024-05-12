<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gym\StoreRequest;
use App\Http\Requests\Admin\Gym\UpdateRequest;
use App\Models\Gym;
use App\Models\Service;
use App\Models\Sub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gyms = Gym::paginate(3);

        $subs = Sub::join('gym as g', 'sub.gym_id', '=', 'g.id')
            ->join('service as s', 'sub.service_id', '=', 's.id')
            ->select('sub.*', 'g.*', 's.*')
            ->get();

        return view('admin.modules.gym.index', [
            'gyms' => $gyms,
            'subs' => $subs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::get();

        return view('admin.modules.gym.create', [
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $gym = new Gym();
        $gym->name = $request->name;
        $gym->phone = $request->phone;
        $gym->address = $request->address;

        $gym->save();

        if ($request->services && is_array($request->services)) {
            foreach ($request->services as $service_id) {
                $subs = new Sub();
                $subs->service_id = $service_id;
                $subs->gym_id = $gym->id;
                $subs->save();
            }
        }

        return redirect()->route('admin.gym.index')->with('success', 'Create Gym Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gym = Gym::findOrFail($id);

        $services = Service::get();

        $subs = Sub::where('gym_id', $gym->id)->get();

        return view('admin.modules.gym.edit', [
            'gym' => $gym,
            'services' => $services,
            'subs' => $subs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $gym = Gym::findOrFail($id);

        $gym->name = $request->name;
        $gym->phone = $request->phone;
        $gym->address = $request->address;

        $gym->save();

        if (isset($request->services)) {

            Sub::where('gym_id', $gym->id)->delete();

            if ($request->services && is_array($request->services)) {
                foreach ($request->services as $service_id) {
                    $subs = new Sub();
                    $subs->service_id = $service_id;
                    $subs->gym_id = $gym->id;
                    $subs->save();
                }
            }
        }

        return redirect()->route('admin.gym.index')->with('success', 'Update Gym Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gym = Gym::findOrFail($id);

        $gym->delete();

        return redirect()->route('admin.gym.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $subs = Sub::join('gym as g', 'sub.gym_id', '=', 'g.id')
            ->join('service as s', 'sub.service_id', '=', 's.id')
            ->select('sub.*', 'g.*', 's.*')
            ->get();

        $gyms = Gym::where('name', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->paginate(4);

        return view('admin.modules.gym.index', [
            'gyms' => $gyms,
            'subs' => $subs
        ]);
    }
}
