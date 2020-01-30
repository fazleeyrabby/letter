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

Route::get('/','FrontendController@index')->name('front');
Route::get('/subscribe','FrontendController@subscribe')->name('subscribe');

Auth::routes();




Route::post('/custom-login', 'CustomLoginController@login')->name('custom.login');


Route::prefix('admin')->group(function (){
//    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
//    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //users
        Route::get('/users', 'Admin\AdminUserController@users')->name('admin.users');
        Route::post('/import', 'Admin\AdminUserController@import_file')->name('import.file');
        Route::get('/export', 'Admin\AdminUserController@export_file')->name('admin.export');
        Route::get('/users-get', 'Admin\AdminUserController@users_get')->name('get.users');
        Route::get('/edit-user/{id}', 'Admin\AdminUserController@edit_user')->name('admin.edit.user');
        Route::post('/edit-user-update', 'Admin\AdminUserController@edit_user_update')->name('admin.profile.update');
        Route::post('/edit-user-delete', 'Admin\AdminUserController@edit_user_delete')->name('admin.user.delete');

        //plan
        Route::get('/plan', 'Admin\AdminUserController@plans')->name('admin.plan');
        Route::post('/plan-create', 'Admin\AdminUserController@plans_create')->name('admin.plan.create');
        Route::post('/plan-update', 'Admin\AdminUserController@plans_update')->name('admin.plan.update');
        Route::post('/plan-delete', 'Admin\AdminUserController@plans_delete')->name('admin.plan.delete');

        //pdf
        Route::get('/pdf', 'Admin\AdminpdfController@pdf')->name('admin.pdf');
        Route::post('/pdf-save', 'Admin\AdminpdfController@pdf_save')->name('admin.create.pdf');
        Route::get('/pdf-get', 'Admin\AdminpdfController@pdf_get')->name('get.pdf');
        Route::post('/pdf-single', 'Admin\AdminpdfController@pdf_single')->name('psf.single');
        Route::post('/pdf-update', 'Admin\AdminpdfController@pdf_update')->name('admin.update.pdf');
        Route::post('/pdf-delete', 'Admin\AdminpdfController@pdf_delete')->name('admin.delete.pdf');

        Route::get('/change-password', 'Admin\AdminController@change_password')->name('admin.change.pass');
        Route::post('/change-password-save', 'Admin\AdminController@change_password_save')->name('admin.pass.update');
    });
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'home'], function (){
        Route::get('/', 'HomeController@index')->name('home');

        //user profile
        Route::get('/profile', 'User\UserProfileController@profile')->name('user.profile');
        Route::post('/profile-update', 'User\UserProfileController@profile_update')->name('user.profile.update');

        //upgrade
        Route::get('/upgrade', 'User\UserProfileController@updrade')->name('user.upgrade');
        Route::post('/select-cart-save', 'User\UserProfileController@select_cart_save')->name('user.select.cart');
        Route::get('/payment/{id}', 'User\UserProfileController@payment')->name('user.payment');
        Route::post('/stripe-pay', 'User\UserProfileController@stripe_pay')->name('stripe.pay');
        Route::post('/user-pay-save', 'User\UserProfileController@user_pay_save')->name('user.pay.save');
        Route::get('/user-pdf', 'User\UserProfileController@user_pdf')->name('user.pdf');
        Route::get('/user-pdf-get', 'User\UserProfileController@user_pdf_get')->name('get.pdf.user');
        Route::get('/view/{name}', 'User\UserProfileController@user_pdf_get')->name('view.pdf');
        Route::get('/change-password', 'User\UserProfileController@change_password')->name('user.change.pass');
        Route::post('/change-password-save', 'User\UserProfileController@change_password_save')->name('user.pass.update');
        Route::get('/my-archives-save/{id}', 'User\UserProfileController@my_archives_save')->name('user.archives.save');
        Route::get('/my-archives', 'User\UserProfileController@my_archives')->name('user.archives');
        Route::get('/my-archives-get', 'User\UserProfileController@my_archives_get')->name('get.pdf.user.archive');

    });
});

