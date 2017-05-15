<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class LoginController extends Controller
{
    /* to check user is an admin*/
    public function login(Request $request){//function to check whether user is a normal user or an admin user

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password

        ])){
            $user=User::where('email',$request->email)->first();
            if($user->is_admin()){
                return redirect()->route('adminhome');/* go to the admin home*/
            }
            return redirect()->route('userhome');/* go to user home*/

        }
        return redirect()->back();/* go back to the login  because of in valid password email*/
    }
}
