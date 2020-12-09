<ul>
    <li>
    <a class="font-bold text-lg mb-4 block" href="{{route('home')}}">Home</a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">Explore</a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">Notification</a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">Messages</a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">Bookmarks</a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="/lists">Lists</a>
    </li>

@auth
    <li>
    <a class="font-bold text-lg mb-4 block" href="{{route('profile', auth()->user())}}">Profile</a>
    </li>
    @else
    <li>
        <a class="font-bold text-lg mb-4 block" href="/">Profile</a>
        </li>
    
  
@endauth

    <li>
        <a class="font-bold text-lg mb-4 block" href="/logout">Logout</a>
    </li>
</ul>