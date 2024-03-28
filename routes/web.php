<?php

use App\Http\Controllers\Affiliate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/affiliates', function () {
    return view(
        'affiliates', ['affiliates' => Affiliate::readFromFile()]
       
    );
});
