<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Contact;
use App\Company;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all()
                    ->sortBy('id');
        $companies = Company::all()
                    ->sortBy('name');

        $page = DB::table('contacts')->simplePaginate(15);

        return view('contacts.index',['contacts' => $page], compact('contacts', 'companies'));
    }

    public function create() {
        $companies = Company::all()
            ->sortBy('name');
        return view('contacts.create', compact('companies'));
    }

    public function show($id) {
        $company = Company::find($id);
        $contact = Contact::find($id);
        return view('contacts.show',compact('contact', 'company')); // ['contact' => $contact]
    }

    public function edit($id) {
        $companies = Company::find($id);
        $contact = Contact::find($id);
        return view('contacts.edit',compact('contact', 'companies')); // ['contact' => $contact]
    }

}
