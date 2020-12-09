<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class listController extends Controller
{
    public function index() {


       $users = User::paginate(75);
       $myusers =  (auth()->user())->follows;

      

      

        return view ('/lists' , compact('users','myusers'));
    }

   
    
    
}
