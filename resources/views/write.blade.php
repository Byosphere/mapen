@extends('master')
@section('pageTitre', 'Mapen - Rédiger un article')
@section('content')
<div>
    <div class="head">
    	<h2 class="entete">Rédiger un nouvel article</h2>
	</div>
    <article class="new boxShadow1 full">
        {!! Form::open(array('url'=>url('articles/create'), 'class'=>'write', 'files'=>true)) !!}
        <input type="hidden" name='geoloc' value='' class='geoloc'>
        <header>
            <div class="topHead">
                <div class='left'>
                    <div class="group {{ $errors->has('titre') ? 'error' : '' }}">      
                        <input type="text" required name="titre" value="{{ old('titre') }}">
                        <label>Titre</label>
                        <span class="errors">{{$errors->first('titre')}}</span>
                    </div>
                    <div class="group {{ $errors->has('soustitre') ? 'error' : '' }}">      
                        <input type="text" required name="soustitre" value="{{ old('soustitre') }}">
                        <label>Sous-titre</label>
                        <span class="errors">{{$errors->first('soustitre')}}</span>
                    </div>
                </div>
                <div class="auteur">
                    <a href="{{url('/user/'.$user->id) }}" class="imgWrap"><img src="{{isset($user->profilePicture->fullPath) ? $user->profilePicture->fullPath : asset('/img/user.svg') }}" alt="user"></a>
                    <a href="{{url('/user/'.$user->id) }}">{{ $user->name }}</a>
                </div>
            </div>
        </header>
        <div class="couv empty group">
            <p for="couv">Couverture de l'article :</p>
            {!! Form::file('couv') !!}
            <p class="errors">{!!$errors->first('couv')!!}</p>
        </div>
        <div class="texte">
            <div class="textarea {{ $errors->has('chapo') ? 'error' : '' }}">
                <textarea required name="chapo" value="{{ old('chapo') }}"></textarea>
                <label>Chapo</label>
                <span class="errors">{{$errors->first('chapo')}}</span>
            </div>
             {!! Form::textarea('contenu', null, array('placeholder'=>'Contenu', 'class'=>'contentWriter textarea', 'id'=>'editable')) !!}
            <span class="errors">{{$errors->first('contenu')}}</span>
        </div>
        <input type="submit" value="" class="boxShadow2">
        {!! Form::close() !!}
    </article>
</div>
@stop

