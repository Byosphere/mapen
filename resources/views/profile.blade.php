@extends('master')
@section('titrePage', 'Mapen - Profil de '.$user->name)
@section('content')
<div class="profile">
	<div class="head">
    	<h2 class="entete">Profil de {{ $user->name }} </h2>
		@if(Session::has('message'))
		<div class="alert boxShadow2">{{ Session::get('message') }}</div>
		@endif
	</div>
	<!-- profil privé -->
	@if(Auth::check() && $user->id == Auth::user()->id)
	<div class="default boxShadow1 sheet short">
		
			{!! Form::open(array('url'=>route('profilePicture.store'),'method'=>'POST', 'files'=>true, 'class'=>'fileForm')) !!}
			<div class="auteur">
                <div class="imgWrap"><img src="{{ isset($user->profilePicture->fullPath) ? $user->profilePicture->fullPath : asset('/img/user.svg') }}" alt="user"></div>
            </div>
			
			<div class="input-button boxShadow2 profile-picture">
				{!! Form::file('image') !!}
				<p class="errors">{!!$errors->first('image')!!}</p>
			</div>
			<hr>
			{!! Form::close() !!}
			{!! Form::open(array('url'=>url('user/'.$user->id.'/geoloc'))) !!}
			<div>
				Géolocalisation par défaut : <input type="text" name='lat' class='inline' placeholder="{{ $user->latitude }}" maxlength="2" required> / <input type="text" name='lon' class='inline' maxlength="2" placeholder="{{ $user->longitude }}" required>
				<input type="submit" class='input-button btn boxShadow2' value="Modifier">
				<span class="errors">{{$errors->first('lat')}}</span>
					<span class="errors">{{$errors->first('lon')}}</span>
			</div>
			
			{!! Form::close() !!}
	</div>
	<!-- profil public -->
	@else
		<div class="auteur top boxShadow1">
			<a href="{{url('/user/'.$user->id) }}"><img src="{{ isset($user->profilePicture->fullPath) ? $user->profilePicture->fullPath : asset('/img/user.svg') }}" alt="user"></a>
		</div>
		<div class='listeArticles profil'>
		@foreach ($articles as $article)
		
		<article class="{{ $article->slug }} boxShadow1">
		    <header>
		        <div class="flex-left">
		            <h2>{{ $article->titre }}</h2>
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
	@endif
</div>

@stop

