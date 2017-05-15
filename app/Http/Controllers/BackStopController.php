<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;


class BackStopController extends Controller
{
    public function setqblogin(){
        session(['qblogin' => 'log']);
    }
    public function getqblogin(){
        return session()->get('qblogin');
    }

    public function setqblogout(){
        session()->put('qblogin', 'logout');
    }
}
