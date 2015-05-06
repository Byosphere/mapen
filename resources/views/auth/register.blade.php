@extends('master')

@section('content')
<div>
	<div class="head">
		<h2 class="entete">Devenir rédacteur</h2>
		@if(Session::has('message'))
		    <div class="alert">{{ Session::get('message') }}</div>
		@endif
	</div>
	<div class="sheet boxShadow1 default">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form role="form" method="POST" action="{{ url('/auth/register') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="group">      
				<input type="text" required name="name" value="{{ old('name') }}">
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Pseudo</label>
			</div>

			<div class="group">      
				<input type="email" required name="email" value="{{ old('email') }}">
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Email</label>
			</div>

			<div class="group">      
				<input type="password" required name="password">
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Mot de passe</label>
			</div>

			<div class="group">      
				<input type="password" required name="password_confirmation">
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Confirmer le mot de passe</label>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
						Register
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
