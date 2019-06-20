@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Prestamos:</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ route('empleados.prestamos.store',['empleado'=>$empleado]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row form-group">
					<div class="col-3 offset-2">
						<label for="tipopermiso" class="control-label">Fecha</label>
						<input type="date" name="fecha" class="form-control" required="">
					</div>
					<div class="col-3">
						<label for="permiso" class="control-label">Monto</label>
						<input type="text" name="monto" class="form-control" required="">
					</div>
					<div class="col-3">
						<label for="fecha" class="control-label">Número de pagos</label>
						<input type="number" name="numero_pagos" class="form-control" id="numnero_pagos" step="1" required="">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-6 offset-2">
						<label for="fechainicio" class="control-label">Razon del Prestamo</label>
						<textarea name="motivo" id="motivo" cols="30" rows="5" class="form-control" required=""></textarea>
					</div>
					<div class="col-3">
						<label for="descuento_nomina" class="control-label">Descuento por Nómina</label>
						<div class="form-check">
							<input type="radio" name="descuento_nomina" class="form-check-input" id="descuento_nomina" value="Si">
							<label class="form-check-label" for="exampleRadios2">Si</label>
						</div>
						<div class="form-check">
							<input type="radio" name="descuento_nomina" class="form-check-input" id="descuento_nomina" value="No">
							<label class="form-check-label" for="exampleRadios2">No</label>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-3 offset-4 col-sm-12 col-md-4 col-xl-4 form-group">
		    			<label for="ficha_deposito_path">Ficha de deposito</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="talon_path" data-preview-file-type="text" {{-- required --}}>
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
							<th scope="col">Monto</th>
							<th scope="col">Número de Pagos</th>
							<th scope="col">Razon del Prestamo</th>
							<th scope="col">Descuento por nómina</th>
							<th scope="col">Talon Firmado</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($prestamos as $prestamo)
							{{-- expr --}}
							<tr>
								<td>{{$prestamo->fecha}}</td>
								<td>{{$prestamo->monto}}</td>
								<td>{{$prestamo->numero_pagos}}</td>
								<td>{{$prestamo->motivo}}</td>
								<td>{{$prestamo->descuento_nomina}}</td>
								<td>{{$prestamo->imagen_talon}}</td>
							</tr>
						@empty
							<div class="alert alert-danger" role="alert">
								El empleado {{$empleado->nombre." ".$empleado->appaterno." ".$empleado->apmaterno}} no tiene registros de prestamos
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection