<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class commentPosting extends Model
{
    protected $guarded = [];
    protected $table = 'comments';



    public function tweets(){

        return  $this->belongsTo(tweets::class);
    }


    public function users(){

        return  $this->belongsTo(User::class);
    }
}
