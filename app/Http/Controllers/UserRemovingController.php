<?php

namespace App\Http\Controllers;

use App\Paper;
use App\question;
use App\questionbank;
use App\subject;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserRemovingController extends Controller
{
    public function viewnotusing(Request $request){//function to  view  not using users for admin
        $choice=$request->input('selection');

        $match=['admin'=>0];
        $user=User::where($match)->get();
        if(count($user)!=0) {
            if ($choice == 'nopaper') {
                $notpaperuser=array();
                    foreach ($user as $user){
                        $email=$user->email;
                        $match1=['user_email'=>$email];
                        $puser=Paper::where($match1)->first();
                        if(is_null($puser)){
                            array_push($notpaperuser,$user);
                        }
                    }
                    if(count($notpaperuser)!=0){
                        return view("notuserresultpaper")->with(array('notpaperuser'=>$notpaperuser));

                    }
                return redirect('/viewnotusing')->withErrors(['All Users Have Set Papers!']);






            }
            $notqbuser=array();
            foreach ($user as $user){
                $email=$user->email;
                $match1=['email'=>$email];
                $quser=questionbank::where($match1)->first();
                if(is_null($quser)){
                    array_push($notqbuser,$user);
                }
            }
            if(count($notqbuser)!=0){
                return view("notuserresultqb")->with(array('notqbuser'=>$notqbuser));

            }
            return redirect('/viewnotusing')->withErrors(['All Users Have Questionbanks!']);

        }
        return redirect('/adminhome')->withErrors(['No Users In The System!']);

        //return 'this no questionb';
    }

    public function removenotusinguser(Request $request){//function to remove users from the system
        $email=$request->input('email');
        $match1=['email'=>$email];
        $match2=['email'=>$email];
        $match3=['useremail'=>$email];
        $match4=['questionbankemail'=>$email];

        $user=User::where($match1)->first();
        $qb=questionbank::where($match2)->first();
        $subject=subject::where($match3)->get();
        $question=question::where($match4)->get();
        if(count($subject)!=0){
            foreach($subject as $subject){
                $subject->delete();
            }

        }

        if(count($question)!=0){
            foreach($question as $question){
                $question->delete();
            }

        }
        if(!is_null($user)){
            $user->delete();
            if(!is_null($qb)){
                $qb->delete();
            }
            return redirect('/adminhome')->withErrors(['User Is Successfully Removed!']);

        }
        return redirect('/removenotusingusers')->withErrors(['No Such A User In The System!']);
    }
    //
}
