<div>


    <span class="flex mt-2">

        <!--  like -->

     
    


@switch($test)
    @case(1)
    <i class="fas fa-thumbs-up fa-1x mr-2 ml-3"></i>        

    {{$like}}

    <a wire:click="unlike"  class="">
    <i class="far fa-thumbs-down fa-1x mr-2 ml-3"></i>  
    </a>  

        @break

    @case(-1)
    <a wire:click="like"  class="">
        <i class="far fa-thumbs-up fa-1x mr-2 ml-3"></i>        
        </a>

        {{$like}}


        <i class="fas fa-thumbs-down fa-1x mr-2 ml-3"></i>  
        @break

    @default
    <a wire:click="like"  class="">
        <i class="far fa-thumbs-up fa-1x mr-2 ml-3"></i>        
        </a>
       
        {{$like}}

        <a wire:click="unlike"  class="">

        <i class="far fa-thumbs-down fa-1x mr-2 ml-3"></i>  
        </a>  
@endswitch

    



    

<!--  comments -->

        <a href="{{route('tweets.show', $this->tweet_id)}}"><i class="far fa-comments fa-1x ml-2 mr-2 mt-1"></i></a>
        <span class="mr-2">{{$this->commentCount}}</span>

      <!--  cancel -->
      {{-- <i class="mr-auto mt-1 item-align-left"></i>   --}}
      {{-- <button class="bg-red-500 rounded-sm shadow px-1 py-1 m-2 text-white" type="submit">Delete</button> --}}
     
        <a  wire:click="retweet" ><i class="fas fa-retweet fa-1x mr-2 mt-1" ></i> </a>
      <i class="far fa-window-close fa-1x mr-auto mt-1"></i>  
     
    </span>
</div>
