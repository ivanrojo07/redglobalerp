@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Prospectos:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ route('prospectos.create') }}" class="btn btn-success">Nuevo</a>
				</div>
			</div>
			<div class="row form-group">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th>#</th>
							<th>Razon social</th>
							<th>correo</th>							
							<th>Telefono</th>
							<th>Celular</th>
							{{-- <th># de cotizaciones realizadas</th> --}}
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($prospectos as $prospecto)
							<tr>
								<td>{{$prospecto->id}}</td>
								<td>{{$prospecto->razon_social}}</td>
								<td>{{$prospecto->correo}}</td>
								<td>{{$prospecto->telefono}}</td>
								<td>{{$prospecto->celular}}</td>		
								<td>
									<div class="row">
										<div class="col-6 d-flex flex-column">
											<a class="btn btn-primary" href="{{ route('prospectos.show',['prospecto'=>$prospecto]) }}">Ver prospecto</a>			
										</div>
										<div class="col-6 d-flex flex-column">
											<a class="btn btn-success" href="{{ url('prospectos/'.$prospecto->id.'/cliente') }}">Hacer cliente</a>			
										</div>
									</div>
									
								</td>
							</tr>
						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron registros de prospectos.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="d-flex justify-content-center">
				{{ $prospectos->links() }}
			</div>
		</div>
	</div>
@endsection