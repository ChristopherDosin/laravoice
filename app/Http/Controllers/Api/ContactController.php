<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Save the Contact with the given Inputs
     *
     * @param Request $request
     * @param Contact $contact
     * @return mixed
     */
    public function saveContact(Request $request, Contact $contact)
    {
        $create = $contact->create($request->all());
        return response()->json(['id' => $create->id],  201);
    }

    /**
     * Get the Contact related to the given $id
     *
     * @param Contact $contact
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getContactDetails(Contact $contact, $id)
    {
        return $contact->with('billing')->findOrFail($id);
    }
}
