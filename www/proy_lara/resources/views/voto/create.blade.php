@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
	}
</style>
<div class="card uper">
	<div class="card-header">
		Agregar Voto
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
		<form method="post" action="{{ route('voto.store') }} " enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
                @csrf
                <label for="eleccion_id">eleccion_id:</label>
                <select name="eleccion_id">
                @foreach ($elecciones as $eleccion)
                <option value="{{$eleccion->id}}"> {{ $eleccion->periodo}}</option>
                @endforeach
                </select>
            </div>
			<div class="form-group">
                @csrf
                <label for="casilla_id">casilla_id:</label>
                <select name="casilla_id">
                @foreach ($casillas as $casilla)
                <option value="{{$casilla->id}}"> {{ $casilla->ubicacion}}</option>
                @endforeach
                </select>
            </div>
			<div class="form-group">
				@csrf
				<label for="evidencia">evidencia:</label>
				<input type="text" class="form-control" name="evidencia" maxlength="200" />
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</form>
	</div>
</div>
@endsection