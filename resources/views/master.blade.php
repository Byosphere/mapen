<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('titrePage')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Exo:200,400,600' rel='stylesheet' type='text/css'>
        <script src="{{ asset('/js/vendor/modernizr.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
                <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="top-bar boxShadow1" data-topbar role="navigation">
            <div class="sideButton">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="title">
                <img src="{{ asset('/img/logo.svg') }}" alt="logo">
                <div>
                    <h1><a href="{{ url('/home') }}">Mapen</a></h1>
                    <h2>L'actualité géolocalisée</h2>
                </div>
            </div>
            <div class="userButton">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>
        <div class="main-menu boxShadow2" id="userMenu">
            <ul>
                @if (Auth::check())
                <li class="connexion {{ Request::is('user/'.Auth::user()->id) ? 'active' : ''  }}">
                    <a href="{{url('/user/'.Auth::user()->id) }}">
                        <div class='imgWrap'><img src="{{ isset(Auth::user()->profilePicture->fullPath) ? Auth::user()->profilePicture->fullPath : asset('/img/user.svg') }}" alt="user"></div>
                        <p>{{ Auth::user()->name }}</p>
                    </a>
                </li>
                @else
                <li class="connexion {{ Request::is('auth/login*') ? 'active' : ''  }}">
                    <a href="{{url('/auth/login') }}"><div class='imgWrap'><img src="{{ asset('/img/user.svg') }}" alt="user"></div><p>Se connecter</p></a>
                </li>
                @endif
                <li class="{{ Request::is('home') ? 'active' : '' }}" ><a href="{{url('/home') }}">Accueil</a></li>
                @unless(Auth::check())
                <li <li class="{{ Request::is('auth/register*') ? 'active' : ''  }}"><a href="{{url('/auth/register') }}">Devenir rédacteur</a></li>
                @endunless
                @if (Auth::check())
                <li class="{{ Request::is('user/'.Auth::user()->id) ? 'active' : '' }}" ><a href="{{url('/user/'.Auth::user()->id) }}">Profil</a></li>
                <li class="{{ Request::is('articles/write') ? 'active' : '' }}" ><a href="{{url('/articles/write') }}">Rédiger une actu</a></li>
                <li class="{{ Request::is('articles/'.Auth::user()->id.'/mylist') ? 'active' : '' }}" ><a href="{{url('/articles/'.Auth::user()->id.'/mylist') }}">Voir ma liste d'actus</a></li>
                <li><a href="{{ url('/auth/logout') }}">Se déconnecter</a></li>
                @endif
            </ul>
        </div>
        <aside id="sideMenu">
            <h3>En continu</h3>
            <ul class="items" id="items" data-url="{{url('/') }}">
            </ul>
        </aside>
        <div class="content">
            @yield('content')
            @include('footer')
        </div>
        <script type="text/javascript" src="{{ asset('/js/vendor/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/nicEdit.js') }}"></script>
    </body>
</html>
