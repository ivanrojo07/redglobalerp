@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Cliente:</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ $edit ? route('clientes.update',['cliente'=>$cliente]) : route('clientes.store') }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="d-flex justify-content-center">
					<label class="control-label">Tipo de empresa</label>
				</div>
				<div class="d-flex justify-content-center">
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="tipo_cliente1" name="tipo_cliente" value="nacional" class="custom-control-input" {{$tipo_cliente == "nacional" ? "checked" : ""}}>
					  <label class="custom-control-label" for="tipo_cliente1">Nacionales</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="tipo_cliente2" name="tipo_cliente" value="extranjero" class="custom-control-input" {{$tipo_cliente == "extranjero" ? "checked" : ""}}>
					  <label class="custom-control-label" for="tipo_cliente2">Extranjeros</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="tipo_cliente3" name="tipo_cliente" value="extranjero_ing" class="custom-control-input" {{$tipo_cliente == "extranjero_ing" ? "checked" : ""}} >
					  <label class="custom-control-label" for="tipo_cliente3">Foreign (form in english language)</label>
					</div>
				</div>
				@if ($tipo_cliente)
				<div class="row mt-3 card-header justify-content-center">
					<h5>{{ __('Datos generales') }}</h5>
				</div>
				<div class="row form-group mt-3">
					<div class="{{ $tipo_cliente == "nacional" ? 'col-3' : 'col-4'}}">
						<label class="control-label">{{ __('Razon o denominación social (como aparece en su RFC)') }}</label>
						<input type="text" class="form-control" name="razon_social">
					</div>
					<div class="{{ $tipo_cliente == "nacional" ? 'col-3' : 'col-4'}}">
						<label class="control-label">{{ __('Giro de la empresa (conforme el acta constitutiva)') }}</label>
						<input type="text" class="form-control" name="giro">
					</div>
					<div class="{{ $tipo_cliente == "nacional" ? 'col-3' : 'col-4'}}">
						<label class="control-label">{{ $tipo_cliente == "nacional" ? "RFC" : __('TAX. RUC, NIT') }}</label>
						<input type="text" class="form-control" name="rfc_tax_ruc_nit">
					</div>
					@if ($tipo_cliente == "nacional")
						<div class="col-3">
							<label class="control-label">Regimen en el que tributa</label>
							<input class="form-control" type="text" name="regimen_tributario">
						</div>
					@endif
				</div>
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">{{ __('Calle o avenida') }}</label>
						<input class="form-control" type="text" name="calle">
					</div>
					<div class="col-2">
						<label class="control-label">{{ __('Número exterior') }}</label>
						<input class="form-control" type="text" name="num_ext">
					</div>
					<div class="col-2">
						<label class="control-label">{{ __('Número interior') }}</label>
						<input class="form-control" type="text" name="num_int">
					</div>
					<div class="col-4">
						<label for="" class="control-label">{{ __('Colonia') }}</label>
						<input class="form-control" type="text" name="colonia">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">{{ __('Ciudad, alcaldia o municipio') }}</label>
						<input class="form-control" type="text" name="alcaldia_ciudad">
					</div>
					<div class="col-4">
						<label class="control-label">{{ __('Estado o departamento') }}</label>
						<input class="form-control" type="text" name="estado">
					</div>
					<div class="col-4">
						<label class="control-label">{{ __('Código postal') }}</label>
						<input class="form-control" type="text" name="cp">
					</div>
				</div>
				@if ($tipo_cliente != "nacional")
					<div class="row form-group">
						<div class="col-4">
							<label class="control-label">{{ __('Pais') }}</label>
							<input class="form-control" type="text" name="pais">
						</div>
						<div class="col-4">
							<label class="control-label">{{ __('Lugar de residencia (Personas)') }}</label>
							<input class="form-control" type="text" name="residencia">
						</div>
						<div class="col-4">
							<label class="control-label">{{ __('Nacionalidad (Personas)') }}</label>
							<input class="form-control" type="text" name="nacionalidad">
						</div>
					</div>
				@endif
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">{{ __('Número telefonico') }}</label>
						<input class="form-control" type="text" name="telefono">
					</div>
					<div class="col-4">
						<label class="control-label">{{ __('Correo electronico') }}</label>
						<input class="form-control" type="email" name="email">
					</div>
				</div>
				{{-- DATOS DE COBRANZA --}}
				<div class="row mt-3 card-header justify-content-center">
					<h5>{{ __('Datos de contacto para cobros') }}</h5>
				</div>
				<div class="row form-group mt-3">
					<div class="col-4">
						<label class="control-label">{{ __('Nombre') }}</label>
						<input class="form-control" type="text" name="nombre">
					</div>
					<div class="col-4">
						<label class="control-label">{{ __('Puesto o area') }}</label>
						<input class="form-control" type="text" name="puesto">
					</div>
					<div class="col-4">
						<label class="control-label">{{ __('Número telefonico y extensión') }}</label>
						<input class="form-control" type="text" name="telefono">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">{{ __('Correo electronico') }}</label>
						<input class="form-control" type="email" name="correo">
					</div>
					<div class="col-4">
						<label class="control-label">{{ $tipo_cliente == "nacional" ? "Día de revisión" : __('Días de recepción de facturas') }}</label>
						<input class="form-control" type="text" name="dia_revision_factura">
					</div>
					<div class="col-4">
						<label class="control-label">{{ __('Días de pago') }}</label>
						<input class="form-control" type="text" name="dia_pago">
					</div>
				</div>
				{{-- INFORMACIÓN BANCARIA --}}
				<div class="row mt-3 card-header justify-content-center">
					<h5>{{ __('Información bancaria') }}</h5>
				</div>
				<div class="row form-group mt-3">
					<div class="col-4">
						<label class="control-label">{{ __('Nombre del banco') }}</label>
						<input class="form-control" type="text" name="nombre_b">
					</div>
					<div class="col-2">
						<label class="control-label">{{ __('Plaza') }}</label>
						<input class="form-control" type="text" name="plaza">
					</div>
					<div class="col-2">
						<label class="control-label">{{ __('Sucursal') }}</label>
						<input class="form-control" type="text" name="sucursal">
					</div>
					<div class="col-4">
						<label class="control-label">{{__('Número de cuenta')}}</label>
						<input class="form-control" type="text" name="cuenta">
					</div>
				</div>
				@if ($tipo_cliente != "nacional")
					{{-- Extranjeros --}}
					<div class="row form-group">
						<div class="col-4">
							<label class="control-label">{{ __('Clave internacional para transferencias') }}</label>
							<input class="form-control" type="text" name="clave_int_trans">
						</div>
						<div class="col-4">
							<label class="control-label">{{ __('ABA') }}</label>
							<input class="form-control" type="text" name="aba">
						</div>
						<div class="col-4">
							<label class="control-label">{{ __('SWIFT') }}</label>
							<input class="form-control" type="text" name="swift">
						</div>
					</div>
				@endif
				@if ($tipo_cliente == "nacional")
					{{-- Nacionales --}}
					<div class="row form-group">
						<div class="col-4">
							<label class="control-label">RFC del banco</label>
							<input class="form-control" type="text" name="rfc_banco">
						</div>
						<div class="col-4">
							<label class="control-label">CLABE INTERBANCARIA</label>
							<input class="form-control" type="text" name="clabe_inter">
						</div>
						<div class="col-4">
							<label class="control-label">Metodo de pago</label>
							<input class="form-control" type="text" name="metodo_pago">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-4">
							<label class="control-label">Forma de pago</label>
							<input class="form-control" type="text" name="forma_pago">
						</div>
						<div class="col-4">
							<label class="control-label">Uso del CFDI</label>
							<input class="form-control" type="text" name="uso_cfdi">
						</div>
					</div>
				@endif
				{{-- INFORMACIÓN REPRESENTANTE LEGAL --}}
				<div class="row mt-3 card-header justify-content-center">
					<h5>{{ __('Informaciónd el representante legal') }}</h5>
				</div>
				<div class="row form-group mt-3">
						<div class="col-4">
							<label class="control-label">{{ __('Nombre') }}</label>
							<input class="form-control" type="text" name="nombre_l">
						</div>
						@if ($tipo_cliente == "nacional")
							<div class="col-4">
								<label class="control-label">RFC del representante</label>
								<input class="form-control" type="text" name="rfc">
							</div>
						@endif
						<div class="col-4">
							<label class="control-label">Fecha</label>
							<input class="form-control" type="date" name="fecha_l">
						</div>
					</div>
					<div class="row form-group justify-content-center">
						<button type="submit" class="btn btn-success">
							<strong>
								<i class="far fa-save"></i> 
								{{ __('Guardar') }}
							</strong>
						</Button>
					</div>
				@endif
			</form>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$("input[name=tipo_cliente]").change(function(res){
			var selValue = $('input[name=tipo_cliente]:checked').val();
			window.location.href = "{{ url('clientes/form') }}/"+selValue;


		})
	</script>
@endsection