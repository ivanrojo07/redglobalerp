@extends('layouts.blank')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>Licencia:</h4>
	</div>
	<div class="card-body">
		<form role="form" method="POST" action="{{ $edit ? route('empleados.licencias.update',['licencia'=>$licencia,'empleado'=>$empleado]) : route('empleados.licencias.store',['empleado'=>$empleado]) }}">
			@csrf
			@if ($edit)
				@method('PUT')
			@endif
			<div class="row form-group">
				<div class="col-3">
					<label class="control-label">
						*Tipo de licencia:
					</label>
					<select class="form-control" name="tipo_licencia_id" id="tipo_licencia" required>
						<option value="">Seleccione el tipo de licencia</option>
						@foreach ($tipos as $tipo)
							<option value="{{$tipo->id}}" title="{{$tipo->descripcion}}" {{($edit && $licencia->tipo->id == $tipo->id) ? "selected" : ""}}>{{$tipo->nombre}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-3">
					<label class="control-label">
						*Fecha de vencimiento:
					</label>
					<input class="form-control" type="date" name="vencimiento" value="{{$licencia->vencimiento}}" required>
				</div>
				<div class="col-3">
					<label class="control-label">
						Vehiculo a conducir:
					</label>
					<input class="form-control" type="text" name="vehiculos" value="{{$licencia->vehiculos}}">
				</div>
				<div class="col-3">
					<label class="control-label">
						Años de experiencia:
					</label>
					<input class="form-control" type="number" step="0.1" min="0" name="experiencia" value="{{$licencia->experiencia}}">
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