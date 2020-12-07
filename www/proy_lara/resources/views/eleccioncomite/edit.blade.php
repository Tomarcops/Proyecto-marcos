@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Comité elección
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
		action="{{ route('eleccioncomite.update', $eleccioncomite->id) }}"
		enctype="multipart/form-data">
             @method('PUT')
            {{ csrf_field() }}
            <div class="form-group">
			@csrf
			<label for="id">ID:</label>
			<input type="text"
			class="form-control"
			readonly="true"
			value="{{$eleccioncomite->id}}"
			name="id"/>
		</div>
            <div class="form-group">
			@csrf
			<label for="eleccion_id">eleccion_id:</label>
			<input type="text"
			value="{{$eleccioncomite->eleccion_id}}"
			class="form-control"
			name="eleccion_id"/>
		</div>
        <div class="form-group">
			@csrf
			<label for="funcionario_id">funcionario_id:</label>
			<input type="text"
			value="{{$eleccioncomite->funcionario_id}}"
			class="form-control"
			name="funcionario_id"/>
		</div>
        <div class="form-group">
			@csrf
			<label for="rol_id">rol_id:</label>
			<input type="text"
			value="{{$eleccioncomite->rol_id}}"
			class="form-control"
			name="rol_id"/>
		</div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection