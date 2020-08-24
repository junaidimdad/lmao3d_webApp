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
|ViewHosts
*/

//Landing Page Routes
Route::get('/', 'Controller@Welcome')->name('welcome');
Route::resource('clientadminsuggestion', 'ClientAdminSuggestion\ClientAdminSuggestionController');
Route::resource('/thread','Forum\ThreadController');
Route::resource('comment','Forum\CommentController', ['only'=>['update', 'destroy']]);
Route::post('comment/create/{thread}','Forum\CommentController@addThreadComment')->name('threadcomment.store');
Route::post('reply/create/{comment}','Forum\CommentController@addReplyComment')->name('replycomment.store');
Route::post('/thread/mark-as-solution','Forum\ThreadController@markAsSolution')->name('markAsSolution');
Route::post('/comment/like','Forum\LikeController@likeIt')->name('likeIt');
Route::get('/user/profile/{user}', 'Forum\UserProfileController@index')->name('client_profile')->middleware('auth:client');
Route::get('/ClientProfile', 'Forum\UserProfileController@PersonalProfile')->name('personalProfile')->middleware('auth:client');
Route::post('/ClientProfile', 'Forum\UserProfileController@Upload')->name('personalProfile')->middleware('auth:client');
//Auth::routes();
Auth::routes(['verify'=>true]);
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//Host Dashboard Routes
Route::namespace('Host')->prefix('host')->name('host.')->group(function(){
    Route::get('/HostDashboard', 'HostController@HostDashboard')->name('hostDashboard');
    Route::get('/HostProfile', 'HostController@HostProfile')->name('hostProfile');
    Route::post('/HostProfile', 'HostController@Upload')->name('hostProfile');
    Route::resource('/File', 'FileController', ['except' => ['update', 'edit']]);
    Route::post('/File/create', 'FileController@store');
    Route::post('/File/{id}', 'FileController@show');
});

//Admin Login Logout Routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  });
  
  //Admin Dashboadr and Related Pages Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/AdminDashboard', 'AdminController@AdminDashboard')->name('adminDashboard');
    /**####################################################################################### */
    /** This Route is for the Role Management Functionality of LMAO 3D */
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store', 'edit', 'update']]);
    /**####################################################################################### */
    Route::get('/changestatus/{id}', 'AdminController@changestatus')->name('changestatus');
    Route::get('/ViewHosts', 'AdminController@ViewHosts')->name('viewHosts');
    Route::resource('/viewsuggestions', 'ViewSuggestionController', ['except' => ['show', 'create', 'store', 'update', 'edit', 'destroy']]);
});

//Client Login Logout Routes
Route::prefix('client')->group(function() {
    Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('/logout', 'Auth\ClientLoginController@logout')->name('client.logout');
    Route::get('/register', 'Auth\ClientRegisterController@showRegisterForm')->name('client.register');
    Route::post('/register', 'Auth\ClientRegisterController@register')->name('client.register.submit');

    // Password reset routes
    Route::post('/password/email', 'Auth\ClientForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
    Route::get('/password/reset', 'Auth\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.request');
    Route::post('/password/reset', 'Auth\ClientResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\ClientResetPasswordController@showResetForm')->name('client.password.reset');
  });




