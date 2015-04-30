@extends('master')
@section('pageTitre', 'Mapen - Rédiger un article')
@section('content')
<div class="default-content">
    <div class="sheet boxShadow1">
        {!! Form::open(array('url'=>url('articles/create'), 'class'=>'default write')) !!}
        <header>
            <h2>Rédiger un nouvel article</h2>
            <hr>
        </header>
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

        <div class="textarea {{ $errors->has('chapo') ? 'error' : '' }}">
            <textarea required name="chapo" value="{{ old('chapo') }}"></textarea>
            <label>Chapo</label>
            <span class="errors">{{$errors->first('chapo')}}</span>
        </div>
        
        <?php $errors->has('contenu') ? $classContenu = 'error' : $classContenu=''; ?>
        {!! Form::textarea('contenu', null, array('placeholder'=>'Contenu', 'class'=>'contentWriter '.$classContenu, 'id'=>'editable')) !!}
        <span class="errors">{{$errors->first('contenu')}}</span>
        <input type="submit" value="Publier" class="boxShadow2">
        {!! Form::close() !!}
    </div>
</div>
@stop