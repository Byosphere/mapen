@extends('master')

@section('titrePage', 'Mapen - '.$article->titre)

@section('content')

<div class="article-detail">
    <article class="{{ $article->slug }} boxShadow1 full">
        <header>
            <div class="topHead">
                <div class="titles">
                    <h2>{{ $article->titre }}</h2>
                    <h3>{{ $article->soustitre }}</h3> 
                </div>
                <div class="auteur">
                    <a href="{{url('/user/'.$article->user->id) }}" class="imgWrap"><img src="{{ isset($article->user->profilePicture->fullPath) ? $article->user->profilePicture->fullPath : asset('/img/user.svg') }}" alt="user"></a>
                    <a href="{{url('/user/'.$article->user->id) }}">{{ $article->user->name }}</a>
                </div>
            </div>
        </header>
        <div class="couv">
            <img src="{{ $article->cover }}" alt='img'>
        </div>
        <div class="texte">
            <p class="intro">{{ $article->chapo }}</p>
            <p>{!! $article->contenu !!}</p>
        </div>
        <div class="footer">
            @if(Auth::check())
                @if ($article->like()->where('user_id', '=', $article->user->id)->first() == null)
                <div>
                    <button class="likeButton" data-id="{{ $article->id }}">J'ai apprécié cet article</button>
                @else 
                <div>
                    <button class="likeButton active" data-id="{{ $article->id }}">Je n'aime plus</button>
                
                @endif
                @if(Auth::user()->status=='admin')
                    <a href="{{ url('/article/delete/'.$article->id.'/'.$article->slug) }}"> Supprimer l'article </a> |
                    @if($article->user->status=='ban')
                    <a href="{{ url('/user/'.$article->user->id.'/ban/0') }}"> Débloquer l'utilisateur </a>
                    @else
                    <a href="{{ url('/user/'.$article->user->id.'/ban/1') }}"> Bloquer l'utilisateur </a>
                    @endif
                @endif
                </div>
           @else
                <div>
                    <button class="disable" data-id="{{ $article->id }}">J'ai apprécié cet article</button>
                </div>
           @endif
        </div>
    </article>
</div>
@stop