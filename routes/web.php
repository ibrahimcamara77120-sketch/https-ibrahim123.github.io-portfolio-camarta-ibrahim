<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/projets', function () {
    return view('projets-temp');
})->name('projets');

Route::get('/cv', function () {
    return view('cv-temp');
})->name('cv');

Route::get('/mentions-legales', function () {
    return view('mentions-legales-temp');
})->name('mentions-legales');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:2000',
    ]);
    
    return back()->with('success', 'Votre message a été envoyé avec succès !');
})->name('contact.send');