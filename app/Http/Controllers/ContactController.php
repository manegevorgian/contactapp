<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;
use App\Company;
class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('contacts.index');
    }

    public function create() {
        return view('contacts.create');
    }

    public function show($id) {
        $contact = Company::find($id); //all()->find($id)
        return view('contacts.show',compact('contact')); // ['contact' => $contact]
    }

}
