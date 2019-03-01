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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Route cho adminstrator*/

Route::prefix('admin')->group(function (){
    // Gom nhom cac route cho admin
    //URL:authen.com/admin/
    //Route mac dinh cua admin
    Route::get('/','Admincontroller@index')->name('admin.dashboard');
    //authen.com/admin/dashboard
    //Route dang nhap thanh cong
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    //URL:authen.com/admin/register
    //Router tra ve view dung de dang ki tai khoan
    Route::get('register','AdminController@create')->name('admin.register');
    //URL:authen.com/admin/register
    //phuong thuc la post
    //Route dung de dang ki 1 admin tu form post

    Route::post('register','AdminController@store')->name('admin.register.store');

    //URL:authen.com/admin/login
    //Route tra ve view khi dang nhap admin

   // Route::get('login','Auth\AdminLoginController')->name('admin.auth.login');
    //Route xu li qua trinh dang nhap admin
    //METHOD:POST
    //URL:authen.com/admin/login

  //  Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    //URL:authen.com/admin/logout

    //Route dung de dang xuat

   // Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');

});