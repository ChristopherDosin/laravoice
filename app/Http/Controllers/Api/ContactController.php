<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function saveContact(Request $request, Contact $contact)
    {
        $contact->create($request->all());
        return response('Contact was successfully created', 201);
    }
    
    public function getContactDetails(Contact $contact, $id)
    {
        return $contact->findOrFail($id)->with('billing')->get();
    }
}
