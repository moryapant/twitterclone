<h3 class="font-bold text-lg mb-4 block bg-blue-400 p-2">Following</h3>

<ul class="bg-gray-100">




    {{$users = NULL}}




    @auth


    {{-- @foreach ($tests as $user)    --}}

    {{-- @if($users) --}}

    @foreach ($users = auth()->user()->follows->paginate(10) as $user)
    <li class="mb-2">
        <div class="flex items-center text-sm">

            <a href="{{route('profile', $user)}}"><img class="rounded-full mr-4 mt-2" style="width: 40px; height: auto"
                    src="/image/avtaar1.jpg" alt=""></a>


            <a href="{{route('profile', $user)}}">{{$user->name}}</a>
        </div>
        @endforeach

        @endauth


        @if(!$users == NULL)
        <div class="lg:flex">
            <div class="lg:w-1/2">
                {{-- @if($tests) --}}
                {{$users->links()}}

            </div>

        </div>

        @endif
