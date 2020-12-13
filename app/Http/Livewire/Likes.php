<?php

namespace App\Http\Livewire;

use App\like;
use App\tweets;
use App\commentPosting;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Likes extends Component
{

    public $like;
    public $unlike;
    public $foo;
    public $tweet_id;
    public $user_id;
    public $test;
    public $check;
    public $commentCount;
    public $retweet;
    public $retweetVar;



    public function mount ($foo) {

       $this->tweet_id = $this->foo->id;
       $this->user_id = Auth::id();
       

        // $this->like =  like::where('tweet_id' ,$this->tweet_id)->count();
        // $this->unlike =  like::where('tweet_id' ,$this->tweet_id)->count();

        
        //$this->like = like::where('tweet_id', '=', $this->tweet_id)->count();

        $this->like = DB::table('likes')
                    -> where('tweet_id', '=', $this->tweet_id)
                    // -> where('vote', '=', 1)
                    -> sum('vote');
        
        // $this->unlike = DB::table('likes')

        //             -> where('tweet_id', '=', $this->tweet_id)
        //             -> where('vote', '=', 2)
        //             -> count();

         $this->test =  like::where('tweet_id', '=', $this->tweet_id)
                   ->where('user_id', '=', $this->user_id)->value('vote'); 

         //dd($this->test);

        $this->commentCount = commentPosting::where('tweets_id', $this->tweet_id)->count();

        

                   
           
                    
                

   }


    public function like () {


        $this->user_id = Auth::id();

        //  $this->check = DB::table('likes')
        //  -> where('tweet_id', '=', $this->tweet_id)
        //  -> where('user_id', '=', $this->user_id)
        //  ->exists();

        //  dd($this->check);

        if(DB::table('likes')
        -> where('tweet_id', '=', $this->tweet_id)
        -> where('user_id', '=', $this->user_id)
        ->exists()) {

            DB::table('likes')
                ->where('tweet_id', '=', $this->tweet_id)
                -> where('user_id', '=', $this->user_id)
               ->update(['vote' => 1]);
            

        } else 


        DB::table('likes')
        ->insert(['user_id' =>$this->user_id, 'tweet_id'=>$this->tweet_id, 'vote' => 1]);



   
    $this->like++;
    $this->test = 1 ;


    //    if(DB::table('likes')
    //    -> where('tweet_id', '=', $this->tweet_id)
    //    ->where('user_id', '=', $this->user_id)
    //    ->exists()) {


    //     DB::table('likes')
    //     ->update(
    //     ['user_id' =>$this->user_id, 'tweet_id'=>$this->tweet_id],
    //     ['vote' => 1 ]


    // );

    //    } else


    //    DB::table('likes')->insert(
    //         ['user_id' =>$this->user_id, 'tweet_id'=>$this->tweet_id, 'vote' => 1]
            
    //     );


        //dd($this->test);

       

        // DB::table('likes')->insert(
        //     ['user_id' =>$this->user_id, 'tweet_id'=>$this->tweet_id, 'vote' => 1]
            
        // );

    }

    public function unlike () {
        $this->user_id = Auth::id();


        if(DB::table('likes')
        -> where('tweet_id', '=', $this->tweet_id)
        -> where('user_id', '=', $this->user_id)
        ->exists()) {

            DB::table('likes')
            ->where('tweet_id', '=', $this->tweet_id)
            -> where('user_id', '=', $this->user_id)
           ->update(['vote' => -1]);

        } else 


        DB::table('likes')
        ->insert(['user_id' =>$this->user_id, 'tweet_id'=>$this->tweet_id, 'vote' => -1]);

 


    $this->like--;
    $this->test = -1;

    }

  
    public function retweet () {

        $this->retweet = tweets::find($this->tweet_id);

        //dd($this->retweet);

      $this->retweetVar =  DB::table('tweets')
       ->insert(['user_id' =>$this->retweet->user_id, 'body' =>$this->retweet->body, 'image' =>$this->retweet->image, 'rt' => $this->user_id ,'og_tweet' => $this->retweet->id, 'created_at' => now()]);

    
       
       

    
         
       
       return redirect()->to('/tweets');
  

    // $this->emit('retweetVar', $this->retweetVar);



    }

    public function render()

    {

        return view('livewire.likes');
    }
}
