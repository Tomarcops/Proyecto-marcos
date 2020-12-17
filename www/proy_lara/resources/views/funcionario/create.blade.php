@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
	}
</style>
<div class="card uper">
	<div class="card-header">
		Agregar Funcionario
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
		<form method="post" action="{{ route('funcionario.store') }} " enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				@csrf
				<label for="nombrecompleto">Nombre de el funcionario:</label>
				<input type="text" class="form-control" name="nombrecompleto" maxlength="200" id="nombrecompleto" />
			</div>
			<div class="form-group">
				@csrf
				<label for="sexo">Sexo:</label>
				<input type="text" class="form-control" name="sexo" maxlength="1" id="sexo" />
			</div>
			<button type="submit" class="btn btn-primary" onClick="return validate ()">Guardar</button>
		</form>
	</div>
</div>
@endsection


@section('page-script')
    <script type="text/javascript" src="/js/funcionario.js"></script>
@stop