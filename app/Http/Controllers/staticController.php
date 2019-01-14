<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

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
    public function Store(Request $request)
    {
        $contact = new Contact();
        $data=$this->validate($request,[
            'email'=>'required',
            'comment'=>'required'
        ]);
        $contact->saveComment($data);
        return redirect('/Contact');
    }

    public function About(){
        return view('about');
    }


}
