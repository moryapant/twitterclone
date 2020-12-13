<?php

namespace App\Http\Livewire;
use App\User;
use App\tweets;
use App\commentPosting;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Comments extends Component



{

public $body = '';
public $new;
public $comvar;
public $tweets_id;

public $comments;
public $userinfo;
public $user_id;
public $comment  = '';

public $newComment = '';

public $comment_user_id;






public function mount($comvar) {

$this->tweets_id = $this->comvar->id;

$this->user_id = Auth::id();

$this->comments = commentPosting::where('tweets_id', $this->tweets_id)->latest()->get();
 //$this->comments = commentPosting::find($this->tweets_id)->get();

$this->comment_user_id = $this->comments->pluck('user_id');

 //dd($this->comments);

}




public function newComment () {


  $this->newComment = commentPosting::create(['body' => $this->body, 'user_id' => $this->user_id, 'tweets_id' => $this->tweets_id]);

    //$this->comment = ($this->body);

    $this->comments->prepend($this->newComment);

    $this->body = '';


}




public function users($id) {

   $this->comment_user_id = User::find($id);
    return ($this->comment_user_id);
}


    public function render()
    {
        return view('livewire.comments');
    }


}
