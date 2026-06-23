<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function __construct()
    {
        if(!session()->has('user')) {
            redirect()->route('login')->send();
        }
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function orders()
    {
        return view('user.orders');
    }
}