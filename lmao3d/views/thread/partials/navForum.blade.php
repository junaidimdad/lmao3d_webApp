<!-- header-area start -->
<div id="sticker" class="header-area">
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <!-- Navigation -->
        <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
        <!-- Brand -->
        <a class="navbar-brand page-scroll sticky-logo" href="index.html">
            <h1><span>L</span>MAO 3D</h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <img src="img/logo.png" alt="" title=""> -->
                        </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
        <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li>
            <a class="page-scroll" href="{{route('welcome')}}">Home</a>
            </li>
            <li class="active">
            <a class="page-scroll" href="{{route('thread.index')}}">Forum</a>
            </li>
            <li>
            <a class="page-scroll" href="{{route('client.login')}}">SignIn</a>
            </li>
        @else
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bell"><span class="badge">{{count(auth()->user()->unreadNotifications)}}<span></span></a>
            <ul class="dropdown-menu" role="menu">
                <li>

                </li>
            </ul> 
            </li>

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="fa fa-user"></span></span></a>
            <ul class="dropdown-menu" role="menu">
                <li>
                <a href="{{route('client_profile', auth()->user())}}">Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul> 
            </li>
        @endif
        </ul>
        </div>
        <!-- navbar-collapse -->
        </nav>
    </div>
    </div>
</div>
</div>
<!-- END: Navigation -->