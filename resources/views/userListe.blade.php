@extends('master')
@section('content')
<div class="userList">
	<div class="head">
    	<h2 class="entete">Actualités publiées par {{ $user->name }} </h2>
		@if(Session::has('message'))
		<div class="alert boxShadow2">{{ Session::get('message') }}</div>
		@endif
	</div>
	<div class="sheet boxShadow1 default">
		<table>
			<thead>
				<th>Titre</th>
				<th>Date de publication</th> 
				<th>Appréciation</th>
				<th>Actions</th>
			</thead>
			<tbody>
			@if(count($user->article)==0)
			
				<tr><td>Vous n'avez encore publié aucun article</td></tr>
			@else
			
				@foreach ($user->article as $article)
					<tr>
						<td><a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">{{$article->titre}}</a></td>
						<td>{{ $article->created_at }}</td>
						<td>{{ $article->like()->count() }} étoiles</td>
						<td><a href="{{url('/articles/write/'.$article->id) }}">Modifier</a> - 
							<a href="{{url('/article/delete/'.$article->id.'/'.$article->slug) }}">Supprimer</a>
						</td>
					</tr>
				@endforeach
			@endif
			</tbody>
		</table>
	</div>
</div>
@stop