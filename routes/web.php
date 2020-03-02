<?php

Route::redirect('/home', '/');

Route::get('/', function () {
    return view('home');
});


Auth::routes();
