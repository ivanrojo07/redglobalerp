@extends('layouts.blank')
@section('content')
	@php
	$hoja_palco = explode(".", $expediente->hoja_palco);
	$hoja_palco = $hoja_palco[1];
	$identificacion = explode(".", $expediente->identificacion);
	$identificacion = $identificacion[1];
	$comprobante_domicilio = explode(".", $expediente->comprobante_domicilio);
	$comprobante_domicilio = $comprobante_domicilio[1];
	$curp = explode(".", $expediente->curp);
	$curp = $curp[1];
	$rfc = explode(".", $expediente->rfc);
	$rfc = $rfc[1];
	$acta_nacimiento = explode(".", $expediente->acta_nacimiento);
	$acta_nacimiento = $acta_nacimiento[1];
	$imss = explode(".", $expediente->imss);
	$imss = $imss[1];
	$contrato = explode(".", $expediente->contrato);
	$contrato = $contrato[1];
	@endphp
	<div class="card">
		<div class="card-header">
			<h4>Expediente:</h4>
		</div>
		<div class="card-body">
			<div class="card-deck">	
				@if($hoja_palco != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->hoja_palco) }}" alt="">
					</a>
					<div class="desc">Hoja Palco</div>
				</div>
				@endif
				@if($identificacion != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->identificacion) }}" alt="">
					</a>
					<div class="desc">Identificación</div>
				</div>
				@endif
				@if($comprobante_domicilio != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						{{ $comprobante_domicilio }}
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->comprobante_domicilio) }}" alt="">
						}
					</a>
					<div class="desc">Comprobante de Domicilio</div>
				</div>
				@endif
				@if($curp != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->curp) }}" alt="">
					</a>
					<div class="desc">CURP</div>
				</div>
				@endif
				@if($rfc != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->rfc) }}" alt="">
					</a>
					<div class="desc">RFC</div>
				</div>
				@endif
				@if($acta_nacimiento != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->acta_nacimiento) }}" alt="">
					</a>
					<div class="desc">Acta Nacimiento</div>
				</div>
				@endif
				@if($imss != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->imss) }}" alt="">
					</a>
					<div class="desc">IMSS</div>
				</div>
				@endif
				@if($contrato != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->contrato) }}" alt="">
					</a>
					<div class="desc">Contrato</div>
				</div>
				@endif

				<!-- ######## BOTONES PARA VER PDF  ###########-->

				<div class="row">@if($hoja_palco == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->hoja_palco) }}">
								ver Hoja Palco
							</a>
						</div>
					</div>
					@endif
					@if($identificacion == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->identificacion) }}">
								ver Identificación
							</a>
						</div>
					</div>
					@endif
					@if($comprobante_domicilio == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->comprobante_domicilio) }}">
								ver Comprobante de Domicilio
							</a>
						</div>
					</div>
					@endif
					@if($curp == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->curp) }}">
								ver CURP
							</a>
						</div>
					</div>
					@endif
					@if($rfc == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->rfc) }}">
								ver RFC
							</a>
						</div>
					</div>
					@endif
					@if($acta_nacimiento == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->acta_nacimiento) }}">
								ver Acta de Nacimiento
							</a>
						</div>
					</div>
					@endif
					@if($imss == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->imss) }}">
								ver IMSS
							</a>
						</div>
					</div>
					@endif
					@if($contrato == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$empleado->fullname.'/'.$expediente->contrato) }}">
								ver Identificación
							</a>
						</div>
					</div>
					@endif</div>
			</div>
		</div>
	</div>
@endsection
