<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
{{--        <span class="logo-mini"><img src="{{ url('storage/logo.png') }}" style="width: 80%"/></span>--}}
        <!-- logo for regular state and mobile devices -->

{{--        <span class="logo-lg"><img src="{{ url('storage/logo.png') }}" style="width: 70%"/></span>--}}
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu" style="margin-right: 50px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @php
                            $user = \Illuminate\Support\Facades\Auth::user();
                        @endphp
                        <img src="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$user->photo) }}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50em">&nbsp; {{ $user->name }}
                        &nbsp; <i class="fa fa-sort-down" style="font-size: 18px"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><a href="{{ route('intranet.editUser', $user->id) }}"><i class="fa fa-user-circle"></i>Mon profil</a></li>
                        <li class="header">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>