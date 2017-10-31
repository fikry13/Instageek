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

Route::get('/tes', function ()
{
    $randomUserId = App\Models\User::pluck('id');
    for($i=0; $i < 10; $i++)
    {
        echo $randomUserId->random();
        echo '<br>';
    }

});

Auth::routes();
Route::get('/', 'DefaultController@index')->name('default');
Route::resource('/posts', 'PostController');
Route::resource('/posts/{post_id}/comments', 'CommentController')->only(['store','destroy']);
Route::resource('/posts/{post_id}/likes', 'LikeController')->only(['store','destroy']);
Route::resource('/users', 'UserController')->except(['show']);
Route::resource('/users/{user_id}/follows', 'FollowController')->only(['store','destroy']);
Route::get('/{username}', 'UserController@show')->name('userProfile');

