<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::group(['middleware' => 'revalidate'], function()
{
    Route::get('/', function () {
        return view('userhome');
    })->name('userhome');

    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/paperset', function () {
        return view('paperset');
    });
    Route::get('/papermodify', function () {
        return view('papermodify');
    });
    Route::get('/paperdelete', function () {
        return view('paperdelete');
    });
    Route::get('/removenotusingusers', function () {
        return view('removenotusinguser');
    });
    Route::get('/notusing', function () {
        return view('notusing');
    });
    Route::get('/questionbankhome', function () {
        return view('questionbankhome');
    });
    Route::get('/insertquestion', function () {
        return view('insertquestion');
    });
    Route::get('/searchquestion', function () {
        return view('searchquestion');
    });
    Route::get('/deletequestion', function () {
        return view('deletequestion');
    });
    Route::get('/modifyquestion', function () {
        return view('modifyquestion');
    });
    Route::get('/deletesubject', function () {
        return view('deletesubject');
    });




    Route::get('/adminhome', function () {
        return view('adminhome');
    })->name('adminhome');

    Route::post('login/custom',[
        'uses' =>'LoginController@login',
        'as' =>'login.custom'
    ]);
});
Route::get('/home', 'HomeController@index');
Route::get('admin/login', 'Admin\AuthController@showLoginForm');
Route::post('admin/login', 'Admin\AuthController@login');
Route::get('admin/logout', 'Admin\AuthController@logout');
Route::get('admin/register', 'Admin\AuthController@showRegistrationForm');
Route::post('admin/register', 'Admin\AuthController@register');



