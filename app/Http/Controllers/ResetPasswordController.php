<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class ResetPasswordController extends Controller
{
public function resetHandler(Request $request){//function to reset password via a mail
    $email=$request->input('email');
    $email=[$email];
    Mail::send('user/resetlink', [], function($message) use ($email)
    {
        $message->to($email)->subject('Reset Your Email And Password');
    });

    return redirect('/')->withErrors(['Check Your Email!']);






}
}
