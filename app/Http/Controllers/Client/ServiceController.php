<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Gym;
use App\Models\MemberShip;
use App\Models\Service;
use App\Models\Sub;
use App\Rules\GymIdRule;
use App\Rules\MembershipIdRule;
use App\Rules\ServiceIdRule;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get();
        $gyms = Gym::get();
        $memberShipsNames = MemberShip::get();

        $memberShips = MemberShip::orderBy('created_at', 'DESC')->take(3)->get();

        return view('client.pages.service.index', [
            'services' => $services,
            'memberShips' => $memberShips,
            'memberShipsNames' => $memberShipsNames,
            'gyms' => $gyms
        ]);
    }

    public function exercise()
    {
        return view('client.pages.service.exercise');
    }

    public function service_detail($id)
    {
        $services = Service::findOrFail($id);

        $subs = Sub::join('gym as g', 'sub.gym_id', '=', 'g.id')
            ->join('service as s', 'sub.service_id', '=', 's.id')
            ->where('sub.service_id', $services->id)
            ->select('g.*')
            ->get();

        return view('client.pages.service.detail', [
            'services' => $services,
            'subs' => $subs
        ]);
    }

    public function booking(Request $request)
    {

        $this->validate($request, [
            'gym_id' => [new GymIdRule()],
            'service_name' => [new ServiceIdRule()],
            'membership_name' => [new MembershipIdRule()],
            'full_name' => 'required',
            'address' => 'required',
            'appointment_date' => 'required',
            'phone' => 'required',
            'appointment_date' => 'required'
        ], [
            'full_name.required' => 'Please Enter Full Name',
            'address.required' => 'Please Enter Address',
            'phone.required' => 'Please Enter Full Name',
            'appointment_date.required' => 'Please Enter Appointment Date'
        ]);

        $booking = new Booking();

        $booking->email = $request->session()->get('email');
        $booking->full_name = $request->full_name;
        $booking->phone = $request->phone;
        $booking->address = $request->address;
        $booking->service_name = $request->service_name;
        $booking->membership_name = $request->membership_name;
        $booking->status = 1;
        $booking->appointment_date = $request->appointment_date;
        $booking->user_id = $request->session()->get('id');
        $booking->gym_id = $request->gym_id;

        $booking->save();

        return redirect()->route('client.service.index')->with('success', 'Booking successful!');
    }

    public function chooseService(Request $request)
    {
        $serviceID = $request->get('serviceID');

        $gymName = Sub::join('gym as g', 'sub.gym_id', 'g.id')
            ->join('service as s', 'sub.service_id', 's.id')
            ->where('sub.service_id', $serviceID)
            ->select('g.*')
            ->get();

        return response()->json(array('data' => $gymName), 200);
    }
}
