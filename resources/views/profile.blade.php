@extends('master')
@section('content')
<div class="profile">
	<div class="head">
    	<h2 class="entete">Profil de {{ $user->name }} </h2>
	</div>
	<div class="default boxShadow1 sheet short">
		@if(Auth::check() && $user->id == Auth::user()->id)
		
		<p>profil privé</p>
		
		@else
		
		<p>profil public</p>
		
		@endif
	</div>
</div>
@stop

