<header class="blog-header py-3">
    <div class="row flex-wrap justify-content-between align-items-center">
        <div class="col-6 col-md-4 mb-3 text-md-left text-center">
            <a class="blog-header-logo text-dark" href="/">Home</a>
        </div>
        {{--<div class="col-12 col-md-4 mb-2 mb-md-3">--}}
            {{--<form class="d-flex justify-content-between" method="get" action="/">--}}
                {{--<input class="form-control mr-2" name="search" type="search" placeholder="Search" aria-label="Search"--}}
                       {{--required>--}}
                {{--<button class="btn btn-outline-success " type="submit"><i class="fas fa-search"></i></button>--}}
            {{--</form>--}}
        {{--</div>--}}

        <div class="col-6 col-md-4 d-flex justify-content-end align-items-center mb-2 mb-md-3">
            {{--<a class="text-muted" href="#">--}}
            {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"--}}
            {{--stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3">--}}
            {{--<circle cx="10.5" cy="10.5" r="7.5"></circle>--}}
            {{--<line x1="21" y1="21" x2="15.8" y2="15.8"></line>--}}
            {{--</svg>--}}
            {{--</a>--}}
            @if(Auth::check())

                <div class="dropdown">
                    <a class="btn btn-sm btn-outline-secondary mr-2 dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->student_id ? Auth::user()->student_id : Auth::user()->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/user/{{auth()->id()}}">Posts</a>
                        <a class="dropdown-item" href="/user/profile/{{auth()->id()}}/edit">Edit Profile</a>
                    </div>
                </div>

                <a class="btn btn-sm btn-outline-secondary" href="/logout">Sign out</a>
            @else
                <a class="btn btn-sm btn-outline-secondary mr-2" href="/login">Sign in</a>
                <a class="btn btn-sm btn-outline-secondary" href="/register">Sign up</a>
            @endif
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <a class="navbar-brand d-md-none" href="#">English4IT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/words">Dictionary</a>
            </li>
            @if(auth()->id() == 1)
                <li class="nav-item">
                    <a class="nav-link" href="/admin/words">Manage Vocabulary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/users">Manage User</a>
                </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="/">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


