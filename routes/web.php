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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::prefix('console')->group(function () {

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login2');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register')->name('register1');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset1');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/', 'Admin\DashboardController@index')->name('');

    Route::get('/contact-book', 'Admin\ContactController@index')->name('contact');
    Route::get('/contact-book/create', 'Admin\ContactController@create')->name('contact.create');
    Route::post('/contact-book/create', 'Admin\ContactController@store')->name('contact.store');
    Route::get('/contact-book/delete/{id}','Admin\ContactController@destroy')->name('contact.destroy');
    Route::post('/contact-book/delete','Admin\ContactController@destroy1')->name('contact.destroy1');
    Route::get('/contact-book/edit/{id}','Admin\ContactController@edit')->name('contact.edit');
    Route::post('/contact-book/edit/{id}','Admin\ContactController@update')->name('contact.update');
});