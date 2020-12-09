@extends('layouts.app')

@section('content')
<div class="lg:flex-1 lg:mx-10" style="width-max:700px">

    <div class="border border-blue-200 rounded-lg px-8 py-6 shadow-lg">
        <!--tweet box -->
        <form class="" method="post" action="/tweets" enctype="multipart/form-data">
            @csrf
            <textarea name="body" class="w-full h-full" placeholder="Your Tweet here!" autofocus></textarea>




            <input class="bg-blue-500 rounded-lg shadow px-2 py-2 my-2 text-black" type="file" class="form-control"
                name="image" id="cover-image">


            <hr class="my-4">

            <footer class="flex justify-between items-center">


                @if(!Auth::user()->avatar == NULL)

                <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="{{Auth::user()->avatar}}"
                    alt="Profile image" />

                @else
                <img class="rounded-full mr-4 mt-2" style="width: 60px; height: 60px" src="image/avtaar1.jpg" alt="">
                <span class="text-sm text-gray-40">Please change your Avtaar from Profile Link</span>
                @endif




                <button class="bg-blue-500 rounded-lg shadow px-2 py-2 my-2 text-white" type="submit">Tweet</button>
            </footer>

        </form>

        <div>
            @error('body')
            <p class="text-red-500 text-sm mt-2">{{$message}}</p>

            @enderror
        </div>


    </div>



    @include('_timeline')

    {{$tweets->links()}}

</div>
@endsection
