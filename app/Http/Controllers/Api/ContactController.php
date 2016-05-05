<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function getContacts(User $user)
    {
        return $user->with('usertype', 'billingaddress')->get();
    }

    public function saveContact(Request $request, Contact $contact)
    {
        $contact->create($request->all());
        return "Kontakt erfolgreich erstellt.";
    }
}
