<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staticController extends Controller
{
    public function Home(){
        return view('home');
    }
    public function Profile(){
        return view('profile');
    }
    public function Contact(){
        return view('contact');
    }

    public function About(){
        return view('about');
    }

}
