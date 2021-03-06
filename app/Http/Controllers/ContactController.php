<?php

namespace App\Http\Controllers;

use App\Scopes\FilterScope;
use Illuminate\Http\Request;
use App\Contact;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index() {
        $companies = Company::orderBy('name')
                    -> pluck('name', 'id')
                    -> prepend('All Companies', '');
        $contacts = Contact::latestFirst() -> paginate(10);

//        if (Auth::check()) {
//            dd(Auth::user()->name);
//        }

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create() {
        $contact = new Contact();
        $companies = Company::orderBy('name')
                    ->pluck('name', 'id')
                    ->prepend('All Companies', '');
        return view('contacts.create', compact('companies', 'contact'));
    }

    public function show($id) {
        $contact = Contact::find($id);
        return view('contacts.show' , compact('contact'));
    }

    public function update($id, Request $request) {
        $request -> validate
        ([
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required|email',
            'address'        => 'required',
            'company_id'     => 'required|exists:companies,id',
        ]);
        $contact = Contact::findOrFail($id);
        $contact->update($request -> all());
        return redirect()
               -> route('contacts.index')
               -> with('message', "Contact has been updated successfully");
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);
        $companies = Company::orderBy('name')
                     -> pluck('name', 'id')
                     -> prepend('All Companies', '');
        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function store(Request $request) {
        $request -> validate
        ([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'email'       => 'required|email',
            'address'     => 'required',
            'company_id'  => 'required|exists:companies,id',
        ]);
        Contact::create($request -> all());
        return redirect()
               -> route('contacts.index')
               -> with('message', "Contact has been added successfully");
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact -> delete();

        return back() -> with('message', "Contact has been deleted successfully");
    }

//    public function __construct()
//    {
//        $this -> middleware('auth') -> only('create', 'update', 'destroy');
//    }

}
