<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/Hello-world', function(){
    return "Hello World";
});
Route::get('/products', function(){
    return "Ini adalah halaman produk";
});

Route::get('/halo', function () {
    return view('halo');
});


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
