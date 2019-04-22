@extends('layouts.blank')
@section('content')
<div class="card card-default">
	<div class="card-header">
		<div class="d-flex bd-highlight">
			<div class="p-2 bd-highlight">
				<h4 class="title">
					Cotizaciones
				</h4>
			</div>
			<div class="ml-auto p-2 bd-highlight">
				<a class="btn btn-primary" href="{{ route('cotizacions.create') }}" role="button"><i class="fas fa-plus-circle"></i> Nueva cotización</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-striped table-bordered">
			<thead>
				<th scope="col">ID</th>
				<th scope="col">Contacto</th>
				<th scope="col">Mercancias</th>
				<th scope="col"></th>
			</thead>
			<tbody>
				@forelse ($cotizaciones as $cotizacion)
					<tr>
						<th scope="row">{{$cotizacion->id}}</th>
						<td>
							{{$cotizacion}}
						</td>
						<td>
							{{$cotizacion->mercancias}}
						</td>
						<td></td>
					</tr>
				@empty
					<div class="alert alert-danger" role="alert">
				  		No sé encontraron registros
					</div>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection