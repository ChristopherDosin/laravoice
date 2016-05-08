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
        $create = $contact->create($request->all());
        return response()->json(['id' => $create->id],  201);
    }
    
    public function getContactDetails(Contact $contact, $id)
    {
        return $contact->with('billing')->findOrFail($id);
    }
}
