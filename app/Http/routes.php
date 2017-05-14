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





    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/paperset', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('paperset');
    });
    Route::get('/papermodify', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('papermodify');
    });

    Route::get('/givemodifypaper', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('givemodifypaper');
    });
    Route::get('/paperdelete', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('paperdelete');
    });
    Route::get('/paperbuild', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('paperbuild');
    });
    Route::get('/removenotusingusers', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('removenotusinguser');
    });
    Route::get('/viewnotusing', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('notusing');
    });

    Route::get('/insertquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('insertquestion');
    });
    Route::get('/searchquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('searchquestion');
    });
    Route::get('/deletequestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('deletequestion');
    });
    Route::get('/modifyquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('modifyquestion');
    });
    Route::get('/deletesubject', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('deletesubject');
    });
    Route::get('/changeemailpassword', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('user/changeemailpassword');
    });

    Route::get('/changeqbemailpassword', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('questionbank/changeqbemailpassword');
    });

    Route::get('changeadminemailpassword', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('admin/changeadminemailpassword');
    });






Route::get('/adminhome', function () {

        return view('adminhome');
    })->name('adminhome');

    Route::post('login/custom',[
        'uses' =>'LoginController@login',
        'as' =>'login.custom'
    ]);

Route::get('/home', 'HomeController@index');

    Route::post('/testtrial', 'PaperController@testtrial');


Route::get('admin/login', 'Admin\AuthController@showLoginForm');
Route::post('admin/login', 'Admin\AuthController@login');
Route::get('admin/logout', 'Admin\AuthController@logout');
Route::get('admin/register', 'Admin\AuthController@showRegistrationForm');
Route::post('admin/register', 'Admin\AuthController@register');

Route::get('/questionbankregister', 'QuestionBankAuth\AuthController@showRegistrationForm');
Route::post('/questionbankregister', 'QuestionbankAuth\AuthController@register');

Route::get('/questionbanklogin','QuestionBankAuth\AuthController@showLoginForm');
Route::post('/questionbanklogin','QuestionBankAuth\AuthController@login');


Route::get('/questionbanklogout','QuestionBankAuth\AuthController@logout');

// Registration Routes...


Route::get('/questionbank', 'QuestionBankAuth\AuthController@questionbank');


Route::get('/questionbankpasswordreset','QuestionBankAuth\AuthController@resetPassword');
Route::post('sendresetmail','ResetPasswordController@resetHandler');
Route::post('changeemailpassword','ChangeEmailPasswordController@change');
Route::post('changeqbemailpassword','ChangeEmailPasswordController@qbchange');
Route::post('changeadminemailpassword','ChangeEmailPasswordController@adminchange');


Route::post('createsubject','SubjectController@insertsubject');
Route::post('modifysubject','SubjectController@modifysubject');
Route::post('insertessayquestion','QuestionController@insertessayquestion');
Route::post('insertmcqquestion','QuestionController@insertmcqquestion');
Route::post('modifyessayquestion','QuestionController@searchmodifyessayquestion');
Route::post('modifymcqquestion','QuestionController@searchmodifymcqquestion');

Route::post('modifyessay','QuestionController@modifyessay');
Route::post('modifymcq','QuestionController@modifymcq');
Route::post('deletequestion','QuestionController@deletequestion');
Route::post('deletesubject','SubjectController@deletesubject');

Route::post('setpaper','PaperController@insertpaper');
Route::post('searchpaper','PaperController@searchpaper');
Route::post('modifypaper','PaperController@modifypaper');
Route::post('deletepaper','PaperController@deletepaper');
Route::post('papermanualbuild','PaperController@papermanualbuild');

Route::post('viewnotusing','UserRemovingController@viewnotusing');
Route::post('removenotusinguser','UserRemovingController@removenotusinguser');



    Route::auth();
    Route::get('/', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('userhome');
    })->name('userhome');



Route::group(['middleware' => ['revalidate']], function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/paperset', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('paperset');
    });
    Route::get('/papermodify', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('papermodify');
    });
    Route::get('/paperdelete', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('paperdelete');
    });

    Route::get('/removenotusingusers', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('removenotusinguser');
    });
    Route::get('/notusing', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('notusing');
    });

    Route::get('/insertessayquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('insertessayquestion');
    });

    Route::get('/insertmcqquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('insertmcqquestion');
    });
    Route::get('/searchmodifyessayquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('searchmodifyessayquestion');
    });

    Route::get('/modifyessayquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('modifyessay');
    });

    Route::get('/modifymcqquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('modifymcq');
    });


    Route::get('/deletequestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('deletequestion');
    });
    Route::get('/searchmodifymcqquestion', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('searchmodifymcqquestion');
    });
    Route::get('/deletesubject', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('deletesubject');
    });
    Route::get('/changeemailpassword', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('user/changeemailpassword');
    });

        Route::get('/createsubject', function () {
            if(! Auth::check()){return Redirect::to('welcome');}
        return view('questionbank/createsubject');
    });
    Route::get('/modifysubject', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('questionbank/modifysubject');
    });








    Route::get('/adminhome', function () {
        if(! Auth::check()){return Redirect::to('welcome');}
        return view('adminhome');
    })->name('adminhome');

    Route::post('login/custom',[
        'uses' =>'LoginController@login',
        'as' =>'login.custom'
    ]);

    Route::get('/home', 'HomeController@index');
    Route::get('admin/login', 'Admin\AuthController@showLoginForm');
    Route::post('admin/login', 'Admin\AuthController@login');
    Route::get('admin/logout', 'Admin\AuthController@logout');
    Route::get('admin/register', 'Admin\AuthController@showRegistrationForm');
    Route::post('admin/register', 'Admin\AuthController@register');

    Route::get('/questionbankregister', 'QuestionBankAuth\AuthController@showRegistrationForm');
    Route::post('/questionbankregister', 'QuestionbankAuth\AuthController@register');

    Route::get('/questionbanklogin','QuestionBankAuth\AuthController@showLoginForm');
    Route::post('/questionbanklogin','QuestionBankAuth\AuthController@login');


    Route::get('/questionbanklogout','QuestionBankAuth\AuthController@logout');

// Registration Routes...


    Route::get('/questionbank',  'QuestionBankAuth\AuthController@questionbank');
    Route::get('/startSystem', 'AdminController@startSystem');
    Route::get('/paperbuilder', 'PaperController@paperbuilder');

    Route::get('/questionbankpasswordreset','QuestionBankAuth\AuthController@resetPassword');
    Route::post('sendresetmail','ResetPasswordController@resetHandler');
    Route::post('changeemailpassword','ChangeEmailPasswordController@change');

});

