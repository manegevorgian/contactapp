@extends('layouts.main')

@section('title', 'Contact App | All Contacts')

@section('content')

<main class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-title">
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0">All Contacts</h2>
                            <div class="ml-auto">
                                <a href="{{route('contacts.create')}}" class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('contacts._filter')
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <th>{{$contact->id}}</th>
                                <td>{{$contact->first_name}}</td>
                                <td>{{$contact->last_name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->company_id}}</td>
                                <td>
                                    <a href="{{route('contacts.show', $contact->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>

                        <nav class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


