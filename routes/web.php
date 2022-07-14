<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/members', 'MemberController@index')->name('members');
    Route::get('/member/create', 'MemberController@create')->name('members.create');
    Route::post('/member', 'MemberController@store')->name('members.store');
    Route::get('/member/{member}', 'MemberController@show')->name('members.show');
    Route::get('/member/{member}/edit', 'MemberController@edit')->name('members.edit');
    Route::put('/member/{member}', 'MemberController@update')->name('members.update');
    Route::delete('/member/{member}', 'MemberController@destroy')->name('members.destroy');
    Route::get('/books', 'BookController@index')->name('books');
    Route::get('/book/create', 'BookController@create')->name('books.create');
    Route::post('/book', 'BookController@store')->name('books.store');
    Route::get('/book/{book}', 'BookController@show')->name('books.show');
    Route::get('/book/{book}/edit', 'BookController@edit')->name('books.edit');
    Route::put('/book/{book}', 'BookController@update')->name('books.update');
    Route::delete('/book/{book}', 'BookController@destroy')->name('books.destroy');
});
