<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    $username = session('username');

    return view('home', [
        'username' => $username
    ]);
});


Route::get('/info', function () {

    return view('info');
});


Route::get('/form', function () {
    $email = session('email');
    $last_name = session('last_name');
    $first_name = session('first_name');

    return view('form', [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
    ]);
});


Route::post(
    '/login',
    [App\Http\Controllers\UserController::class, 'store']
);


Route::get(
    '/logout',
    [App\Http\Controllers\UserController::class, 'logout']
);