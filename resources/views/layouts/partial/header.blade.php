<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script id="__bs_script__">//<![CDATA[ document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.13.0.js'><\/script>".replace("HOST", location.hostname)); //]]></script>


    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<nav class="navbar has-shadow" >
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item is-paddingless brand-item" href="">
                <img src="{{asset('img/log.png')}}" alt="DevMarketer logo">
            </a>

            @if (Request::segment(1) == "manage")
                <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
          <span class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </span>
                </a>
            @endif

            <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item is-tab is-active">Learn</a>
                <a class="navbar-item is-tab">Discuss</a>
                <a class="navbar-item is-tab">Share</a>
            </div> <!-- end of .navbar-start -->

            welcome
            <div class="navbar-end nav-menu" style="overflow: visible">
                @guest
                    <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                    <a href="{{route('register')}}" class="navbar-item is-tab">Join the Community</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">Hey {{Auth::user()->nom}}</a>
                        <div class="navbar-dropdown is-right" >
                            <a href="{{url('users')}}/{{Auth::user()->id}}/edit" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                </span>Profile
                            </a>

                            <a href="#" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-bell m-r-5"></i>
                </span>Notifications
                            </a>
                            <a href="{{route('compte.index')}}" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-cog m-r-5"></i>
                </span>Manage
                            </a>
                            <hr class="navbar-divider">
                            <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <span class="icon">
                  <i class="fa fa-fw fa-sign-out m-r-5"></i>
                </span>
                                Logout
                            </a>
                            @include('_includes.forms.logout')
                        </div>
                    </div>
                @endguest
            </div>
        </div>

    </div>
</nav>