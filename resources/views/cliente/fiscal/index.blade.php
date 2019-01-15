@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Direcciones fiscales</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ route('clientes.dirfiscals.create',['cliente'=>$cliente]) }}" class="btn btn-success">Nueva dirección</a>
				</div>
			</div>
			<div class="row form-group">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<td>Nombre</td>
						<td>Dirección</td>
						<td>Acción</td>
					</thead>
					<tbody>
						@forelse ($cliente->dirFiscales as $fiscal)
							<tr>
								<td>
									{{$fiscal->nombre}}
								</td>
								<td>
									{{'Calle: '.$fiscal->calle.', número exterior: '.$fiscal->numext.', int: '.$fiscal->int.', Población: '.$fiscal->colonia.', Alcaldía o Municipio: '.$fiscal->municipio.', Ciudad: '.$fiscal->ciudad.', Estado: '.$fiscal->estado}}
								</td>
								<td>
									<a class="btn btn-success btn-sm" href="{{ route('clientes.fiscals.show',['cliente'=>$cliente,'dirfiscal'=>$fiscal]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
							<strong>Ver</strong>	</a>
								</td>
							</tr>
						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron registros del cliente.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection