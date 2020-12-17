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
			<th>Eleccion</th>
			<th>Casilla</th>
			<th>Evidencia</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($votos as $voto)
		
			<tr>
				<td>{{$voto->id}}</td>
				<td>{{$voto->eleccion}}</td>
				<td>{{$voto->casilla}}</td>
				<td>{{$voto->evidencia}}</td>

				<td><a href="{{ route('voto.edit', $voto->id)}}"
					class="btn btn-primary">Edit</a></td>
				<td>

					<form action="{{ route('voto.destroy', $voto->id)}}"
					method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" type="submit"
						onclick="return confirm('Esta seguro de borrar el periodo {{$voto->eleccion}} con la casilla {{$voto->casilla}}')" >Del</button>
					</form>
				</td>
			</tr>
		@endforeach

	</tbody>
	</table>
<div>
@endsection