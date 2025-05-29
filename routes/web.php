<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Homepage']);
});
Route::get('/about', function () {
    return view('about', ['nama' => 'Nosferatu'], ['title' => 'About me']);
});
Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact me']);
});
