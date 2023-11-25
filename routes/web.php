<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ShowTweets;



Route::get('/', function () {
    return view('welcome');
});

Route::get('tweets', ShowTweets::class);
