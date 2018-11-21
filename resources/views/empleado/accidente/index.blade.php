@extends('layouts.blank')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>Accidentes o incidencias:</h4>
	</div>
	<div class="card-body">
		<div class="row form-group">	
			<div class="offset-5 col-4">
				<a href="{{ route('empleados.accidentes.create',['empleado'=>$empleado]) }}" class="btn btn-success">Nueva incidencia</a>
			</div>
		</div>
		<div class="container mt-3">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr class="table-info">
						<th scope="col">Fecha</th>
						<th scope="col">Incidencia o accidente</th>
						<th scope="col">Lugar</th>
						<th scope="col">Comentarios</th>
						<th scope="col">Acción</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($accidentes as $accidente)
						<tr class="active">
							<td>{{$accidente->fecha}}</td>
							<td>{{$accidente->nombre}}</td>
							<td>{{$accidente->lugar}}</td>
							<td>{{$accidente->comentarios}}</td>
							<td>
								<div class="d-flex justify-content-center">
									<a class="btn btn-info btn-sm" href="{{ route('empleados.accidentes.edit',['empleado'=>$empleado,'accidente'=>$accidente]) }}"><i class="fas fa-edit"></i><strong>Editar</strong></a>
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