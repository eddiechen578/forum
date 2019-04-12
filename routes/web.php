<?php
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('discussion', 'DiscussionController');
Route::resource('discussion/{discussion}/replies', 'RepliesController');
Route::post('discussion/{discussion}/replies/{reply}/mark-as-best-reply', 'DiscussionController@reply')->name('discussion.best-reply');
Route::get('users/notifications', 'UserController@notifications')->name('users.notifications');
