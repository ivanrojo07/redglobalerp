@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Faltas administrativas:</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ route('empleados.faltas.store',['empleado'=>$empleado]) }}">
				@csrf
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="fecha" id="lbl_fecha">Fecha:</label>
						<input type="date" class="form-control" id="id_fecha" name="fecha" required>
					</div>
					<div class="col-3">
						<label class="control-label" for="problema" id="lbl_problema">Problema:</label>
						<textarea class="form-control" id="id_problema" name="problema" maxlength="500"></textarea>
					</div>
					<div class="col-3">
						<label class="control-label" for="comentarios" id="lbl_comen">Comentarios:</label>
						<textarea class="form-control" id="id_coment" name="comentarios" maxlength="500"></textarea>
					</div>
					<div class="col-3">
						<label class="control-label" for="tipofalta" id="lbl_falta">Tipo de falta:</label>
						<select type="select" name="tipofalta" class="form-control" id="id_falta" required>
							<option value="">Seleccione Una</option>
							<option id="1" value="Falta 1">falta 1</option>
							<option id="2" value="Falta 2">falta 2</option>
	    					<option id="3" value="Falta 3">falta 3</option>
	    					<option id="4" value="Falta 4">falta 4</option>
							<option id="5" value="Falta 5">falta 5</option>
	    					<option id="6" value="Falta 6">falta 6</option>
	    					<option id="7" value="Falta 7">falta 7</option>
							<option id="8" value="Falta 8">falta 8</option>
	    					<option id="9" value="Falta 9">falta 9</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-5">
						<label class="control-label" for="reporto">Quién lo reportó:</label>
    					<input type="text" class="form-control" id="reporto" name="reporto" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-success">
						 	<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</form>
			<div class="container">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th scope="col">Fecha</th>
							<th scope="col">Tipo de falta</th>
							<th scope="col">Reportó</th>
							<th scope="col">Problema</th>
							<th scope="col-2" colspan="2">Comentarios</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($faltas as $falta)
							<tr>
								<td>{{$falta->fecha}}</td>
								<td>{{$falta->tipofalta}}</td>
								<td>{{$falta->reporto}}</td>
								<td>{{$falta->problema}}</td>
								<td colspan="2">{{$falta->comentarios}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection