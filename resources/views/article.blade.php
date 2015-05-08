@extends('master')

@section('titrePage', 'Mapen - '.$article->titre)

@section('content')

<div class="article-detail">
    <article class="{{ $article->slug }} boxShadow1 full">
        <header>
            <div class="flex-left">
                <div class="topHead">
                    <div class="titles">
                        <h2><a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">{{ $article->titre }}</a></h2>
                        <h3>{{ $article->soustitre }}</h3> 
                    </div>
                    <div class="auteur">
                        <a href="{{url('/user/'.$article->user->id) }}" class="imgWrap"><img src="{{ isset($article->user->profilePicture->fullPath) ? $article->user->profilePicture->fullPath : asset('/img/user.svg') }}" alt="user"></a>
                        <a href="{{url('/user/'.$article->user->id) }}">{{ $article->user->name }}</a>
                    </div>
                </div>
                <div class="couv">
                    <img src="{{ asset('/img/art.jpg') }}" alt='img'>
                </div>
            </div>
        </header>
        <div class="texte">
            <p class="intro">{{ $article->chapo }}</p>
            <p>{!! $article->contenu !!}</p>
        </div>
        <div class="footer">
            @if(Auth::check())
                @if ($article->like()->where('user_id', '=', $article->user->id)->first() == null)
                <div>
                    <button class="likeButton" data-id="{{ $article->id }}">J'ai apprécié cet article</button>
                </div>
                @else 
                <div>
                    <button class="likeButton active" data-id="{{ $article->id }}">Je n'aime plus</button>
                </div>
                @endif
           @else
                <div>
                    <button class="disable" data-id="{{ $article->id }}">J'ai apprécié cet article</button>
                </div>
           @endif
        </div>
    </article>
</div>
@stop