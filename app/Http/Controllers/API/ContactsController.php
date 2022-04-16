<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    // GET ALL CONTACTS
    public function index() {
        $contacts = Contact::all();

        // validate database response
        if(empty($contacts)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Oops, something went wrong"
                ]
            ];
        }

        // success, return response to client
        return [
            "success" => true,
            "response" => [
                "contacts" => $contacts
            ]
        ];
    }

    // CREATE A NEW CONTACT
    public function store() {
        // convert request json body to object
        $request = json_decode(request()->getContent());

        // validate contact email address
        if(Contact::where("email", "=", $request->email)->exists()) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Email address is already associated with an existing contact"
                ]
            ];
        }

        // validate contact phone number
        if(Contact::where("phone", "=", $request->phone)->exists()) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Phone number is already associated with an existing contact"
                ]
            ];
        }

        // new contact is valid, create new contact
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->country = $request->country;
        $contact->save();

       // success, return response to client
        return [
            "success" => true,
            "response" => [
                "contact" => $contact
            ]
        ];
    }

    // GET A SINGLE CONTACT
    public function show($id) {
        $contact = Contact::find($id);

        // validate database response
        if(empty($contact)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Contact not found"
                ]
            ];
        }

        // success, return data to client
        return [
            "success" => true,
            "response" => [
                "contact" => $contact
            ]
        ];
    }

    // DELETE CONTACT
    public function destroy($id) {
        $contact = Contact::find($id);

        // validate database response
        if(empty($contact)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Contact not found"
                ]
            ];
        }

        // delete contact
        $contact->delete();

        // success, return data to client
        return [
            "success" => true,
            "response" => [
                "message" => "Contact deleted"
            ]
        ];
    }

    // UPDATE CONTACT
    public function update($id) {
        $contact = Contact::find($id);

        // validate database response
        if(empty($contact)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Contact not found"
                ]
            ];
        }

              // validate contact email address
        if(Contact::where("email", "=", request("email"))->exists()) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Email address is already associated with an existing contact"
                ]
            ];
        }

        // validate contact phone number
        if(Contact::where("phone", "=", request("phone"))->exists()) {
            return [
                "success" => false,
                "response" => [
                    "error" => "Phone number is already associated with an existing contact"
                ]
            ];
        }

        // get data from request
        $data = request()->all();

        // update contact fields with new data
        foreach ($data as $key => $value) {
            $contact->{$key} = $value;
        }

        // save updated contact
        $contact->save();

        // success, return data to client
        return [
            "success" => true,
            "response" => [
                "contact" => $contact
            ]
        ];
    }
}
