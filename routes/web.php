<?php

use App\Http\Controllers\AffiliateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/affiliates', function () {
    return view(
        'affiliates', ['affiliates' => AffiliateController::index() ]
       
    );
});
