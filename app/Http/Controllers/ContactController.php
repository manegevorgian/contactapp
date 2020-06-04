<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contact;
use App\Company;

class ContactController extends Controller
{
    public function index() {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $contacts = Contact::orderBy('first_name', 'asc')->where(function ($query) {
            if ($companyId = request('company_id'))
                $query->where('company_id', $companyId);
        })->paginate(5);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create() {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.create', compact('companies'));
    }

    public function show($id) {
        $contact = Contact::find($id); // all()->find($id)
        return view('contacts.show' , compact('contact'));
    }

    public function store(Request $request) {

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $company_id = $request->input('company_id');

        $validation = \Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id'
        ]);

        if(!$validation->fails()) {
            $new_contact = new Contact();

            $new_contact -> first_name = $first_name;
            $new_contact -> last_name = $last_name;
            $new_contact -> email = $email;
            $new_contact -> address = $address;
            $new_contact -> phone = $phone;
            $new_contact -> company_id = $company_id;

            $new_contact -> save();
        }
//        dd($request);
//        dd($request->only('first_name', 'last_name'));
//        dd($request->except('first_name', 'last_name'));

        return redirect (route('contacts.index'));

    }

    public function edit($id) {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $contacts = Contact::find($id);
        return view('contacts.edit',compact('contacts', 'companies')); // ['contact' => $contact]
    }

    public function change(Request $request) {

        $validation = \Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'company_id' => 'required|exists:companies,id'
            ]);

        if(!$validation->fails()) {
             DB::table('contacts')
                ->where('id', $request->id)
                ->update([
                    'first_name'       =>  $request->first_name,
                    'last_name'        =>  $request->last_name,
                    'email'            =>  $request->email,
                    'address'          =>  $request->address,
                    'phone'            =>  $request->phone,
                    'company_id'       =>  $request->company_id,
                ]);
        }
        return Redirect(route('contacts.show', $request->id));

    }

    public function drop($id) {
        $companies = Company::orderBy('name')->pluck('name', 'id');
        $contacts = Contact::find($id);
        DB::table('contacts')->delete($id);
        return view('contacts.index',compact('contacts','companies'));
    }


}
