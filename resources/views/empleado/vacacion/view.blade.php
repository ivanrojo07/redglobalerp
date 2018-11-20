@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Vacaciones:</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ route('empleados.vacacions.store',['empleado'=>$empleado]) }}">
				@csrf
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="fechainicio" id="lbl_vacaciones">Fecha de Inicio:</label>
						<input type="date" class="form-control" id="id_vacaciones" name="fechainicio">
					</div>
					<div class="col-3">
						<label class="control-label" for="fechafin" id="lbl_vacaciones">Fecha de Fin:</label>
						<input type="date" class="form-control" id="id_vacaciones_fin" name="fechafin">
					</div>
					<div class="col-3">
						<label class="control-label" for="diastomados">Número de días de vacaciones:</label>
    					<input type="text" class="form-control" id="dias_vac" step="1" min="1" name="diastomados">
					</div>
					<div class="col-3">
						<label class="control-label" for="diasrestantes">Días de vacaciones restantes:</label>
    					<input type="text" class="form-control" id="dias_vac_rest" name="diasrestantes">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-4">
						<label class="" for="periodo1">Periodo de:</label>
						<input type="text" class="form-control" id="dias_vac_rest" name="periodo1">
					</div>
					<div class="col-4">
						<label>al día : </label>
						<input type="text" class="form-control" id="dias_vac_rest" name="periodo2">
					</div>
					<div class="col-4">
						<label class="" for="dias_vac_rest">Días totales: </label> 
						<input type="text" class="form-control" id="dias_vac_rest" name="diastotal">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-success">
						 	<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</form>
			<div class="container form-group mt-3">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th>Fecha</th>
							<th>Fecha de inicio</th>
							<th>Fecha de termino</th>
							<th>Días</th>
							<th>Días restantes</th>
							<th>Periodo de</th>
							<th>Al día</th>
							<th>Días totales</th>
						</tr>
					</thead>
					@foreach ($vacaciones as $vacacion)
						{{-- expr --}}
						<tr class="active">
							<td>{{$vacacion->created_at->toDateString()}}</td>
							<td>{{$vacacion->fechainicio}}</td>
							<td>{{$vacacion->fechafin}}</td>
							<td>{{$vacacion->diastomados}}</td>
							<td>{{$vacacion->diasrestantes}}</td>
							<td>{{$vacacion->periodo1}}</td>
							<td>{{$vacacion->periodo2}}</td>
							<td>{{$vacacion->diastotal}}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection