


<!-- Styles -->


<div class="border border-gray-300 rounded-lg shadow-xl mt-4">
    <!--timeline -->

  

        @foreach($tweets as $tweet)

@if($tweet->rt)
<strong><span class="text-sm m-4 p-2 bg-orange-200">
    <a href="/profiles/{{App\User::where('id', '=', $tweet->rt)->value('name')}} ">
        <i class="fas fa-retweet fa-1x mr-2 mt-1" >
            </i> Retweeted by {{App\User::where('id', '=', $tweet->rt)->value('name')}}
        </a>
    </span>
</strong>

@else
@endif
    <div class="flex p-4 border-b border-b-gray-500 ">
       <div class="p-2 mr-2 flex-none">


         @if(!$tweet->user->avatar == NULL)
            
             <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="{{$tweet->user->avatar}}" alt="Profile image"/>

        @else 
              {{-- <img class="rounded-full mr-4 mt-2" style="max-width: 100%; height: 50px; flex-shrink: 0;" src="image/kid.png" alt=""> --}}
              <img class="rounded-full mr-2 mt-2" style="max-width: 100%; height: 50px; flex-shrink: 0;" src="/image/avtaar1.jpg" alt="">

        @endif

          {{-- <img class="rounded-full mr-2 mt-2" style="max-width: 100%; height: 50px; flex-shrink: 0;" src="/image/kid.png" alt=""> --}}


        </div>
        <div>
       


        <h5 class="font-bold mb-2">
            <a href="/profiles/{{$tweet->user->name}}">
            {{$tweet->user->name}}
        </a>
        </h5>


        <p class="text-sm mb-3 flex-none" style="max-width: 700px;" > 
            
            <a href=" {{route('tweets.show', $tweet->id)}}">{{$tweet->body}}</a>
        </p>
        <a href=" {{route('tweets.show', $tweet->id)}}">
    <p class="content-center"><img class="max-w-full items-center justify-center content-center" src="{{$tweet->image}}"  alt=""></p></a>
    <livewire:likes :foo="app\tweets::find($tweet->id)" />
       
        </div>
       
<div>
 
    <div>
    
       
    </div>
    
</div>

        </div> 
        @endforeach
        
       
    </div>  
  
  