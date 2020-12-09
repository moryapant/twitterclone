<div>

    <div class="bg-white rounded md:w-1/1 w-1/1 border shadow-lg">
        <div class="rounded-t bg-blue-500">
          <div class="relative py-3 px-2 flex">
            {{-- <span class="font-semibold text-white md:text-base text-sm">Comments</span> --}}
            <p class="p-2 bg-blue-500"><strong class="text-white">ADD COMMENTS</strong> </p>
          </div>
        </div>
        <div class="bg-gray-200 md:text-base text-sm border-b p-2 h-24">
            <textarea wire:model="body" name="comment" id="" cols="75" rows="3"></textarea>
          </div>
          <div class="p-2 flex justify-end rounded-b bg-white-500">
            <button class="focus:outline-none py-1 px-2 md:py-2 md:px-3 w-24 mr-2 bg-blue-500 hover:bg-blue-600 text-white rounded" wire:click="newComment" >Post</button>

          </div>



      </div>

    <div class="p-4 m-4">
          <p class="p-2 bg-blue-500"><strong class="text-white">YOUR COMMENTS:- </strong> </p>
          <hr>


          {{-- {{dd($comments)}} --}}

{{-- {{dd($comments)}} --}}

{{-- {{auth()->user()->name}} --}}


          @foreach($comments as $comment)
        <div class="flex p-4 border-b border-b-gray-400 ">

            <a href="/profiles/{{$this->comment_user_id}}">

            <div class="p-2 mr-2 flex-none"><img class="rounded-full mr-2 mt-2" style="max-width: 100%; height: 50px; flex-shrink: 0;" src="{{App\User::find($comment->user_id)->avatar}}" alt=""></div>
            <div>
            </a>
            <h5 class="font-bold mb-2">


            <a href="/profiles/{{App\User::find($comment->user_id)->name}}">


{{App\User::find($comment->user_id)->name}}


            </a>


            </h5>
            </h5>

            <p class="text-base mb-3 flex-none" style="max-width: 700px;">
<!-- {{App\User::find($comment->user_id)->name}} -->
            {{$comment->body}}
            </p>
            <span class="text-xs mb-3 flex-none bg-yellow-500 rounded-full p-2" style="max-width: 700px;">
               <strong>{{$comment->created_at->diffForHumans()}}</strong>
            </span>
        </div>
    </div>
      @endforeach

</div>
