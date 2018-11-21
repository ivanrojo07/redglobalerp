@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Licencias:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">	
				<div class="offset-5 col-4">
					<a href="{{ route('empleados.licencias.create',['empleado'=>$empleado]) }}" class="btn btn-success">Nueva Licencia</a>
				</div>
			</div>
			@if ($licencia)
				{{-- expr --}}
				<div class="row card-header">
					<h4>Ultima licencia:</h4>
				</div>
				<div class="row mt-3 form-group">
					<div class="col-3">
						<label class="control-label">
							*Tipo de licencia:
						</label>
						<dd>{{$licencia->tipo->nombre}} ({{$licencia->tipo->descripcion}})</dd>
						
					</div>
					<div class="col-3">
						<label class="control-label">
							*Fecha de vencimiento:
						</label>
						<dd>{{$licencia->vencimiento}}</dd>
					</div>
					<div class="col-3">
						<label class="control-label">
							Vehiculo a conducir:
						</label>
						<dd>{{$licencia->vehiculos}}</dd>
					</div>
					<div class="col-3">
						<label class="control-label">
							Años de experiencia:
						</label>
						<dd>{{$licencia->experiencia}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-info" href="{{ route('empleados.licencias.edit',['empleado'=>$empleado,'licencia'=>$licencia]) }}"><i class="fas fa-edit"></i>
						 	<strong>Editar</strong>
						</a>
					</div>
				</div>
			@endif
			<div class="container mt-3">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th scope="col">Licencia</th>
							<th scope="col">Descripción</th>
							<th scope="col">Vencimiento</th>
							<th scope="col">Vehiculos</th>
							<th scope="col">Experiencia</th>
							<th scope="col">Acción</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($licencias as $licencia)
							<tr class="active">
								<td>{{$licencia->tipo->nombre}}</td>
								<td>{{$licencia->tipo->descripcion}}</td>
								<td>{{$licencia->vencimiento}}</td>
								<td>{{$licencia->vehiculos}}</td>
								<td>{{$licencia->experiencia}} años</td>
								<td>
									<div class="d-flex justify-content-center">
										<a class="btn btn-info btn-sm" href="{{ route('empleados.licencias.edit',['empleado'=>$empleado,'licencia'=>$licencia]) }}"><i class="fas fa-edit"></i><strong>Editar</strong></a>
									</div>
								</td>
							</tr>
						@empty
						<div class="container">
							<div class="alert alert-danger" role="alert">
							  Sin registro
							</div>
						</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection