@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
	}
</style>
<div class="card uper">
	<div class="card-header">
		Agregar Eleccion

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
		<form method="post" action="{{ route('eleccion.store') }} " enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				@csrf
				<label for="periodo">Periodo:</label>
				<input type="text" class="form-control" name="periodo" maxlength="100" />
			</div>
			<div class="form-group">
				@csrf
				<label for="fecha">fecha:</label>
				<input type="date" class="form-control" name="fecha" maxlength="11" />
			</div>
			<div class="form-group">
				@csrf
				<label for="fechaapertura">Fecha apertura:</label>
				<input type="date" class="form-control" name="fechaapertura" maxlength="11" />
			</div>
			<div class="form-group">
				@csrf
				<label for="horaapertura">Hora apertura:</label>
				<input type="time" class="form-control" name="horaapertura" maxlength="20" />
			</div>
			<div class="form-group">
				@csrf
				<label for="fechacierre">Fecha cierre:</label>
				<input type="date" class="form-control" name="fechacierre" maxlength="11" />
			</div>
			<div class="form-group">
				@csrf
				<label for="horacierre">Hora cierre:</label>
				<input type="time" class="form-control" name="horacierre" maxlength="20" />
			</div>
			<div class="form-group">
				@csrf
				<label for="observaciones">Observaciones:</label>
				<input type="text" class="form-control" name="observaciones" maxlength="100" />
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</form>
	</div>
</div>
@endsection