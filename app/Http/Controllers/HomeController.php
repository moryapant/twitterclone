<?php

namespace App\Http\Controllers;

use App\tweets;
use App\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

   
    {

    //    // $tweets = tweets::latest()->get();
    //     return view('home', [

          
    //         'tweets' => auth()->user()->timeline()
        
    //     ]);
    }



}
