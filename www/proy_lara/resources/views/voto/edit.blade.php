@extends('plantilla')
@section('content')
<style>
.uper {margin-top: 40px;
}
</style>
<div class="card uper">
	<div class="card-header">
		Editar Votos
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
		<form method="post" action="{{ route('voto.update', $voto->id) }} " enctype="multipart/form-data">
			@method('PUT')
			{{ csrf_field() }}

			<div class="form-group">
				@csrf
				<label for="eleccion">Eleccion:</label>
				<select name="eleccion_id">
                    @foreach ($elecciones as $eleccion)
                        @php
                            $selected = ($voto->eleccion_id==$eleccion->id)?" selected ":"";
                        @endphp
                        <option value="{{ $eleccion->id }}" {{ $selected }}>{{ $eleccion->periodo }}</option>
                    @endforeach
                </select>			
            </div>

			<div class="form-group">
				@csrf
				<label for="casilla">Casilla:</label>
				<select name="casilla_id">
                    @foreach ($casillas as $casilla)
                        @php
                            $selected = ($voto->casilla_id==$casilla->id)?" selected ":"";
                        @endphp
                        <option value="{{ $casilla->id }}" {{$selected}}>{{ $casilla->ubicacion }}</option>
                    @endforeach
                </select>
			</div>

			<div class="form-group">
				@csrf
				<label for="evidencia">Evidencia:</label>
				<input type="text" value="{{$voto->evidencia}}" 
				class="form-control"
				name="evidencia"/>
			</div>
			
			<button type="submit" class="btn btn-primary">Guardar</button>
		</form>
	</div>
</div>
@endsection