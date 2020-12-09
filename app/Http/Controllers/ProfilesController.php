<?php

namespace App\Http\Controllers;

use App\User;

use App\tweets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Followable;
class ProfilesController extends Controller
{
    public function show(User $user){

    
   

    return  view('profiles.show', compact('user')); 

    }

    public function edit(User $user){



        if ($user->isNot(auth()->user())){

            abort(404);
        }

        return  view('profiles.edit', compact('user') );

        
    
        }


        public function index(){



             $tests = Auth::user()->follows->paginate(4);

           


        //     $users = DB::table('follows')->where('user_id', 1)->pluck('following_user_id')->toArray();

        //    $author = User::select('name')
        //     ->whereIn('id', $users)->pluck('name')->paginate(4);
            

        return view ('_friends-list', compact('tests'));

        //  return  view('', compact('tests') );
    
            
        
            }
}
