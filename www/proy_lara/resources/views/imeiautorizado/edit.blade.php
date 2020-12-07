@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
	}
</style>
<div class="card uper">
	<div class="card-header">
		Editar Imeiautorizado
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
		action="{{ route('imeiautorizado.update', $imeiautorizado->id) }}"
		enctype="multipart/form-data">
		{{ csrf_field() }}
		@method('PUT')
		<div class="form-group">
			@csrf
			<label for="id">ID:</label>
			<input type="text"
			class="form-control"
			readonly="true"
			value="{{$imeiautorizado->id}}"
			name="id"/>
		</div>
		<div class="form-group">
			@csrf
			<label for="funcionario_Id">funcionario_id:</label>
			<input type="text"
			value="{{$imeiautorizado->funcionario_id}}"
			class="form-control"
			name="funcionario_id"/>
		</div>
		<div class="form-group">
			@csrf
			<label for="eleccion_id">eleccion_id:</label>
			<input type="text"
			value="{{$imeiautorizado->eleccion_id}}"
			class="form-control"
			name="eleccion_id"/>
		</div>
		<div class="form-group">
			@csrf
			<label for="casilla_id">casilla_id:</label>
			<input type="text"
			value="{{$imeiautorizado->casilla_id}}"
			class="form-control"
			name="casilla_id"/>
		</div>
		<div class="form-group">
			@csrf
			<label for="imei">imei:</label>
			<input type="text"
			value="{{$imeiautorizado->imei}}"
			class="form-control"
			maxlength="200" 
			name="imei"/>
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
</div>
</div>
@endsection