<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ShowTweets;
use App\Livewire\User\UploadPhoto;

Route::get('/', function () {
    return view('welcome');
});

ROute::get('/upload', UploadPhoto::class)
    ->middleware('auth')
    ->name('upload');

    
Route::get('/tweets', ShowTweets::class)
    ->middleware('auth')
    ->name('tweets');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
