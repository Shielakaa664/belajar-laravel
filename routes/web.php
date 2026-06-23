<?php

use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::view('/', 'home')->name('home');
Route::view('/produk', 'products')->name('products');
Route::view('/pesan', 'order')->name('order');
Route::view('/lacak', 'tracking')->name('tracking');
Route::view('/kontak', 'contact')->name('contact');

// Halaman Auth
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

// Halaman Admin (PERHATIKAN NAMA ROUTE - HARUS SAMA DENGAN YANG DIPANGGIL)
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
Route::view('/admin/orders', 'admin.orders')->name('admin.orders');
Route::view('/admin/products', 'admin.products')->name('admin.products');  // ← Perbaiki: products, bukan produts

// Halaman User
Route::view('/user/dashboard', 'user.dashboard')->name('user.dashboard');
Route::view('/user/orders', 'user.orders')->name('user.orders');

// Logout (redirect ke home)
Route::get('/logout', function() {
    return view('home');
})->name('logout');