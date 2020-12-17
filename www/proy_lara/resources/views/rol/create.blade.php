@extends('plantilla')
@section('content')
<style>
	.uper {
		margin-top: 40px;
	}
</style>
<div class="card uper">
	<div class="card-header">
		Agregar Rol
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
		<form method="post" action="{{ route('rol.store') }} " enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				@csrf
				<label for="descripcion">Descripcion:</label>
				<input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="100" />
			</div>
			<button type="submit" class="btn btn-primary" onClick="return validate ()">Guardar</button>
		</form>
	</div>
</div>
@endsection

@section('page-script')
    <script type="text/javascript" src="/js/rol.js"></script>
@stop