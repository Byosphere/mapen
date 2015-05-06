@extends('master')
@section('content')
<div class="userList">
	<div class="head">
    	<h2 class="entete">Actualités publiées par {{ $user->name }} </h2>
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
			@foreach ($user->article as $article)
				<tr>
					<td><a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">{{$article->titre}}</a></td>
					<td>{{ $article->created_at }}</td>
					<td>{{ $article->like()->count() }} étoiles</td>
					<td><button>Modifier</button> <button>Supprimer</button></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop