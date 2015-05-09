@extends('master')
@section('titrePage', 'Mapen - Accueil')
@section('content')
<div class="head">
    <h2 class="entete">Actualités des alentours </h2>
    @if(Auth::check())
    <h3>Vous êtes connecté en tant que <a href="{{ url('/user/'.Auth::user()->id) }}">{{ Auth::user()->name }}</a> 
        - Votre localisation actuelle est réglée sur {{ Auth::user()->latitude }} / {{ Auth::user()->longitude }} (<a href="{{url('/user/'.Auth::user()->id)}}">modifier</a>)</h3>
    <a href=""></a>
    <a href="{{url('/articles/write') }}" class="more buttonNew boxShadow2">&#9997;</a>
    @else
    <h3>En étant connecté, les articles peuvent s'afficher par défaut pour votre localisation (<span id="geoloc"></span>) - <a href="{{url('/auth/register') }}">S'inscrire</a> - 
        <a href="{{url('/auth/login') }}">Se connecter</a></h3>
    @endif
    @if(Session::has('message'))
        <div class="alert">{{ Session::get('message') }}</div>
    @endif
</div>
<div class="listeArticles">
@foreach ($articles as $article)

    <article class="{{ $article->slug }} boxShadow1">
        <header>
            <div class="flex-left">
                <h2><a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">{{ $article->titre }}</a></h2>
                <h3>{{ $article->soustitre }}</h3> 

                <div class="couv">
                    <img src="{{ $article->cover }}" alt='img'>
                </div>
            </div>
            <div class="flex-right">
                <div>
                    <a href="{{url('/user/'.$article->user->id) }}" class="imgWrap"><img src="{{ $article->user->profilePicture->fullPath or asset('/img/user.svg') }}" alt="userPicture"></a>
                    <a href="{{url('/user/'.$article->user->id) }}">{{ $article->user->name }}</a>
                    <hr>
                </div>
                <div>
                    <div id="heart"><p>{{ $article->like()->count() }}</p></div>
                </div>
            </div>
        </header>
        <div class="chapo">
            <p>{{ $article->chapo }} [...]</p>
        </div>
        <a href="{{url('/article/'.$article->id.'/'.$article->slug) }}" class="more boxShadow2">+</a>
    </article>
@endforeach
</div>
<div class="page">{!! $articles->render() !!}</div>
@stop