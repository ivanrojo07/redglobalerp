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
								<th>
									<div class="row">
										<div class="col-6 d-flex flex-column">
											@if ($cliente->documento['cif_tax_nit_rut'])
												{{-- expr --}}
												<a class="btn btn-primary" href="{{ route('cif_tax',['cliente'=>$cliente]) }}" role="button">{{$cliente->tipo_cliente == "nacional" ? "CFI" : "TAX, NIT, RUC"}}</a>
											@endif
											@if ($cliente->documento['comp_dom'])
												{{-- expr --}}
												<a class="btn btn-primary" href="{{ route('compdom',['cliente'=>$cliente]) }}" role="button">Comprobante de domicilio</a>
											@endif
										</div>
										<div class="col-6 d-flex flex-column">
											@if ($cliente->documento['acta_constitutiva'])
												{{-- expr --}}
												<a class="btn btn-primary" href="{{ route('actacons',['cliente'=>$cliente]) }}" role="button">Acta Constitutiva</a>
											@endif
											@if ($cliente->documento['identificacion_rep_legal'])
												{{-- expr --}}
												<a class="btn btn-primary" href="{{ route('idrepresentante',['cliente'=>$cliente]) }}" role="button">ID del representante legal</a>
											@endif
											@if ($cliente->documento['carta_poder'])
												{{-- expr --}}
												<a class="btn btn-primary" href="{{ route('cartapoder',['cliente'=>$cliente]) }}" role="button">Carta poder</a>
											@endif
										</div>
										
									</div>
									
								</th>
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