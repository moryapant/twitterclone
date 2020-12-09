<?php

namespace App\Http\Controllers;


use App\tweets;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\File;

class TweetsController extends Controller





{

    public function index()

   
    {

       // $tweets = tweets::latest()->get();
        return view('home', [

          
            'tweets' => auth()->user()->timeline()
        
        ]);
    }



    public function store(Request $request) {


    //    $attributes =  request()->validate([
    //         'body' => 'required|max:999',
    //         'image' => 'file'
    //     ]);

     //$path = $request->file('image')->store('public/image');
     //$db_path = '/image/' . $request->file('image')->getClientOriginalName();


     //dd($path);

   //dd('/image/'. $request->file('image')->getClientOriginalName());

    $this->validate($request, [

        'body' => 'required',
        
        'image' => 'file'
    ]);

    if($request->has('image')) {

   
    $FilenamewithExtension = $request->file('image')->getClientOriginalName();
    $Filename = pathinfo($FilenamewithExtension, PATHINFO_FILENAME);
    $extension = $request->file('image')->getClientOriginalExtension();
    $FilenameToStore = $Filename . '_' . time(). '.' . $extension;
    $path = $request->file('image')->storeAs('public/image/' .$request->input('album_id'), $FilenameToStore);
    $db_path = '/image/'.$Filename . '_' . time(). '.' . $extension; 
    }
    


    



    // $FilenamewithExtension = $request->file('image')->getClientOriginalName();
      
    // $Filename = pathinfo($FilenamewithExtension, PATHINFO_FILENAME);

    // $extension = $request->file('photo')->getClientOriginalExtension();

    // $FilenameToStore = $Filename . '_' . time(). '.' . $extension;

    //echo ($FilenameToStore);
   // echo ($Extension);
   // echo ($FilenamewithExtension);



    //$path = $request->file('photo')->storeAs('public/albums/' .$request->input('album_id'), $FilenameToStore);


    //  tweets::create([


    //     //  'user_id' => auth()->id(),
    //     // 'body'=>$attributes['body'],
    //     //  'image'=> $FilenameToStore


        
        

    //  ]);


    if($request->has('image')) {
     $tweets= new tweets();
     $tweets->user_id = auth()->id();
     $tweets->image =$db_path;
    $tweets->body = $request->input('body');
    } else {
    $tweets= new tweets();
    $tweets->user_id = auth()->id();
    //$tweets->image =$db_path;
   $tweets->body = $request->input('body');
    }

 
    $tweets->save();



      return redirect('/tweets');

    }

    public function show(Request $request, tweets $tweets)

   
    {

        return view('tweets.show', compact('tweets'));    
       
        
        
    }


}
