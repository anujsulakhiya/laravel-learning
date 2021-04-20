<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajax/{page_name}', function ($page_name) {
    $pages_array = ['a', 'b' , 'change_password'];
    if(in_array($page_name, $pages_array)){
        return view('ajax/'.$page_name);
    }
    return view('ajax.404');
});

Route::post('dashboard/change_password', 'PasswordController@change_password');
