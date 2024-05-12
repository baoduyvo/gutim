<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberShip\StoreRequest;
use App\Http\Requests\Admin\MemberShip\UpdateRequest;
use App\Models\MemberShip;
use Illuminate\Http\Request;

class MemberShipController extends Controller
{
    public function index()
    {
        $memberShips = MemberShip::orderBy('created_at', 'DESC')->get();

        return view('Admin.modules.member_ship.index', [
            'memberShips' => $memberShips
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Admin.modules.member_ship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $memberShip = new MemberShip();

        $memberShip->name = $request->name;
        $memberShip->price = $request->price;
        $memberShip->description = $request->description;

        $memberShip->save();

        return redirect()->route('admin.memberShip.index')->with('success', 'Create Members Ship Successfully');
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
        $memberShip = MemberShip::findOrFail($id);

        return view('Admin.modules.member_ship.edit', [
            'memberShip' => $memberShip
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $memberShip = MemberShip::findOrFail($id);

        $memberShip->name = $request->name;
        $memberShip->price = $request->price;
        $memberShip->description = $request->description;

        $memberShip->save();

        return redirect()->route('admin.memberShip.index')->with('success', 'Update Members Ship Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memberShip = MemberShip::findOrFail($id);

        $memberShip->delete();

        return redirect()->route('admin.memberShip.index')->with('success', 'Delete Members Ship Successfully');
    }
}
