<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Contact\StoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.pages.contact.index');
    }

    public function contact(StoreRequest $request)
    {
        $contact = new Contact();

        $contact->email = $request->email;
        $contact->full_name = $request->full_name;
        $contact->description = $request->description;
        $contact->status = 1;

        $contact->save();

        return redirect()->route('client.home.index')->with('success', 'Contact successful!');
    }
}
