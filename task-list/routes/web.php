<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        // 'name' => 'cian',

    ]);
});

Route::get('/julian', function () {
    return 'julian is een dikke furry';
})->name('julian');

Route::get('/juliaan', function () {
    return Redirect()->route('julian');
});

Route::get('/greet/{name}', function ($name) {
    if ($name == "julian" || $name == "bastiaan") {
        return "hello $name, you are a furry";
    } elseif ($name == "cian" || $name == "yannick" || $name == "jannes") {
        return "hello $name, you are a toffe peer";
    } elseif ($name == "connor") {
        return "$name, you kinda freaky broo";
    }
    else {
        return "hello $name, you are norminal";
    }
});
Route::fallback(function(){

return 'you god damn idiot this is 404 use a right link you damn idiot';
});


