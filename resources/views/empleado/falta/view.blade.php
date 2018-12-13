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
						<label class="control-label" for="fecha" id="lbl_fecha">Fecha de la falta:</label>
						<input type="date" class="form-control" id="id_fecha" name="fecha" required>
					</div>
					<div class="col-3">
						<label class="control-label" for="problema" id="lbl_problema">Tipo de falta:</label>
						<select id="tipofalta" name="tipofalta" class="form-control" required="">
							<option value="">Seleccione el tipo de falta</option>
							<option value="justificada">Falta justificada</option>
							<option value="injustificada">Falta injustificada</option>
						</select>
					</div>
					<div class="col-5">
						<label class="control-label" for="motivo" id="lbl_comen">Especificar el motivo de la falta:</label>
						<textarea class="form-control" id="id_coment" name="motivo" maxlength="500"></textarea>
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
							<th scope="col-2" colspan="2">motivo</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($faltas as $falta)
							<tr>
								<td>{{$falta->fecha}}</td>
								<td>{{$falta->tipofalta}}</td>
								<td colspan="2">{{$falta->motivo}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection