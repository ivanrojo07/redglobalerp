@extends('layouts.blank')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>Accidente o incidencia:</h4>
	</div>
	<div class="card-body">
		<form role="form" method="POST" action="{{ $edit ? route('empleados.accidentes.update',['accidente'=>$accidente,'empleado'=>$empleado]) : route('empleados.accidentes.store',['empleado'=>$empleado]) }}">
			@csrf
			@if ($edit)
				@method('PUT')
			@endif
			<div class="row form-group">
				<div class="col-3">
					<label class="control-label">
						*Fecha del incidente:
					</label>
					<input class="form-control" type="date" name="fecha" value="{{$accidente->fecha}}" required>
				</div>
				<div class="col-3">
					<label class="control-label">
						*Tipo de incidente:
					</label>
					<input class="form-control" type="text" name="nombre" value="{{$accidente->nombre}}" required>
				</div>
				<div class="col-3">
					<label class="control-label">
						*Lugar del incidente:
					</label>
					<input class="form-control" type="text" name="lugar" value="{{$accidente->lugar}}" required>
				</div>
				<div class="col-3">
					<label class="control-label">
						Descripción o comentarios:
					</label>
					<textarea class="form-control" name="comentarios">{{$accidente->comentarios}}</textarea>
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
	</div>
</div>
@endsection