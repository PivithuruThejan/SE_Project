<?php

namespace App\Http\Controllers;

use App\subject;
use App\questionbank;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubjectController extends Controller
{
    public function insertsubject(Request $request){//function to newly insert a subject
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $no_of_sections=$request->input('no_of_sections');


        $user=questionbank::where('email',$request->email)->first();

        $matchThese = ['useremail' => $email, 'subjectname' => $subject_name];
        $esubject=subject::where($matchThese)->first();
        if(!is_null($user)) {
            if (is_null($esubject)) {
                $subject = new subject;
                $subject->subjectname = $subject_name;
                $subject->useremail = $email;
                $subject->noofsections = $no_of_sections;
                $subject->save();

                return redirect('/questionbank')->withErrors(['Subject Successfully Created!']);
            }
            return redirect('/createsubject')->withErrors(['This Subject Already Exists!']);
        }
        return redirect('/createsubject')->withErrors(['This Is Not A Questionbank Email!']);


    }

    public function modifysubject(Request $request){//function to modify subject details
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $no_of_sections=$request->input('no_of_sections');
        $matchThese = ['useremail' => $email, 'subjectname' => $subject_name];
        $esubject=subject::where($matchThese)->first();
        if(!is_null($esubject)){
            $esubject->noofsections=$no_of_sections;
            $esubject->save();
            return redirect('/questionbank')->withErrors([ 'Subject Successfully Modified!']);


        }
        return redirect('/modifysubject')->withErrors([ 'No Such A Subject Exists!']);

    }

    public function deletesubject(Request $request){//function to delete a subject
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');

        $matchThese = ['useremail' => $email, 'subjectname' => $subject_name];
        $esubject=subject::where($matchThese)->first();
        if(!is_null($esubject)){
            $esubject->delete();
            return redirect('/questionbank')->withErrors(['Subject Is Successfully Deleted!']);

        }
        return redirect('/deletesubject')->withErrors([ 'No Such A Subject Exists!']);

    }
}
