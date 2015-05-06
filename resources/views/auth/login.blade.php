@extends('master')

@section('content')
<div>
	<div class="head">
		<h2 class="entete">Se connecter </h2>
		@if(Session::has('message'))
		    <div class="alert">{{ Session::get('message') }}</div>
		@endif
	</div>
	<div class="sheet boxShadow1 default">
		<form role="form" method="POST" action="{{ url('/auth/login') }}">
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
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="group">      
				<input type="email" required name="email" value="{{ old('email') }}">
				<label>Email</label>
			</div>

			<div class="group">      
				<input type="password" required name="password">
				<label>Mot de passe</label>
			</div>

			<div class="checkbox">
				<input type="checkbox" name="remember"> Rester connecté
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">Login</button>

					<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
