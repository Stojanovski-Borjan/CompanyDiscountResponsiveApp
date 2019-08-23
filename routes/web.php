<?php
use App\Http\Controllers\FormController;

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

// First Page 
// Route::get('/', 'FormController@index')->name('index');
Route::get('/', 'ViewController@index')->name('index');
// Route::get('/action', 'ViewController@action')->name('index.action');

/**
 * Login Route(s)
 */
Route::get('loginadmin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('loginadmin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/**
 * Password Reset Route(S)
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
/**
 * Email Verification Route(s)
 */
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/dashboard/{id}/approve', 'HomeController@approve')->name('dashboard.approve');


// Create and store Deals
Route::get('/forms/create', 'FormController@create')->name('form.create');
Route::post('/forms/store', 'FormController@store')->name('form.store');
Route::get('/product/{id}', 'ViewController@indexProduct')->name('product');

// Create and store Customer
Route::get('product/buy/{id}', 'CostumerController@index')->name('product.buy');
Route::post('product/buy/store', 'CostumerController@store')->name('product.store');
