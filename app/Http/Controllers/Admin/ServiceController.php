<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(4);

        return view('admin.modules.service.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $service = new Service();

        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->benefit = $request->benefit;

        $file = $request->image;
        $fileName = $this->generateFileName($file->getClientOriginalName());

        $service->image = $fileName;

        $service->save();

        $file->move(public_path('uploads/service/'), $fileName);

        return redirect()->route('admin.service.index')->with('success', 'Create Service Successfully');
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
        $service = Service::findOrFail($id);

        return view('admin.modules.service.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->benefit = $request->benefit;

        $file = $request->image;

        if (!empty($file)) {
            $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg'
            ], [
                'image.required' => 'Please Enter :attribute',
                'image.mimes' => ':attribute Must jpg,png,jpeg'
            ], [
                'image' => 'Product Image'
            ]);

            $old_image_path = public_path('uploads/service/' . $service->image);

            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            };

            $fileName = $this->generateFileName($file->getClientOriginalName());
            $service->image = $fileName;
            $file->move(public_path('uploads/service/'), $fileName);
        }

        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Update Service Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        $file_old_url = public_path('uploads/service/' . $service->image);

        if ($file_old_url) {
            unlink($file_old_url);
        }

        $service->delete();

        return redirect()->route('admin.service.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $services = Service::where('name', 'like', '%' . $search . '%')
            ->orWhere('price', $search)
            ->paginate(4);

        return view('admin.modules.service.index', [
            'services' => $services
        ]);
    }

    function generateFileName($fileName)
    {
        $lastIndex = strrpos($fileName, '.');
        $ext = substr($fileName, $lastIndex);
        return uniqid() . $ext;
    }
}
