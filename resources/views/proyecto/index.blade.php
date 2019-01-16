@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Proyectos</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-4 col-4">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar proyecto" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">
								<a href="#">
									<i class="fas fa-search"></i>
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<td>
							Nombre del proyecto
						</td>
						<td>
							Razón social de la empresa
						</td>
						<td>
							Responsable
						</td>
						<td>
							Productos
						</td>
						<td>
							Estado de cotización
						</td>
						<td>
							Acción
						</td>
					</thead>
					<tbody>
						@forelse ($proyectos as $proyecto)
							<tr>
								<td>
									{{$proyecto->nombre}}
								</td>
								<td>
									{{$proyecto->cliente->razon_social}}
								</td>
								<td>
									<p>
										Nombre: {{$proyecto->responsable}}
									</p>
									<p>
										Telefono: {{$proyecto->telefono}}
									</p>
									<p>
										Correo: {{$proyecto->correo}}
									</p>
								</td>
								<td>
									@foreach ($proyecto->productos as $producto)
										<p>
											{{$producto->nombre." de ".$producto->origen." a ".$producto->destino}}
										</p>
									@endforeach
								</td>
								<td>
									<div class="progress">
										<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
									</div>
								</td>
								<td>
									<div class="d-flex justify-content-around">
										<a href="#" class="btn btn-info btn-sm ml-1">Detalles del proyecto</a>
										<a href="#" class="btn btn-secondary btn-sm ml-1">Detalles de cotización</a>
										<a href="#" class="btn btn-success disabled btn-sm ml-1">Enviar cotización al cliente</a>
										<a href="#" class="btn btn-danger btn-sm ml-1">Archivar cotización</a>
									</div>
								</td>
							</tr>
						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron registros de proyectos.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection