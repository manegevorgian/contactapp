<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use View;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.admin.home');
    }

    public function profile()
    {
        return view('auth.admin.profile');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}
