<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\FeelBack\StoreRequest;
use App\Models\Enquiry;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::get();

        return view('client.pages.home.index', [
            'services' => $services
        ]);
    }

    public function feedback(StoreRequest $request)
    {
        $enquiry = new Enquiry();

        $enquiry->email = $request->email;
        $enquiry->full_name = $request->first_name . ' ' . $request->last_name;
        $enquiry->phone = $request->phone;
        $enquiry->description = $request->description;

        $enquiry->save();

        return redirect()->route('client.home.index')->with('success', 'FeelBack successful!');
    }
}
