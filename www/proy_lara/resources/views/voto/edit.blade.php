@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
	}
</style>
<div class="card uper">
	<div class="card-header">
		Editar Funcionario
	</div>
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><br />
		@endif
		<form method="POST"
		action="{{ route('voto.update', $voto->id) }}"
		enctype="multipart/form-data">
		{{ csrf_field() }}
		@method('PUT')
		<div class="form-group">
			@csrf
			<label for="id">ID:</label>
			<input type="text"
			class="form-control"
			readonly="true"
			value="{{$voto->id}}"
			name="id"/>
		</div>
		<div class="form-group">
			@csrf
			<label for="eleccion_id">eleccion_id:</label>
			<input type="text"
			value="{{$voto->eleccion_id}}"
			class="form-control"
			maxlength="1" 
			name="eleccion_id"/>
		</div>
		<div class="form-group">
			@csrf
			<label for="casilla_id">casilla_id:</label>
			<input type="text"
			value="{{$voto->casilla_id}}"
			class="form-control"
			maxlength="1" 
			name="casilla_id"/>
		</div>
		<div class="form-group">
			@csrf
			<label for="evidencia">evidencia:</label>
			<input type="text"
			value="{{$voto->evidencia}}"
			class="form-control"
			maxlength="200" 
			name="evidencia"/>
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
</div>
</div>
@endsection