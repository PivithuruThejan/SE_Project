<?php

namespace App\Http\Controllers;

use App\question;
use Illuminate\Http\Request;
use App\subject;

use App\Http\Requests;

class QuestionController extends Controller
{
    public function insertessayquestion(Request $request){//function to insert mcq questions
        $email=$request->input('email');//take user given inputs
        $subject_name=$request->input('subject_name');
        $uquestion=$request->input('question');
        $marks=$request->input('marks');
        $level=$request->input('levelofharness');
        $section=$request->input('section');
        $answer=$request->input('answer');

        $matchThese = ['useremail' => $email, 'subjectname' => $subject_name];
        $esubject=subject::where($matchThese)->first();
        if(!is_null($esubject)){//check user given subject exists
            if(0<= $marks and $marks <= 100){
                if(0<=$section and $section<= $esubject->noofsections){
                    $question=new question;
                    $question->type='essay';
                    $question->question=$uquestion;
                    $question->answer=$answer;
                    $question->marks=(int)$marks;
                    $question->section=$section;
                    $question->levelofhardness=$level;
                    $question->questionbankemail=$email;
                    $question->subjectname=$subject_name;
                    $question->save();//save the question  as a model in database
                    return redirect('/questionbank')->withErrors(['Question Is Successfully Inserted!']);



                }
                return redirect('/insertessayquestion')->withErrors(['Related Section Is Incorrect!']);
            }
            return redirect('/insertessayquestion')->withErrors(['Marks are not Between 0 & 100']);


        }

        return redirect('/insertessayquestion')->withErrors(['Email & Subject Name Do not Match']);

    }    //

    public function insertmcqquestion(Request $request){//function to insert essay questions
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $uquestion=$request->input('question');
        $marks=$request->input('marks');
        $level=$request->input('levelofharness');
        $section=$request->input('section');
        $answer1=$request->input('answer');
        $answer2=$request->input('answer2');
        $answer3=$request->input('answer3');
        $answer4=$request->input('answer4');
        $answer=$answer1.'#'.$answer2.'#'.$answer3.'#'.$answer4;//make answers in to a format to store in a one column

        $matchThese = ['useremail' => $email, 'subjectname' => $subject_name];
        $esubject=subject::where($matchThese)->first();
        if(!is_null($esubject)){
            if(0<= $marks and $marks <= 100){
                if(0<=$section and $section<= $esubject->noofsections){
                    $question=new question;
                    $question->type='mcq';
                    $question->question=$uquestion;
                    $question->answer=$answer;
                    $question->marks=(int)$marks;
                    $question->section=$section;
                    $question->levelofhardness=$level;
                    $question->questionbankemail=$email;
                    $question->subjectname=$subject_name;
                    $question->save();
                    return redirect('/questionbank')->withErrors(['Question Is Successfully Inserted!']);



                }
                return redirect('/insertessayquestion')->withErrors(['Related Section Is Incorrect!']);
            }
            return redirect('/insertessayquestion')->withErrors(['Marks are not Between 0 & 100']);


        }

        return redirect('/insertessayquestion')->withErrors(['Email & Subject Name Do not Match']);

    }

    public function searchmodifyessayquestion(Request $request){//function to search essay type questions
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $type='essay';
        $matchThese = ['questionbankemail' => $email, 'subjectname' => $subject_name,'type'=>$type];
        $questions=question::where($matchThese)->get();
        if(count($questions)!=0){

            return view("modifyessayquestion")->with(array('questions'=>$questions));

        }
        return redirect('/searchmodifyessayquestion')->withErrors(['No Matching Questions']);
    }


    public function searchmodifymcqquestion(Request $request){//function to search essay type questions
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $type='mcq';
        $matchThese = ['questionbankemail' => $email, 'subjectname' => $subject_name,'type'=>$type];
        $questions=question::where($matchThese)->get();
        if(count($questions)!=0){

            return view("modifymcqquestion")->with(array('questions'=>$questions));

        }
        return redirect('/searchmodifyessayquestion')->withErrors(['No Matching Questions']);
    }

    public function modifyessay(Request $request){// function to modify essay type question, same validation logic as i inserting
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $uquestion=$request->input('question');
        $marks=$request->input('marks');
        $level=$request->input('levelofharness');
        $section=$request->input('section');
        $answer=$request->input('answer');
        $id=(int)$request->input('id');

        $matchThese = ['useremail' => $email, 'subjectname' => $subject_name];
        $esubject=subject::where($matchThese)->first();
        if(!is_null($esubject)){
            if(0<= $marks and $marks <= 100){//check that marks are in range
                if(0<=$section and $section<= $esubject->noofsections){
                    $match=['id'=>$id];
                    $question=question::where($match)->first();
                    if(!is_null($question)) {
                        $question->question = $uquestion;
                        $question->answer = $answer;
                        $question->marks = (int)$marks;
                        $question->section = $section;
                        $question->levelofhardness = $level;
                        $question->subjectname = $subject_name;
                        $question->save();
                        return redirect('/questionbank')->withErrors(['Question Is Successfully Modified!']);
                    }
                    return redirect('/modifyessayquestion')->withErrors(['Question ID Is Incorrect!']);


                }
                return redirect('/modifyessayquestion')->withErrors(['Related Section Is Incorrect!']);

            }
            return redirect('/modifyessayquestion')->withErrors(['Marks are not Between 0 & 100']);

        }
        return redirect('/modifyessayquestion')->withErrors(['Email & Subject Name Do not Match']);
    }

    public function modifymcq(Request $request){// function to modify essay type question, same validation logic as i inserting
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $uquestion=$request->input('question');
        $marks=$request->input('marks');
        $level=$request->input('levelofharness');
        $section=$request->input('section');
        $answer1=$request->input('answer');
        $answer2=$request->input('answer2');
        $answer3=$request->input('answer3');
        $answer4=$request->input('answer4');
        $answer=$answer1.'#'.$answer2.'#'.$answer3.'#'.$answer4;
        $id=(int)$request->input('id');

        $matchThese = ['useremail' => $email, 'subjectname' => $subject_name];
        $esubject=subject::where($matchThese)->first();

        if(!is_null($esubject)){
            if(0<= $marks and $marks <= 100){
                $match=['id'=>$id];
                $question=question::where($match)->first();
                if(!is_null($question)){
                    $question->question = $uquestion;
                    $question->answer = $answer;
                    $question->marks = (int)$marks;
                    $question->section = $section;
                    $question->levelofhardness = $level;
                    $question->subjectname = $subject_name;
                    $question->save();
                    return redirect('/questionbank')->withErrors(['Question Is Successfully Modified!']);

                }
                return redirect('/modifymcqquestion')->withErrors(['Question ID Is Incorrect!']);

            }
            return redirect('/modifymcqquestion')->withErrors(['Marks are not Between 0 & 100']);

        }
        return redirect('/modifymcqquestion')->withErrors(['Email & Subject Name Do not Match']);



    }

    public function deletequestion(Request $request){//function to delete a question
        $email=$request->input('email');
        $id=(int)$request->input('id');
        $matchThese = ['questionbankemail' => $email, 'id' => $id];
        $equestion=question::where($matchThese)->first();

        if(!is_null($equestion)){
            $equestion->delete();
            return redirect('/questionbank')->withErrors(['Question Is Successfully !']);

        }
        return redirect('/deletequestion')->withErrors(['Such a Question does not exist!']);
    }
}
