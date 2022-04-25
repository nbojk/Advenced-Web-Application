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

// Post Routes
Route::get('/', '\App\Http\Controllers\PostsController@index')->middleware(['auth'])->name('posts.index');

Route::get('/posts/create', '\App\Http\Controllers\PostsController@create')->middleware(['auth'])->name('posts.create');

Route::post('/post', '\App\Http\Controllers\PostsController@store')->middleware(['auth'])->name('posts.store');

Route::delete('/post/{post}', '\App\Http\Controllers\PostsController@destroy')->name('posts.destroy');

Route::get('/post/{post}', '\App\Http\Controllers\PostsController@show')->middleware(['auth'])->name('posts.show');


// Profile Routes
Route::get('/profile/{user}', '\App\Http\Controllers\ProfilesController@index')->middleware(['auth'])->name('profiles.index');

Route::get('/profile/{user}/edit', '\App\Http\Controllers\ProfilesController@edit')->middleware(['auth'])->name('profiles.edit');

Route::patch('/profile/{user}', '\App\Http\Controllers\ProfilesController@update')->middleware(['auth'])->name('profiles.update');


// Search Route
Route::any('/search', '\App\Http\Controllers\ProfilesController@search')->middleware(['auth'])->name('profile.search');


// Explore Route
Route::get('/explore', '\App\Http\Controllers\ProfilesController@otherUsers')->middleware(['auth'])->name('otherUsers');


// Follow Route
Route::post('/follow/{user}', '\App\Http\Controllers\FollowsController@store')->middleware(['auth'])->name('follow');


// Comments Route
Route::post('/comments', '\App\Http\Controllers\CommentsController@store')->middleware(['auth'])->name('comments.store');


// Likes Routes
Route::post('/like-post/{id}','\App\Http\Controllers\PostsController@likePost')->name('like.post');

Route::post('/unlike-post/{id}','\App\Http\Controllers\PostsController@unlikePost')->name('unlike.post');



require __DIR__.'/auth.php';
