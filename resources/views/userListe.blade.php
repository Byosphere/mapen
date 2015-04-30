@extends('master')
@section('content')
<div class="userList default-content">
	<div class="sheet boxShadow1">
		<header>
			<h2>Actualités publiées par {{ $user->name }}</h2>
			<hr>
		</header>
		<table>
			<thead>
				<th>Titre</th>
				<th>Date de publication</th> 
				<th>Appréciation</th>
				<th>Actions</th>
			</thead>
			<tbody>
			@foreach ($articles as $article)
				<tr>
					<td><a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">{{$article->titre}}</a></td>
					<td>{{$article->created_at}}</td>
					<td>{{$article->like}} étoiles</td>
					<td><button>Modifier</button><button>Supprimer</button></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop