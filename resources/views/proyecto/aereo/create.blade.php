@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Servicio Aereo para {{$proyecto->cliente->razon_social}}:</h4>
		</div>
		<form>
			<div class="card-header">
				<h5>Servicio Aereo:</h5>

			</div>
			<div class="card-body">
				@foreach ($proyecto->productos as $producto)
					{{-- expr --}}
					<servaereo-component :producto="{{json_encode(json_decode($producto),true)}}"></servaereo-component>
				@endforeach
			</div>
		</form>
	</div>
@endsection