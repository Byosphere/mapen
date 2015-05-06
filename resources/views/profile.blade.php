@extends('master')
@section('content')
<div class="profile">
	<div class="head">
    	<h2 class="entete">Profil de {{ $user->name }} </h2>
	</div>
	<div class="default boxShadow1 sheet short">
		@if(Auth::check() && $user->id == Auth::user()->id)
		
		<p>profil privé</p>
		<div class="secure">Upload form</div>
			{!! Form::open(array('url'=>route('profilePicture.store'),'method'=>'POST', 'files'=>true)) !!}
			<div class="control-group">
				<div class="controls">
				{!! Form::file('image') !!}
				<p class="errors">{!!$errors->first('image')!!}</p>
				@if(Session::has('error'))
				<p class="errors">{!! Session::get('error') !!}</p>
				@endif
				</div>
			</div>
			<div id="success"> </div>
			{!! Form::submit('Submit', array('class'=>'send-btn')) !!}
			{!! Form::close() !!}
		</div>
		
		@else
		
		<p>profil public</p>
		
		@endif
	</div>
</div>
@stop

