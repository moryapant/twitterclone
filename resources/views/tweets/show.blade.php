@extends('layouts.app')
                            

                         
                            
@section('content')

<div class="lg:flex-1 lg:mx-10" style="width-max:700px">
            
    <div class="border border-gray-300 rounded-lg shadow-xl mt-4">
             <!--timeline -->
          
<header class="mb-4 p-4 relative">

    

    <div class="flex p-4 border-b border-b-gray-400 ">
            <a href="/profiles/{{$tweets->user->name}}">
        <div class="p-2 mr-2 flex-none">
        <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="{{$tweets->user->avatar}}" alt="Profile image"/>
            </a>
        </div>   


            <div>

          
    
    
            <h5 class="font-bold mb-2">
                <a href="/profiles/{{$tweets->user->name}}">
                {{$tweets->user->name}}
            </a>
            </h5>
    
            
            <p class="text-sm mb-3 flex-none" style="max-width: 700px;"> 
              
                    {{$tweets->body}}
                
            </p>
        <a href="/./{{$tweets->image}}">
            <p><img src="{{$tweets->image}}" style="max-width: 750px;"; alt=""></p>
        </a>
        <livewire:likes :foo="app\tweets::find($tweets->id)" />
            </div>

    {{-- <div class="flex justify-between items-center">
        <div class="mt-2">
        <h2 class="font-bold text-2xl"></h2>
        <p class="text-sm"></p>
        
        </div> --}}
    
     

        
    </div>
    <div>
        <livewire:comments :comvar="app\tweets::find($tweets->id)"  /> 
      </div>
    
</header>



   
     
 

    </div>

   

</div>


@endsection
