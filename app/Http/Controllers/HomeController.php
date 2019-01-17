<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('manager')){
            return redirect('manager')->with('status','Login sukses !!');
        } elseif ($request->user()->hasRole('employee')) {
            return redirect('employee')->with('status','Login sukses !!');
        }
            return view('home');
    }
        
    
}
