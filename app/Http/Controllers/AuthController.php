<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        
        // Data user dari localStorage (simulasi)
        // Admin: admin / admin123
        // User: user / user123
        
        if($username == 'admin' && $password == 'admin123') {
            session(['user' => ['username' => 'admin', 'role' => 'admin', 'name' => 'Administrator']]);
            return redirect()->route('admin.dashboard');
        } 
        elseif($username == 'user' && $password == 'user123') {
            // Cek apakah user sudah terdaftar di localStorage
            session(['user' => ['username' => 'user', 'role' => 'user', 'name' => 'User Biasa']]);
            return redirect()->route('user.dashboard');
        }
        else {
            // Cek user yang register
            $users = json_decode(session()->get('registered_users', '[]'), true);
            foreach($users as $u) {
                if($u['username'] == $username && $u['password'] == $password) {
                    session(['user' => ['username' => $username, 'role' => 'user', 'name' => $u['name']]]);
                    return redirect()->route('user.dashboard');
                }
            }
            return back()->with('error', 'Username atau password salah!');
        }
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $users = json_decode(session()->get('registered_users', '[]'), true);
        $users[] = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email
        ];
        session(['registered_users' => json_encode($users)]);
        
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('home');
    }
}