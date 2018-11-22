@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Clientes:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ route('clientes.create') }}" class="btn btn-success">Nuevo</a>
				</div>
			</div>
			<div class="row form-group">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th>Razon social</th>
							<th>Tipo</th>
							<th>Giro</th>
							<th>RFC, TAX, RUC ó NIT</th>
							<th>Telefono</th>
							<th>Email</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($clientes as $cliente)
							<tr>
								<td>{{$cliente->razon_social}}</td>
								<td>{{$cliente->tipo_cliente}}</td>
								<td>{{$cliente->giro}}</td>
								<td>{{$cliente->rfc_tax_ruc_nit}}</td>
								<th>{{$cliente->telefono}}</th>
								<th>{{$cliente->email}}</th>
								<th></th>
							</tr>
						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron registros de clientes.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="d-flex justify-content-center">
				{{ $clientes->links() }}
			</div>
		</div>
	</div>
@endsection