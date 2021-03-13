<nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item link">
                <a class="nav-link " href="/">Home</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="{{ route('posts') }}">Posts</a>
            </li>
            {{-- dropdown --}}
        </ul>
        {{-- right side --}}
        <ul class="navbar-nav ml-auto">
            {{-- check if the user is logged in --}}
            @auth
                <li class="nav-item link">
                    <a class="nav-link " href="#">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item link">
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                         <button  type="submit"  class="nav-link btn">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="nav-item link">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                <li class="nav-item link">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @endguest
            
        </ul>

    </div>
</nav>
