@extends('master')
@section('content')
<div class="userList default-content">
	<h2>Actualités publiées par {{ $user->name }}</h2>
	<table>
		<tbody>
			<tr>
				<th>Titre</th>
				<th>Date de publication</th> 
				<th>Avis positifs</th>
				<th>Avis négatifs</th>
				<th>Actions</th>
			</tr>
		@foreach ($articles as $article)
			<tr>
				<td><a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">{{$article->titre}}</a></td>
				<td>{{$article->created_at}}</td>
				<td>{{$article->avisPositifs}}</td>
				<td>{{$article->avisNegatifs}}</td>
				<td><button>Modifier</button><button>Supprimer</button></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@stop