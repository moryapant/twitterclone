<?php

namespace App;

use App\like;
use App\commentPosting;
use Illuminate\Database\Eloquent\Model;

class tweets extends Model



{

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function liking(){

        return $this->belongsTo(like::class);
    }

    public function commentPostings(){

        return $this->hasMany(commentPosting::class,'comment_id');
    }

}
