<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

trait Followable
{



    public function follow(User $user){ 

        return  $this->follows()->save($user);
    }

    public function unfollow(User $user){ 

        return  $this->follows()->detach($user);
    }


    public function follows(){

        return  $this->belongsToMany(user::class,'follows','user_id','following_user_id');


        // $user_id = Auth::user()->id;
        // $users = DB::table('follows')
        //         ->where('user_id', $user_id)->get();

        //         return ([

          
        //             'users' => $users
                
        //         ]);
            
                
    }


    public function toggle(User $user) {

        if($this->following($user)) {

            return $this->unfollow($user);
        }

            return $this->follow($user);
    }



    public function Following(User $user) {

        return $this->follows()
        ->where('following_user_id', $user->id)
        ->exists();
    }




}




?>