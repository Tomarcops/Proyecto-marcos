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
			<th>ID</th>
			<th>NOMBRE</th>
			<th>FOTO</th>
			<th>PERFIL</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($candidato as $candidato)
			<tr>
				<td>{{$candidato->id}}</td>
				<td>{{$candidato->nombrecompleto}}</td>
				<td><img src="uploads/{{$candidato->foto}}" width="150" height="150" alt="aqui va la foto"></td>

				<td><a href="uploads/{{$candidato->perfil}}"><img src="uploads/icon-pdf.svg" alt="pdf" width="100" height="100"></a></td>

				<td><a href="{{ route('candidato.edit', $candidato->id)}}"
				class="btn btn-primary">Editar</a></td>
				<td>
				<form action="{{ route('candidato.destroy', $candidato->id)}}"
				method="post">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit"
				onclick="return confirm('Esta seguro de borrar {{$candidato->nombrecompleto}}')" >Eliminar</button>
				</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div>
@endsection