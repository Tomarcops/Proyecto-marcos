@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
}
</style>
<div class="uper">
	@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div><br />
	@endif
	<table class="table table-striped">
	<thead>
		<tr>
			<td>voto_id</td>
			<td>candidato_id</td>
			<td>votos</td>
			<td colspan="2">Action</td>
		</tr>
	</thead>
	<tbody>
		@foreach($votocandidatos as $votocandidato)
			<tr>
				<td>{{$votocandidato->voto_id}}</td>
				<td>{{$votocandidato->candidato_id}}</td>
				<td>{{$votocandidato->votos}}</td>
				<td><a href="{{ route('votocandidato.edit', $votocandidato->id)}}"
				class="btn btn-primary">Editar</a></td>
				<td>
				<form action="{{ route('votocandidato.destroy', $votocandidato->id)}}"
				method="post">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit"
				onclick="return confirm('Esta seguro de borrar')" >Eliminar</button>
				</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div>
@endsection