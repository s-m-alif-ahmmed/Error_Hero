<!-- navigation -->
<header class="sticky-top bg-white border-bottom border-default">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-white bg-body-tertiary">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="img-fluid" width="200px" src="{{asset('/')}}website/images/Error_Hero.png" alt="ErrorHero">
            </a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                <i class="ti-menu"></i>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link dropdown-item" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Blogs <i class="ti-angle-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{route('blogs', Crypt::encryptString($category->id) )}}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-item" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-item" href="{{route('contact')}}">Contact</a>
                    </li>
                </ul>

                <!-- search -->
                <div class="search px-4">
                    <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
                    <div class="search-wrapper">
                        <form action="{{ route('search.result') }}" method="GET" class="h-100">
                            @csrf
                            <input class="search-box pl-4" id="search-query" name="search" value="{{ Request::get('search') }}" type="search" placeholder="Type &amp; Hit Enter...">
                        </form>
                        <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
                    </div>
                </div>

            </div>
        </nav>
    </div>
</header>

<p class="text-success text-muted pt-3 text-center">{{session('message')}}</p>
<!-- /navigation -->
