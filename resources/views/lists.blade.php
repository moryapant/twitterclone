@extends('layouts.app')
                            
                            
                            
@section('content')

<div class="lg:flex-1 lg:mx-10" style="width-max:700px">
            
    <div class="border border-gray-300 rounded-lg shadow-xl mt-4">
             <!--timeline -->
          
<header class="mb-4 p-4 relative">

    <h1 class="text-lg  font-extrabold align-content-lg-center mb-4">
         List of Users
    </h1>

    <div class="flex justify-between items-center">
        <div class="mt-2">
        <h2 class="font-bold text-2xl"></h2>
        @foreach ( $users as $user)
        <div class="flex xm-2">
            
        
          
           <a class="flex-initial text-blue-600 hover:bg-blue-900" href="/profiles/{{$user->name}}"><h3># {{$user->name}}</h3></a>
        

           <div class="felx-auto">
                <button class="bg-blue-500 rounded-sm ml-4 flex-end text-sm text-white " >

                @foreach($myusers as $myuser)
                @if($myuser->name ===$user->name )  
                #Followed
                @endif
                @endforeach

                </button>
            </div>
                 
   
    
          

            
         
          
            
         
        </div>
      
        @endforeach
    
     
        </div>

      
        
    </div>
 
   
</header>


{{$users->links()}}
     
 

    </div>



</div>


@endsection
