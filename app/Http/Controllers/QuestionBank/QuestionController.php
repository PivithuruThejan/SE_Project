<?php

namespace App\Http\Controllers\Questionbank;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;

class QuestionController extends Controller
{
    public function __construct(){
        $this->middleware('questionbank');
    }

    public function index(){

        return view('questionbankhome');
    }
}
