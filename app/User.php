<?php

namespace App;

use App\like;
use App\tweets;
use App\Comments;
use App\Followable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function timeline(){


        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
        return  tweets::whereIn('user_id', $ids)->latest()->paginate(10);

    }




    public function tweets(){

        // return  $this->hasMany(tweets::class)->latest()->pagination(2);
        return  $this->hasMany(tweets::class)->orderBy('id', 'DESC');
    }

    public function path($append = ''){

        $path =  route('profile', $this->name);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function liking(){

        return  $this->hasMany(like::class);
    }


    public function commentPostings(){

        return  $this->hasMany(commentPosting::class, 'comment_id');
    }



}
