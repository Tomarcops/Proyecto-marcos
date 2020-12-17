@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
         Agregar comiteeleccion
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
        <form method="post" action="{{ route('eleccioncomite.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="eleccion_id">eleccion_id:</label>
                <select name="eleccion_id" id="eleccion_id">
                @foreach ($elecciones as $eleccion)
                <option value="{{$eleccion->id}}"> {{ $eleccion->periodo}}</option>
                @endforeach
                </select>
			</div>
            <div class="form-group">
                @csrf
                <label for="funcionario_id">funcionario_id:</label>
                <select name="funcionario_id" id="funcionario_id">
                @foreach ($funcionarios as $funcionario)
                <option value="{{$funcionario->id}}"> {{ $funcionario->nombrecompleto}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                @csrf
                <label for="rol_id">Rol:</label>
                <select name="rol_id" id="rol_id">
                @foreach ($roles as $rol)
                <option value="{{$rol->id}}"> {{ $rol->descripcion}}</option>
                @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary" onClick="return validate ()">Guardar</button>
        </form>
    </div>
</div>
@endsection

@section('page-script')
    <script type="text/javascript" src="/js/eleccioncomite.js"></script>
@stop