@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Reportes de disciplina:</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ route('empleados.disciplinas.store',['empleado'=>$empleado]) }}">
				@csrf
				<div class="row form-group">
					<div class="col-4">
						<label for="fecha" class="control-label">Fecha de Reporte de Disciplina</label>
						<input type="date" name="fecha" id="fecha" class="form-control" required="">
					</div>
					<div class="col-4">
						<label for="tipoindisciplina" class="control-label">Tipo de amonestación</label>
						<select name="tipoindisciplina" id="tipoindisciplina" class="form-control" required="">
							<option value="">Seleccione la amonestación que cometio el empleado</option>
							@foreach($amonestaciones as $amonestacion)
								<option value="{{ $amonestacion->nombre }}">{{ $amonestacion->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-4">
						<label for="motivo" class="control-label">Especifique el motivo</label>
						<textarea class="form-control" id="motivo" name="motivo" maxlength="50" required></textarea>
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
							<th>Fecha del reporte</th>
							<th>Tipo de disciplina</th>
							<th>Motivo</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($disciplinas as $disciplina)
							<tr>
								<td>{{$disciplina->fecha}}</td>
								<td>{{$disciplina->indisciplina}}</td>
								<td>{{$disciplina->motivo}}</td>
							</tr>
						@empty
							<div class="alert alert-danger" role="alert">
								El empleado {{$empleado->nombre." ".$empleado->appaterno." ".$empleado->apmaterno}} no tiene registros de altercados
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('script')

@endsection