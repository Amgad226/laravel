<?php

use App\Http\Controllers\Post_Controller;
use App\Http\Controllers\save_email_Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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



// 
Route::get('/', function () {
    return view('welcome');
});

Route::get('check_user/}', 'FirstController@Check_User_Name') ;
// return  int a - = das


       Route::get('users/{name}', function ($name) {
           return $name ; 
       })->where('name','[a-z]+');




Route::get('/about-me', function () {
    return view("about");    
});


// (uri  اسم الصفحة  , view  ,  array of data)
Route::view('contact-me', "contact" ,
 [
    'page_name' => ' contact me ' ,
    'page_description' => 'this is DESCRIPTION'
 ]  
           );

Route::prefix('dashword')->middleware('auth')->group(function(){

    Route::get('/main', function () {
        echo "welcome admin"; 
    });
    
    Route::get('/dashword/user/module', function () {
        echo "welcome admin"; 
    });

});

Route::get('/a', 'ThemeController@home_page'  );

// Route::get('/login_account', function () {
//     return view("login_account");    
// });
Route::get('login_account', function(){return view("login_account"); });

Route::post('/post/add', [save_email_Controller::class, 'store'])->name('post.store');
 Route::post('/post/add', 'save_email_Controller@store' )->name('post.store');

Route::get('/post', 'save_email_Controller@index'  )->name('post.index');


Route::get('/post{id}', 'save_email_Controller@destroy')->name('post.destroy');

Route::get('/post/edit{id}', 'save_email_Controller@edit')->name('post.edit');

Route::post('/post/update{id}', 'save_email_Controller@update' )->name('post.update');
Route::get ('delete', function(){return view("delete"); });
Route::get ('/admin', function(){   return view('admin');});
Route::post('/admin', 'save_email_Controller@login_to_admin_panal')->name('post.database');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
