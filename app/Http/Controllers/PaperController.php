<?php

namespace App\Http\Controllers;

use App\paper;
use Dompdf\Dompdf;
use App\question;
use App\subject;
use App\User;
use Illuminate\Http\Request;
use PDF;

use App\Http\Requests;
use Illuminate\View\View;
use Mail;


class PaperController extends Controller
{
    public function testtrial(Request $request){//function called by python program using HTTP requests
        $papermatch=['id' =>$request->id];
        $paper=Paper::where($papermatch)->first();
        $user_email=$paper->user_email;
        $deadline=$paper->deadline;
        $level=$paper->level;
        $mcq=(int)$paper->mcqno;
        $essay=(int)$paper->essayno;
        $section=$paper->section;
        $section=explode("#",$section);
        $start=(int)$section[0];
        $end=(int)$section[1];
        $subject=$paper->subject;
        $receiver_email=$paper->receiver_email;

        $mcqname='mcq';
        $essayname='essay';
        $match1=['questionbankemail' => $user_email,'subjectname' =>$subject,'type'=>$mcqname];
        $match2=['questionbankemail' => $user_email,'subjectname' =>$subject,'type'=>$essayname];
        $mcqs=question::where($match1)->whereBetween('section', array($start, $end))->get();
        $essays=question::where($match2)->whereBetween('section', array($start, $end))->get();

        $mcqmin=array();
        $mcqmod=array();
        $mcqmax=array();

        $essaymin=array();
        $essaymod=array();
        $essaymax=array();

        foreach ($mcqs as $question) {//put chosen mcq in to arrays of relevant hardness
            if($question->levelofhardness =='min'){
                array_push($mcqmin,$question);
            }
            if($question->levelofhardness =='max'){
                array_push($mcqmax,$question);
            }
            if($question->levelofhardness =='moderate'){
                array_push($mcqmod,$question);
            }
        }

        foreach ($essays as $question) {//put chosen essay in to arrays of relevant hardness
            if($question->levelofhardness =='min'){
                array_push($essaymin,$question);
            }
            if($question->levelofhardness =='max'){
                array_push($essaymax,$question);
            }
            if($question->levelofhardness =='moderate'){
                array_push($essaymod,$question);
            }
        }

        $finalmcq=array();//arrays to keep chosen mcqs
        $finalessay=array();//arrays to keep chosen essays

        if($level=='min'){//logic if hardness level min
            if($mcq <= count($mcqmin)){//user has required amount of mcqs for relevant hardness level
                $chosenmcq=array();//keep track of indexes of chosen mcqs
                while ($mcq!=count($finalmcq)) {//randomly picking questions
                    $index=rand(0,count($mcqmin)-1);
                    if(!in_array($index,$chosenmcq)){
                        array_push($finalmcq,$mcqmin[$index]);
                        array_push($chosenmcq,$index);

                    }

                }
            }else{//user hasn't  required amount of mcqs for relevant hardness level
                foreach ($mcqmin as $question) {//select all available ones
                    array_push($finalmcq,$question);
                }
                $chosenmcqmod=array();
                $chosenmcqmax=array();
                $probability=1;
                while ($mcq!=count($finalmcq)) {//choose from other hardness levels
                    if($probability!=3){//give more probabilty to moderate level ones
                        $probability=$probability+1;
                        $indexmod=rand(0,count($mcqmod)-1);
                        if(!in_array($indexmod,$chosenmcqmod)){
                            array_push($finalmcq,$mcqmod[$indexmod]);
                            array_push($chosenmcqmod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($mcqmax)-1);
                        if(!in_array($indexmax,$chosenmcqmax)){
                            array_push($finalmcq,$mcqmax[$indexmax]);
                            array_push($chosenmcqmax,$indexmax);

                        }

                    }
                }

            }


            if($essay <= count($essaymin)){//same logic applies to choose essay ones
                $chosenessay=array();
                while ($essay!=count($finalessay)) {
                    $index=rand(0,count($essaymin)-1);
                    if(!in_array($index,$chosenessay)){
                        array_push($finalessay,$essaymin[$index]);
                        array_push($chosenessay,$index);

                    }

                }
            }else{
                foreach ($essaymin as $question) {
                    array_push($finalessay,$question);
                }
                $chosenessaymod=array();
                $chosenessaymax=array();
                $probability=1;
                while ($essay!=count($finalessay)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmod=rand(0,count($essaymod)-1);
                        if(!in_array($indexmod,$chosenessaymod)){
                            array_push($finalessay,$essaymod[$indexmod]);
                            array_push($chosenessaymod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($essaymax)-1);
                        if(!in_array($indexmax,$chosenessaymax)){
                            array_push($finalessay,$essaymax[$indexmax]);
                            array_push($chosenessaymax,$indexmax);

                        }

                    }
                }

            }


        }
        if($level=='max'){//same logic applys for max level hard ones
            if($mcq <= count($mcqmax)){
                $chosenmcq=array();
                while ($mcq!=count($finalmcq)) {
                    $index=rand(0,count($mcqmax)-1);
                    if(!in_array($index,$chosenmcq)){
                        array_push($finalmcq,$mcqmax[$index]);
                        array_push($chosenmcq,$index);

                    }

                }
            }else{
                foreach ($mcqmax as $question) {
                    array_push($finalmcq,$question);
                }
                $chosenmcqmod=array();
                $chosenmcqmin=array();
                $probability=1;
                while ($mcq!=count($finalmcq)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmod=rand(0,count($mcqmod)-1);
                        if(!in_array($indexmod,$chosenmcqmod)){
                            array_push($finalmcq,$mcqmod[$indexmod]);
                            array_push($chosenmcqmod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmin=rand(0,count($mcqmin)-1);
                        if(!in_array($indexmin,$chosenmcqmin)){
                            array_push($finalmcq,$mcqmin[$indexmin]);
                            array_push($chosenmcqmin,$indexmin);

                        }

                    }
                }

            }


            if($essay <= count($essaymax)){
                $chosenessay=array();
                while ($essay!=count($finalessay)) {
                    $index=rand(0,count($essaymax)-1);
                    if(!in_array($index,$chosenessay)){
                        array_push($finalessay,$essaymax[$index]);
                        array_push($chosenessay,$index);

                    }

                }
            }else{
                foreach ($essaymax as $question) {
                    array_push($finalessay,$question);
                }
                $chosenessaymod=array();
                $chosenessaymin=array();
                $probability=1;
                while ($essay!=count($finalessay)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmod=rand(0,count($essaymod)-1);
                        if(!in_array($indexmod,$chosenessaymod)){
                            array_push($finalessay,$essaymod[$indexmod]);
                            array_push($chosenessaymod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmin=rand(0,count($essaymin)-1);
                        if(!in_array($indexmin,$chosenessaymin)){
                            array_push($finalessay,$essaymin[$indexmin]);
                            array_push($chosenessaymin,$indexmin);

                        }

                    }
                }

            }

        }
        if($level=='moderate'){//same logic applies for min level hard ones
            if($mcq <= count($mcqmod)){
                $chosenmcq=array();
                while ($mcq!=count($finalmcq)) {
                    $index=rand(0,count($mcqmod)-1);
                    if(!in_array($index,$chosenmcq)){
                        array_push($finalmcq,$mcqmod[$index]);
                        array_push($chosenmcq,$index);

                    }

                }
            }else{
                foreach ($mcqmod as $question) {
                    array_push($finalmcq,$question);
                }
                $chosenmcqmin=array();
                $chosenmcqmax=array();
                $probability=1;
                while ($mcq!=count($finalmcq)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmin=rand(0,count($mcqmin)-1);
                        if(!in_array($indexmin,$chosenmcqmin)){
                            array_push($finalmcq,$mcqmin[$indexmin]);
                            array_push($chosenmcqmin,$indexmin);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($mcqmax)-1);
                        if(!in_array($indexmax,$chosenmcqmax)){
                            array_push($finalmcq,$mcqmax[$indexmax]);
                            array_push($chosenmcqmax,$indexmax);

                        }

                    }
                }

            }


            if($essay <= count($essaymod)){
                $chosenessay=array();
                while ($essay!=count($finalessay)) {
                    $index=rand(0,count($essaymod)-1);
                    if(!in_array($index,$chosenessay)){
                        array_push($finalessay,$essaymod[$index]);
                        array_push($chosenessay,$index);

                    }

                }
            }else{
                foreach ($essaymod as $question) {
                    array_push($finalessay,$question);
                }
                $chosenessaymin=array();
                $chosenessaymax=array();
                $probability=1;
                while ($essay!=count($finalessay)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmin=rand(0,count($essaymin)-1);
                        if(!in_array($indexmin,$chosenessaymin)){
                            array_push($finalessay,$essaymin[$indexmin]);
                            array_push($chosenessaymin,$indexmin);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($essaymax)-1);
                        if(!in_array($indexmax,$chosenessaymax)){
                            array_push($finalessay,$essaymax[$indexmax]);
                            array_push($chosenessaymax,$indexmax);

                        }

                    }
                }

            }

        }

        $total=array();
        array_push($total,$finalmcq);
        array_push($total,$finalessay);
        $view=view("paper")->with(array('total'=>$total));//create a view
        $dompdf=new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $output=$dompdf->output();
        file_put_contents('Paper.pdf', $output);//save created pdf

        Mail::send('paperhander',[],function($message) use ($receiver_email)
        {
            $message->to($receiver_email)->subject('Download your Paper');
            $message->attach('C:\xampp\htdocs\SE_Project\public\Paper.pdf');

        });//send the mail

    }

    public function papermanualbuild(Request $request){//function to build papers manually
        $uemail=$request->input('email');// take user email and paper id given by ussr
        $id=$request->input('id');
        $papermatch=['user_email' => $uemail,'id' =>$id];
        $paper=Paper::where($papermatch)->first();

        if(!is_null($paper)){//same logic used as in testTrial function
            $papermatch=['id' =>$id];
            $paper=Paper::where($papermatch)->first();
            $user_email=$paper->user_email;
            $deadline=$paper->deadline;
            $level=$paper->level;
            $mcq=(int)$paper->mcqno;
            $essay=(int)$paper->essayno;
            $section=$paper->section;
            $section=explode("#",$section);
            $start=(int)$section[0];
            $end=(int)$section[1];
            $subject=$paper->subject;
            $receiver_email=$paper->receiver_email;

            $mcqname='mcq';
            $essayname='essay';
            $match1=['questionbankemail' => $user_email,'subjectname' =>$subject,'type'=>$mcqname];
            $match2=['questionbankemail' => $user_email,'subjectname' =>$subject,'type'=>$essayname];
            $mcqs=question::where($match1)->whereBetween('section', array($start, $end))->get();
            $essays=question::where($match2)->whereBetween('section', array($start, $end))->get();

            $mcqmin=array();
            $mcqmod=array();
            $mcqmax=array();

            $essaymin=array();
            $essaymod=array();
            $essaymax=array();

            foreach ($mcqs as $question) {
                if($question->levelofhardness =='min'){
                    array_push($mcqmin,$question);
                }
                if($question->levelofhardness =='max'){
                    array_push($mcqmax,$question);
                }
                if($question->levelofhardness =='moderate'){
                    array_push($mcqmod,$question);
                }
            }

            foreach ($essays as $question) {
                if($question->levelofhardness =='min'){
                    array_push($essaymin,$question);
                }
                if($question->levelofhardness =='max'){
                    array_push($essaymax,$question);
                }
                if($question->levelofhardness =='moderate'){
                    array_push($essaymod,$question);
                }
            }

            $finalmcq=array();
            $finalessay=array();

            if($level=='min'){
                if($mcq <= count($mcqmin)){
                    $chosenmcq=array();
                    while ($mcq!=count($finalmcq)) {
                        $index=rand(0,count($mcqmin)-1);
                        if(!in_array($index,$chosenmcq)){
                            array_push($finalmcq,$mcqmin[$index]);
                            array_push($chosenmcq,$index);

                        }

                    }
                }else{
                    foreach ($mcqmin as $question) {
                        array_push($finalmcq,$question);
                    }
                    $chosenmcqmod=array();
                    $chosenmcqmax=array();
                    $probability=1;
                    while ($mcq!=count($finalmcq)) {
                        if($probability!=3){
                            $probability=$probability+1;
                            $indexmod=rand(0,count($mcqmod)-1);
                            if(!in_array($indexmod,$chosenmcqmod)){
                                array_push($finalmcq,$mcqmod[$indexmod]);
                                array_push($chosenmcqmod,$indexmod);

                            }

                        }else{
                            $probability=1;
                            $indexmax=rand(0,count($mcqmax)-1);
                            if(!in_array($indexmax,$chosenmcqmax)){
                                array_push($finalmcq,$mcqmax[$indexmax]);
                                array_push($chosenmcqmax,$indexmax);

                            }

                        }
                    }

                }


                if($essay <= count($essaymin)){
                    $chosenessay=array();
                    while ($essay!=count($finalessay)) {
                        $index=rand(0,count($essaymin)-1);
                        if(!in_array($index,$chosenessay)){
                            array_push($finalessay,$essaymin[$index]);
                            array_push($chosenessay,$index);

                        }

                    }
                }else{
                    foreach ($essaymin as $question) {
                        array_push($finalessay,$question);
                    }
                    $chosenessaymod=array();
                    $chosenessaymax=array();
                    $probability=1;
                    while ($essay!=count($finalessay)) {
                        if($probability!=3){
                            $probability=$probability+1;
                            $indexmod=rand(0,count($essaymod)-1);
                            if(!in_array($indexmod,$chosenessaymod)){
                                array_push($finalessay,$essaymod[$indexmod]);
                                array_push($chosenessaymod,$indexmod);

                            }

                        }else{
                            $probability=1;
                            $indexmax=rand(0,count($essaymax)-1);
                            if(!in_array($indexmax,$chosenessaymax)){
                                array_push($finalessay,$essaymax[$indexmax]);
                                array_push($chosenessaymax,$indexmax);

                            }

                        }
                    }

                }


            }
            if($level=='max'){
                if($mcq <= count($mcqmax)){
                    $chosenmcq=array();
                    while ($mcq!=count($finalmcq)) {
                        $index=rand(0,count($mcqmax)-1);
                        if(!in_array($index,$chosenmcq)){
                            array_push($finalmcq,$mcqmax[$index]);
                            array_push($chosenmcq,$index);

                        }

                    }
                }else{
                    foreach ($mcqmax as $question) {
                        array_push($finalmcq,$question);
                    }
                    $chosenmcqmod=array();
                    $chosenmcqmin=array();
                    $probability=1;
                    while ($mcq!=count($finalmcq)) {
                        if($probability!=3){
                            $probability=$probability+1;
                            $indexmod=rand(0,count($mcqmod)-1);
                            if(!in_array($indexmod,$chosenmcqmod)){
                                array_push($finalmcq,$mcqmod[$indexmod]);
                                array_push($chosenmcqmod,$indexmod);

                            }

                        }else{
                            $probability=1;
                            $indexmin=rand(0,count($mcqmin)-1);
                            if(!in_array($indexmin,$chosenmcqmin)){
                                array_push($finalmcq,$mcqmin[$indexmin]);
                                array_push($chosenmcqmin,$indexmin);

                            }

                        }
                    }

                }


                if($essay <= count($essaymax)){
                    $chosenessay=array();
                    while ($essay!=count($finalessay)) {
                        $index=rand(0,count($essaymax)-1);
                        if(!in_array($index,$chosenessay)){
                            array_push($finalessay,$essaymax[$index]);
                            array_push($chosenessay,$index);

                        }

                    }
                }else{
                    foreach ($essaymax as $question) {
                        array_push($finalessay,$question);
                    }
                    $chosenessaymod=array();
                    $chosenessaymin=array();
                    $probability=1;
                    while ($essay!=count($finalessay)) {
                        if($probability!=3){
                            $probability=$probability+1;
                            $indexmod=rand(0,count($essaymod)-1);
                            if(!in_array($indexmod,$chosenessaymod)){
                                array_push($finalessay,$essaymod[$indexmod]);
                                array_push($chosenessaymod,$indexmod);

                            }

                        }else{
                            $probability=1;
                            $indexmin=rand(0,count($essaymin)-1);
                            if(!in_array($indexmin,$chosenessaymin)){
                                array_push($finalessay,$essaymin[$indexmin]);
                                array_push($chosenessaymin,$indexmin);

                            }

                        }
                    }

                }

            }
            if($level=='moderate'){
                if($mcq <= count($mcqmod)){
                    $chosenmcq=array();
                    while ($mcq!=count($finalmcq)) {
                        $index=rand(0,count($mcqmod)-1);
                        if(!in_array($index,$chosenmcq)){
                            array_push($finalmcq,$mcqmod[$index]);
                            array_push($chosenmcq,$index);

                        }

                    }
                }else{
                    foreach ($mcqmod as $question) {
                        array_push($finalmcq,$question);
                    }
                    $chosenmcqmin=array();
                    $chosenmcqmax=array();
                    $probability=1;
                    while ($mcq!=count($finalmcq)) {
                        if($probability!=3){
                            $probability=$probability+1;
                            $indexmin=rand(0,count($mcqmin)-1);
                            if(!in_array($indexmin,$chosenmcqmin)){
                                array_push($finalmcq,$mcqmin[$indexmin]);
                                array_push($chosenmcqmin,$indexmin);

                            }

                        }else{
                            $probability=1;
                            $indexmax=rand(0,count($mcqmax)-1);
                            if(!in_array($indexmax,$chosenmcqmax)){
                                array_push($finalmcq,$mcqmax[$indexmax]);
                                array_push($chosenmcqmax,$indexmax);

                            }

                        }
                    }

                }


                if($essay <= count($essaymod)){
                    $chosenessay=array();
                    while ($essay!=count($finalessay)) {
                        $index=rand(0,count($essaymod)-1);
                        if(!in_array($index,$chosenessay)){
                            array_push($finalessay,$essaymod[$index]);
                            array_push($chosenessay,$index);

                        }

                    }
                }else{
                    foreach ($essaymod as $question) {
                        array_push($finalessay,$question);
                    }
                    $chosenessaymin=array();
                    $chosenessaymax=array();
                    $probability=1;
                    while ($essay!=count($finalessay)) {
                        if($probability!=3){
                            $probability=$probability+1;
                            $indexmin=rand(0,count($essaymin)-1);
                            if(!in_array($indexmin,$chosenessaymin)){
                                array_push($finalessay,$essaymin[$indexmin]);
                                array_push($chosenessaymin,$indexmin);

                            }

                        }else{
                            $probability=1;
                            $indexmax=rand(0,count($essaymax)-1);
                            if(!in_array($indexmax,$chosenessaymax)){
                                array_push($finalessay,$essaymax[$indexmax]);
                                array_push($chosenessaymax,$indexmax);

                            }

                        }
                    }

                }

            }

            $total=array();
            array_push($total,$finalmcq);
            array_push($total,$finalessay);
            $view=view("paper")->with(array('total'=>$total));
            $dompdf=new Dompdf();
            $dompdf->loadHtml($view);
            $dompdf->setPaper('A4','landscape');
            $dompdf->render();
            $output=$dompdf->output();
            $dompdf->stream('Online Question Paper Generating System',array('Attachment'=>0));



        }
        return redirect('/paperset')->withErrors(['No Such A Paper Belongs To User!']);
    }


    public function insertpaper(Request $request){//function to insert user given data to database
        $uemail=$request->input('email');
        $deadline=$request->input('deadline');
        $levelofharness=$request->input('levelofharness');
        $mcqno=$request->input('mcqno');
        $essayno=$request->input('essayno');
        $ssection=$request->input('ssection');
        $esection=$request->input('esection');
        $subject_name=$request->input('subject_name');
        $remail=$request->input('remail');

        $matchThese = ['email' => $uemail,'admin' =>0];
        $euser=User::where($matchThese)->first();
        if(!is_null($euser)){

            if(strtotime("now") < strtotime($deadline)){//check whether deadline is achievable by compare deadline with current time

                $match = ['useremail' => $uemail,'subjectname' =>$subject_name];
                $esubject=subject::where($match)->first();
                if(!is_null($esubject)){
                    $esections=$esubject->noofsections;
                    if((int)$ssection<(int)$esection){//check given section range is valid for given subject
                        if(0<=(int)$ssection and (int)$esection<=$esections) {
                            if(0<(int)$mcqno and 0<(int)$essayno){//check whether user got required amount of questions to build the paper
                                $mcqname='mcq';
                                $essayname='essay';
                                $ssection=(int)$ssection;
                                $esection=(int)$esection;
                                $match1=['questionbankemail' => $uemail,'subjectname' =>$subject_name,'type'=>$mcqname];
                                $match2=['questionbankemail' => $uemail,'subjectname' =>$subject_name,'type'=>$essayname];
                                $mcq=question::where($match1)->whereBetween('section', array($ssection, $esection))->get();
                                $essay=question::where($match2)->whereBetween('section', array($ssection, $esection))->get();
                                if((int)$mcqno<= count($mcq) and (int)$essayno<= count($essay)){
                                    $paper=new Paper;
                                    $paper->user_email=$uemail;
                                    $paper->deadline=strtotime($deadline);
                                    $paper->level=$levelofharness;
                                    $paper->mcqno=(int)$mcqno;
                                    $paper->essayno=(int)$essayno;
                                    $paper->section=$ssection.'#'.$esection;
                                    $paper->subject=$subject_name;
                                    $paper->receiver_email=$remail;
                                    $paper->save();

                                    return redirect('/')->withErrors(['Paper Successfully Set!']);
                                }
                                return redirect('/paperset')->withErrors(['Not Enough Questions to Generate The Paper!']);


                            }
                            return redirect('/paperset')->withErrors(['Give Positive values to Question Count!']);


                        }
                        return redirect('/paperset')->withErrors(['Subject Does Not Have Given Questions!']);
                    }
                    return redirect('/paperset')->withErrors(['Section Order Incorrect!']);

                }
                return redirect('/paperset')->withErrors(['No Such A Subject Belongs To User!']);



            }
            return redirect('/paperset')->withErrors(['Deadline Cannot Be Achievable!']);




        }
        return redirect('/paperset')->withErrors(['No Such A User']);





    }

    public function searchpaper(Request $request){//function to search papers
        $email=$request->input('email');
        $subject_name=$request->input('subject_name');
        $matchThese = ['user_email' => $email,'subject' =>$subject_name];
        $paper=Paper::where($matchThese)->get();


        if(count($paper)!=0)
        {
            return view("paperresult")->with(array('papers'=>$paper));

        }

        return redirect('/papermodify')->withErrors(['No Matching Papers']);

    }


    public function modifypaper(Request $request){//function to modiify papers same validation process applies here as in insert question
        $uemail=$request->input('email');
        $id=$request->input('id');
        $deadline=$request->input('deadline');
        $levelofharness=$request->input('levelofharness');
        $mcqno=$request->input('mcqno');
        $essayno=$request->input('essayno');
        $ssection=$request->input('ssection');
        $esection=$request->input('esection');
        $subject_name=$request->input('subject_name');
        $remail=$request->input('remail');

        $papermatch=['user_email' => $uemail,'id' =>$id];
        $paper=Paper::where($papermatch)->first();
        if(!is_null($paper)){
            $matchThese = ['email' => $uemail,'admin' =>0];
            $euser=User::where($matchThese)->first();
            if(!is_null($euser)){
                if(strtotime("now")<strtotime($deadline)){
                    $match = ['useremail' => $uemail,'subjectname' =>$subject_name];
                    $esubject=subject::where($match)->first();
                    if(!is_null($esubject)){
                        $esections=$esubject->noofsections;
                        if((int)$ssection<(int)$esection){
                            if(0<=(int)$ssection and (int)$esection<=$esections) {
                                if(0<(int)$mcqno and 0<(int)$essayno){
                                    $mcqname='mcq';
                                    $essayname='essay';
                                    $ssection=(int)$ssection;
                                    $esection=(int)$esection;
                                    $match1=['questionbankemail' => $uemail,'subjectname' =>$subject_name,'type'=>$mcqname];
                                    $match2=['questionbankemail' => $uemail,'subjectname' =>$subject_name,'type'=>$essayname];
                                    $mcq=question::where($match1)->whereBetween('section', array($ssection, $esection))->get();
                                    $essay=question::where($match2)->whereBetween('section', array($ssection, $esection))->get();
                                    if((int)$mcqno<= count($mcq) and (int)$essayno<= count($essay)){

                                        $paper->user_email=$uemail;
                                        $paper->deadline=strtotime($deadline);
                                        $paper->level=$levelofharness;
                                        $paper->mcqno=(int)$mcqno;
                                        $paper->essayno=(int)$essayno;
                                        $paper->section=$ssection.'#'.$esection;
                                        $paper->subject=$subject_name;
                                        $paper->receiver_email=$remail;
                                        $paper->save();

                                        return redirect('/')->withErrors(['Paper Successfully Set!']);
                                    }
                                    return redirect('/paperset')->withErrors(['Not Enough Questions to Generate The Paper!']);


                                }
                                return redirect('/paperset')->withErrors(['Give Positive values to Question Count!']);


                            }
                            return redirect('/paperset')->withErrors(['Subject Does Not Have Given Questions!']);
                        }
                        return redirect('/paperset')->withErrors(['Section Order Incorrect!']);

                    }
                    return redirect('/paperset')->withErrors(['No Such A Subject Belongs To User!']);



                }
                return redirect('/paperset')->withErrors(['Deadline Cannot Be Achievable!']);




            }
            return redirect('/paperset')->withErrors(['No Such A User']);

        }
        return redirect('/givemodifypaper')->withErrors(['No Such A Paper Belongs To User!']);





    }


    public function deletepaper(Request $request){//function to delete a paper
        $uemail=$request->input('email');
        $id=$request->input('id');
        $papermatch=['user_email' => $uemail,'id' =>$id];
        $paper=Paper::where($papermatch)->first();

        if(!is_null($paper)){
            $paper->delete();
            return redirect('/')->withErrors(['Paper Successfully Deleted!']);

        }
        return redirect('/paperdelete')->withErrors(['No Such A Paper Belongs To User!']);
    }

    public function paperbuilder(){//function to admin to build papers manually same logic as in testTrial
        $papermatch=['id' =>35];
        $paper=Paper::where($papermatch)->first();
        $user_email=$paper->user_email;
        $deadline=$paper->deadline;
        $level=$paper->level;
        $mcq=(int)$paper->mcqno;
        $essay=(int)$paper->essayno;
        $section=$paper->section;
        $section=explode("#",$section);
        $start=(int)$section[0];
        $end=(int)$section[1];
        $subject=$paper->subject;
        $receiver_email=$paper->receiver_email;

        $mcqname='mcq';
        $essayname='essay';
        $match1=['questionbankemail' => $user_email,'subjectname' =>$subject,'type'=>$mcqname];
        $match2=['questionbankemail' => $user_email,'subjectname' =>$subject,'type'=>$essayname];
        $mcqs=question::where($match1)->whereBetween('section', array($start, $end))->get();
        $essays=question::where($match2)->whereBetween('section', array($start, $end))->get();

        $mcqmin=array();
        $mcqmod=array();
        $mcqmax=array();

        $essaymin=array();
        $essaymod=array();
        $essaymax=array();

        foreach ($mcqs as $question) {
            if($question->levelofhardness =='min'){
                array_push($mcqmin,$question);
            }
            if($question->levelofhardness =='max'){
                array_push($mcqmax,$question);
            }
            if($question->levelofhardness =='moderate'){
                array_push($mcqmod,$question);
            }
        }

        foreach ($essays as $question) {
            if($question->levelofhardness =='min'){
                array_push($essaymin,$question);
            }
            if($question->levelofhardness =='max'){
                array_push($essaymax,$question);
            }
            if($question->levelofhardness =='moderate'){
                array_push($essaymod,$question);
            }
        }

        $finalmcq=array();
        $finalessay=array();

        if($level=='min'){
            if($mcq <= count($mcqmin)){
                $chosenmcq=array();
                while ($mcq!=count($finalmcq)) {
                    $index=rand(0,count($mcqmin)-1);
                    if(!in_array($index,$chosenmcq)){
                        array_push($finalmcq,$mcqmin[$index]);
                        array_push($chosenmcq,$index);

                    }

                }
            }else{
                foreach ($mcqmin as $question) {
                    array_push($finalmcq,$question);
                }
                $chosenmcqmod=array();
                $chosenmcqmax=array();
                $probability=1;
                while ($mcq!=count($finalmcq)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmod=rand(0,count($mcqmod)-1);
                        if(!in_array($indexmod,$chosenmcqmod)){
                            array_push($finalmcq,$mcqmod[$indexmod]);
                            array_push($chosenmcqmod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($mcqmax)-1);
                        if(!in_array($indexmax,$chosenmcqmax)){
                            array_push($finalmcq,$mcqmax[$indexmax]);
                            array_push($chosenmcqmax,$indexmax);

                        }

                    }
                }

            }


            if($essay <= count($essaymin)){
                $chosenessay=array();
                while ($essay!=count($finalessay)) {
                    $index=rand(0,count($essaymin)-1);
                    if(!in_array($index,$chosenessay)){
                        array_push($finalessay,$essaymin[$index]);
                        array_push($chosenessay,$index);

                    }

                }
            }else{
                foreach ($essaymin as $question) {
                    array_push($finalessay,$question);
                }
                $chosenessaymod=array();
                $chosenessaymax=array();
                $probability=1;
                while ($essay!=count($finalessay)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmod=rand(0,count($essaymod)-1);
                        if(!in_array($indexmod,$chosenessaymod)){
                            array_push($finalessay,$essaymod[$indexmod]);
                            array_push($chosenessaymod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($essaymax)-1);
                        if(!in_array($indexmax,$chosenessaymax)){
                            array_push($finalessay,$essaymax[$indexmax]);
                            array_push($chosenessaymax,$indexmax);

                        }

                    }
                }

            }


        }
        if($level=='max'){
            if($mcq <= count($mcqmax)){
                $chosenmcq=array();
                while ($mcq!=count($finalmcq)) {
                    $index=rand(0,count($mcqmax)-1);
                    if(!in_array($index,$chosenmcq)){
                        array_push($finalmcq,$mcqmax[$index]);
                        array_push($chosenmcq,$index);

                    }

                }
            }else{
                foreach ($mcqmax as $question) {
                    array_push($finalmcq,$question);
                }
                $chosenmcqmod=array();
                $chosenmcqmin=array();
                $probability=1;
                while ($mcq!=count($finalmcq)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmod=rand(0,count($mcqmod)-1);
                        if(!in_array($indexmod,$chosenmcqmod)){
                            array_push($finalmcq,$mcqmod[$indexmod]);
                            array_push($chosenmcqmod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmin=rand(0,count($mcqmin)-1);
                        if(!in_array($indexmin,$chosenmcqmin)){
                            array_push($finalmcq,$mcqmin[$indexmin]);
                            array_push($chosenmcqmin,$indexmin);

                        }

                    }
                }

            }


            if($essay <= count($essaymax)){
                $chosenessay=array();
                while ($essay!=count($finalessay)) {
                    $index=rand(0,count($essaymax)-1);
                    if(!in_array($index,$chosenessay)){
                        array_push($finalessay,$essaymax[$index]);
                        array_push($chosenessay,$index);

                    }

                }
            }else{
                foreach ($essaymax as $question) {
                    array_push($finalessay,$question);
                }
                $chosenessaymod=array();
                $chosenessaymin=array();
                $probability=1;
                while ($essay!=count($finalessay)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmod=rand(0,count($essaymod)-1);
                        if(!in_array($indexmod,$chosenessaymod)){
                            array_push($finalessay,$essaymod[$indexmod]);
                            array_push($chosenessaymod,$indexmod);

                        }

                    }else{
                        $probability=1;
                        $indexmin=rand(0,count($essaymin)-1);
                        if(!in_array($indexmin,$chosenessaymin)){
                            array_push($finalessay,$essaymin[$indexmin]);
                            array_push($chosenessaymin,$indexmin);

                        }

                    }
                }

            }

        }
        if($level=='moderate'){
            if($mcq <= count($mcqmod)){
                $chosenmcq=array();
                while ($mcq!=count($finalmcq)) {
                    $index=rand(0,count($mcqmod)-1);
                    if(!in_array($index,$chosenmcq)){
                        array_push($finalmcq,$mcqmod[$index]);
                        array_push($chosenmcq,$index);

                    }

                }
            }else{
                foreach ($mcqmod as $question) {
                    array_push($finalmcq,$question);
                }
                $chosenmcqmin=array();
                $chosenmcqmax=array();
                $probability=1;
                while ($mcq!=count($finalmcq)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmin=rand(0,count($mcqmin)-1);
                        if(!in_array($indexmin,$chosenmcqmin)){
                            array_push($finalmcq,$mcqmin[$indexmin]);
                            array_push($chosenmcqmin,$indexmin);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($mcqmax)-1);
                        if(!in_array($indexmax,$chosenmcqmax)){
                            array_push($finalmcq,$mcqmax[$indexmax]);
                            array_push($chosenmcqmax,$indexmax);

                        }

                    }
                }

            }


            if($essay <= count($essaymod)){
                $chosenessay=array();
                while ($essay!=count($finalessay)) {
                    $index=rand(0,count($essaymod)-1);
                    if(!in_array($index,$chosenessay)){
                        array_push($finalessay,$essaymod[$index]);
                        array_push($chosenessay,$index);

                    }

                }
            }else{
                foreach ($essaymod as $question) {
                    array_push($finalessay,$question);
                }
                $chosenessaymin=array();
                $chosenessaymax=array();
                $probability=1;
                while ($essay!=count($finalessay)) {
                    if($probability!=3){
                        $probability=$probability+1;
                        $indexmin=rand(0,count($essaymin)-1);
                        if(!in_array($indexmin,$chosenessaymin)){
                            array_push($finalessay,$essaymin[$indexmin]);
                            array_push($chosenessaymin,$indexmin);

                        }

                    }else{
                        $probability=1;
                        $indexmax=rand(0,count($essaymax)-1);
                        if(!in_array($indexmax,$chosenessaymax)){
                            array_push($finalessay,$essaymax[$indexmax]);
                            array_push($chosenessaymax,$indexmax);

                        }

                    }
                }

            }

        }

        $total=array();
        array_push($total,$finalmcq);
        array_push($total,$finalessay);
        $view=view("paper")->with(array('total'=>$total));
        $dompdf=new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $output=$dompdf->output();
        file_put_contents('Paper.pdf', $output);

        Mail::send('paperhander',[],function($message) use ($receiver_email)
        {
            $message->to($receiver_email)->subject('Download your Paper');
            $message->attach('C:\xampp\htdocs\SE_Project\public\Paper.pdf');

        });
        return redirect('/adminhome')->withErrors(['Paper Is Successfully Sent To The Receiver!']);
        //$dompdf->stream('Online Question Paper Generating System',array('Attachment'=>0));



        //$pdf = PDF::loadView($view);
        //return $pdf->download($view);
        //return $view;
        //return view("paper")->with(array('total'=>$total));

    }

}
