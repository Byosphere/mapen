@extends('master')

@section('content')
<div class="default-content">
	<div class="sheet boxShadow1">
		<form role="form" method="POST" action="{{ url('/auth/login') }}">
			<header>
				<h2>Se connecter</h2>		
				<hr>
			</header>
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
