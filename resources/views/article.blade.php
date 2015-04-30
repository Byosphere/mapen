@extends('master')

@section('titrePage', 'Mapen - '.$article->titre)

@section('content')
<?php 
    $articleUser = null;
    foreach ($users as $user) {
    
        if($user->name == $article->author){

            $articleUser = $user;
        }
    }
?>
<div class="article-detail">
    <article class="{{ $article->slug }} boxShadow1 full">
        <header>
            <div class="flex-left">
                <div class="entete">
                    <div class="titles">
                        <h2><a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">{{ $article->titre }}</a></h2>
                        <h3>{{ $article->soustitre }}</h3> 
                    </div>
                    <div class="auteur">
                        <a href="{{url('/user/'.$articleUser->id) }}" class="imgWrap"><img src="{{ asset('/img/user.svg') }}" alt="user"></a>
                        <a href="{{url('/user/'.$articleUser->id) }}">{{ $article->author }}</a>
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
            <div>
                <button>J'ai apprécié cet article</button>
                <button>Partager</button>
            </div>
        </div>
    </article>
</div>
@stop