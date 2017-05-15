<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function startSystem(){
        $papermatch=['id' =>1];
        $paper=Paper::where($papermatch)->get();
        return redirect('/paperbuilder')->with(array('papers'=>$paper));




    }
    //
}
