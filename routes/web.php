<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/index', function(){
    return view('landing/index');
});

Route::get('/', function () {
    return view('landing.index');
})->name('home');

Route::get('/about', function () {
    return view('landing.about');
})->name('about');

Route::get('/donation', function () {
    return view('landing.donation');
})->name('donation');

Route::get('/event', function () {
    return view('landing.event');
})->name('event');

Route::get('/contact', function () {
    return view('landing.contact');
})->name('contact');