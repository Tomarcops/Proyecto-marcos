<!DOCTYPE HTML>
<HTML>
<head>
	<div style='text-align:center;'>	
   
		<h1>PDF generado desde etiquetas html:</h1>
		<h2> Casilla</h2>
		<br>
</head>
   
   </div>
   <BODY>

      <table class="table table-striped" align="center">
		<thead>
			<tr>
				<td align="center">ID</td>
				<td align="center">UBICACION</td>
				<td colspan="2" align="center">Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($casillas as $casilla)
			<tr>
				<td align="center">{{$casilla->id}}</td>
				<td>{{$casilla->ubicacion}}</td>
				<td><a href="{{ route('casilla.edit', $casilla->id)}}"
					class="btn btn-primary">Edit</a></td>
				<td>
					<form action="{{ route('casilla.destroy', $casilla->id)}}" method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" type="submit"
						onclick="return confirm('Esta seguro de borrar {{$casilla->ubicacion}}')" >Del</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div>
	<div style='text-align:center;'>	
   
   		<h3>&copy;marcos.dev</h3> 
</div>
<script type="text/php">
		if (isset($pdf) ) {
				$pdf->page_script('
				$font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
				$pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
				');
		}
</script>
   </BODY>
</HTML>