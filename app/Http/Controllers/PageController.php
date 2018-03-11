<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        // return redirect()->route('login');
        return view('home');
    }

    public function getWelcome(){
        return view('welcome');
    }

}
