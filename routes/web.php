<?php

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

// Route::get('/', function () {
//     //$user = new \App\Models\User();
//     //$user->username = 'fikry13';
//     //$user->email = 'fikry13@gmail.com';
//     //$user->password = bcrypt('bleb');
//     //$user->name = 'Fikry Abdullah Aziz';
//     //$user->save();

//     //$post = \App\Models\Posts::all();
// });

Auth::routes();

Route::get('/anjing', function()
{
    return view('tes');
});
Route::get('/', 'DefaultController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{username}', 'UserController@show');
Route::get('/p/{post_id}', 'PostController@show');
