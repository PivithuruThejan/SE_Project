<?php

namespace App\Http\Controllers;

use App\questionbank;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class ChangeEmailPasswordController extends Controller
{
    public function change(Request $request){//function to change question bank password
    $email=$request->input('email');
    $newemail=$request->input('newemail');
    $password=$request->input('password');

    $user=User::where('email',$request->email)->first();

    if (!is_null($user)) {

        $password = \Hash::make($password);
        $user->email = $newemail;
        $user->password = $password;
        $user->save();
        return view('userhome');
    }
    return view('user/changeemailpassword');





    }


    public function qbchange(Request $request){
        $email=$request->input('email');
        $newemail=$request->input('newemail');
        $password=$request->input('password');

        $user=questionbank::where('email',$request->email)->first();

        if (!is_null($user)) {

            $password = \Hash::make($password);
            $user->email = $newemail;
            $user->password = $password;
            $user->save();
            return view('questionbankhome')->withErrors([ 'Changed Question Bank Password Successfully!']);
        }
        return view('questionbank/changeqbemailpassword')->withErrors([ 'No Such a Question Bank Exists!']);



        //return($newemail);

    }

    public function adminchange(Request $request){
        $email=$request->input('email');
        $newemail=$request->input('newemail');
        $password=$request->input('password');

        $matchThese = ['email' => $email,'admin' =>1];
        $user=User::where($matchThese)->first();
        if(!is_null($user)){
            $password = \Hash::make($password);
            $user->email = $newemail;
            $user->password = $password;
            $user->save();
            return redirect('/adminhome')->withErrors(['Email & Password Successfully Changed!']);

        }
        return redirect('changeadminemailpassword')->withErrors(['No Such Admin In The System!']);
        //
    }

    //
}
