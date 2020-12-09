@extends('layouts.app')



@section('content')

<div class="lg:flex-1 lg:mx-10" style="width-max:700px">

    <div class="border border-gray-300 rounded-lg shadow-xl mt-4">
        <!--timeline -->

        <header class="mb-4 p-4 relative">

            {{-- <img src="/image/banner.jpg" alt=""> --}}

            <!-- This example requires Tailwind CSS v2.0+ -->


            @if($user->type == 'gold')
            <div class="bg-blue-600 h-56 rounded-lg bg-cover bg-center ... mb-4"
                style="background-image: url('/image/gold.jpg');">
            </div>

            @elseif($user->type == 'silver')
            <div class="bg-blue-600 h-56 rounded-lg bg-cover bg-center ... mb-4"
                style="background-image: url('/image/silver.jpg');">
            </div>

            @else
            <div class="bg-blue-600 h-56 rounded-lg bg-cover bg-center ... mb-4"
                style="background-image: url('/image/diamond.jpg');">
            </div>
            @endif


            <div class="flex justify-between items-center m-8">
                <div class="mt-4">
                    <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                    <p class="text-sm">{{$user->created_at->diffForHumans()}}</p>
                </div>

                <div class="mt-2 flex">

                    <!--condtion to not showing follow me to own profile commit -->

                    

                    @if(auth()->user()->isNot($user))

                    <form action="/profiles/{{ $user->name }}/follow" method="post">
                        @csrf
                        <button type="submit" class="bg-blue-500 rounded-full shadow-lg py-2 px-4 text-white text-sm">
                            {{auth()->user()->Following($user) ? 'Unfollow Me': 'Follow me'}}
                        </button>
                    </form>
                    @endif



                    <!--condtion to  showing edit profile to only my profile -->
                    @if(auth()->user()->is($user))
                    <a href="{{ $user->path('edit') }}"
                        class="bg-gray-200 rounded-full shadow-lg  border border-gray py-2 px-4 text-black text-sm">Edit
                        profile</a>
                    @endif

                </div>

            </div>

            <div>
                <p class="text-base text-gray-800 font-black p-2 mt-4">" {{$user->about}} "</p>
                <img class="rounded-full mr-2  absolute rounded-full mr-2 mt-2"
                    style="width: 20%; left: calc(50% - 75px); top:40%" src="{{$user->avatar}}" alt="">
            </div>


        </header>


        @include('_timeline', [

        'tweets' => $user->tweets,


        ])



    </div>


</div>


@endsection
