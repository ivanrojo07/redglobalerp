@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Proyectos:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ route('clientes.proyectos.create',['cliente'=>$cliente]) }}" class="btn btn-success">Nuevo</a>
				</div>
			</div>
			<div class="row form-group">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th>Fecha</th>
							<th>Responsable</th>
							<th>Telefono</th>
							<th>Correo</th>
							<th>Producto(s)</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($cliente->proyectos as $proyecto)
							<tr>
								<td>{{date('d-m-Y', strtotime($proyecto->created_at))}}</td>
								<td>{{$proyecto->responsable}}</td>
								<td>{{$proyecto->telefono}}</td>
								<td>{{$proyecto->correo}}</td>
								<td>@foreach ($proyecto->productos as $producto)
									{{-- expr --}}
									<p>{{$producto->nombre}} de {{$producto->origen}} a {{$producto->destino}}</p>
								@endforeach</td>
								<td></td>
							</tr>
						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron proyectos al cliente.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection