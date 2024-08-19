<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // return "<h1>Halo dunia!</h1>";
});
