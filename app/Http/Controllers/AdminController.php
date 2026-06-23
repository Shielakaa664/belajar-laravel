<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        if(!session()->has('user') || session('user')['role'] != 'admin') {
            redirect()->route('login')->send();
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function updateStatus(Request $request)
    {
        // Status akan diupdate via JavaScript di localStorage
        return response()->json(['success' => true]);
    }

    public function products()
    {
        return view('admin.products');
    }

    public function updateStock(Request $request)
    {
        return response()->json(['success' => true]);
    }
}