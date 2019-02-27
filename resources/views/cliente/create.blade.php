@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Cliente:</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ $edit ? route('clientes.update',['cliente'=>$cliente]) : route('clientes.store') }}" enctype="multipart/form-data">
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
							<select class="form-control" name="regimen_tributario" required>
								<option value="">Seleccione uno</option>
								<option value="610 Residentes en el Extranjero sn Establecimiento Permanente en México">610 Residentes en el Extranjero sn Establecimiento Permanente en México</option>
								<option value="611 Ingresos por Dividendos (socios y accionistas)">611 Ingresos por Dividendos (socios y accionistas)</option>
								<option value="612 Personas Físicas con Actividades Empresariales y Profesionales">612 Personas Físicas con Actividades Empresariales y Profesionales</option>
								<option value="614 Ingresos por intereses">614 Ingresos por intereses</option>
								<option value="616 Sin obligaciones fiscales">616 Sin obligaciones fiscales</option>
								<option value="620 Sicuedades Coperativas de Produccion que optan por diferir sus ingresos">620 Sicuedades Coperativas de Produccion que optan por diferir sus ingresos</option>
								<option value="621 Incorporación Fiscal">621 Incorporación Fiscal</option>
								<option value="622 Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras">622 Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
								<option value="623 Opcional para Grupos de Sociedades">623 Opcional para Grupos de Sociedades</option>
								<option value="624 Coordinados">624 Coordinados</option>
								<option value="628 Hidrocarburos">628 Hidrocarburos</option>
								<option value="607 Régimen de Enajenación o Adquisición de Bienes">607 Régimen de Enajenación o Adquisición de Bienes</option>
								<option value="629 De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales">629 De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
								<option value="630 Enajenación de acciones en bolsa de valores">630 Enajenación de acciones en bolsa de valores</option>
								<option value="615 Régimen de los ingresos por obtención de premios">615 Régimen de los ingresos por obtención de premios</option>
							</select>
							{{-- <input class="form-control" type="text" name="regimen_tributario"> --}}
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
						<label class="control-label">{{ __('Correo electronico (conforme a su registro fiscal)') }}</label>
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
						<input class="form-control" type="text" name="telefono_cobro">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">{{ __('Correo electronico (para aclaración de pagos)') }}</label>
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
							<select class="form-control" name="metodo_pago"required>
								<option value="">Seleccione el metodo de pago</option>
								<option value="PUE Pago en una sola exhibición">PUE Pago en una sola exhibición</option>
								<option value="PPD Pago en parcialidades o diferido">PPD Pago en parcialidades o diferido</option>
							</select>
							{{-- <input class="form-control" type="text" name="metodo_pago"> --}}
						</div>
					</div>
					<div class="row form-group">
						<div class="col-4">
							<label class="control-label">Forma de pago</label>
							<select class="form-control" name="forma_pago" required>
								<option value="">Seleccione su forma de pago</option>
								<option value="01 Efectivo">01 Efectivo</option>
								<option value="02 Cheque nominativo">02 Cheque nominativo</option>
								<option value="03 Transferencia electrónica de fondos">03 Transferencia electrónica de fondos</option>
								<option value="04 Tarjeta de crédito">04 Tarjeta de crédito</option>
								<option value="05 Monedero electrónico">05 Monedero electrónico</option>
								<option value="06 Dinero electrónico">06 Dinero electrónico</option>
								<option value="08 Vales de despensa">08 Vales de despensa</option>
								<option value="12 Dación de pago">12 Dación de pago</option>
								<option value="12 Dación de pago">12 Dación de pago</option>
								<option value="13 Pago por subrogación">13 Pago por subrogación</option>
								<option value="14 Pago por consignación">14 Pago por consignación</option>
								<option value="15 Condonación">15 Condonación</option>
								<option value="17 Compensación">17 Compensación</option>
								<option value="23 Novación">23 Novación</option>
								<option value="24 Confusión">24 Confusión</option>
								<option value="25 Remisión de deuda">25 Remisión de deuda</option>
								<option value="26 Prescripción o caducidad">26 Prescripción o caducidad</option>
								<option value="27 A satisfaccion del acreedor">27 A satisfaccion del acreedor</option>
								<option value="28 Tarjeta de débito">28 Tarjeta de débito</option>
								<option value="29 Tarjeta de servicios">29 Tarjeta de servicios</option>
								<option value="30 Aplicación de anticipos">30 Aplicación de anticipos</option>
								<option value="31 Intermediario pagos">31 Intermediario pagos</option>
								<option value="99 Por definir">99 Por definir</option>
							</select>
							{{-- <input class="form-control" type="text" name="forma_pago"> --}}
						</div>
						<div class="col-4">
							<label class="control-label">Uso del CFDI</label>
							<select class="form-control" name="uso_cfdi" required>
								<option value="">Seleccione el uso del cfdi</option>
								<option value="G01 Adquisición de mercancias">G01 Adquisición de mercancias</option>
								<option value="G02 Devoluciones, descuentos o bonificaciones">G02 Devoluciones, descuentos o bonificaciones</option>
								<option value="G03 Gastos en general">G03 Gastos en general</option>
								<option value="I01 Construcciones">I01 Construcciones</option>
								<option value="I02 Mobilario y equipo de oficina por inversiones">I02 Mobilario y equipo de oficina por inversiones</option>
								<option value="I03 Equipo de transporte">I03 Equipo de transporte</option>
								<option value="I04 Equipo de computo y accesorios">I04 Equipo de computo y accesorios</option>
								<option value="I05 Dados, troqueles, moldes, matrices y herramental">I05 Dados, troqueles, moldes, matrices y herramental</option>
								<option value="I06 Comunicaciones telefónicas">I06 Comunicaciones telefónicas</option>
								<option value="I07 Comunicaciones satelitales">I07 Comunicaciones satelitales</option>
								<option value="I08 Otra maquinaria y equipo">I08 Otra maquinaria y equipo</option>
								<option value="D01 Honorarios médicos, dentales y gastos hospitalarios">D01 Honorarios médicos, dentales y gastos hospitalarios</option>
								<option value="D02 Gastos médicos por incapacidaad o discapacidad">D02 Gastos médicos por incapacidaad o discapacidad</option>
								<option value="D03 Gastos funerales">D03 Gastos funerales</option>
								<option value="D04 Donativos">D04 Donativos</option>
								<option value="D05 Intereses reales efectivamente pagados por créditos hipotecarios(casa habitación)">D05 Intereses reales efectivamente pagados por créditos hipotecarios(casa habitación)</option>
								<option value="D06 Aportaciones voluntarias al SAR">D06 Aportaciones voluntarias al SAR</option>
								<option value="D07 Primas por seguros de gastos médicos">D07 Primas por seguros de gastos médicos</option>
								<option value="D08 Gastos de transportación escolar obligatoria">D08 Gastos de transportación escolar obligatoria</option>
								<option value="D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones">D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones</option>
								<option value="D10 Pagos por servicios educativos (colegiaturas)">D10 Pagos por servicios educativos (colegiaturas)</option>
								<option value="P01 Por definir">P01 Por definir</option>
							</select>
							{{-- <input class="form-control" type="text" name="uso_cfdi"> --}}
						</div>
					</div>
				@endif
				{{-- INFORMACIÓN REPRESENTANTE LEGAL --}}
				<div class="row mt-3 card-header justify-content-center">
					<h5>{{ __('Información del representante legal') }}</h5>
				</div>
				<div class="row form-group mt-3">
						<div class="col-4">
							<label class="control-label">{{ __('Nombre') }}</label>
							<input class="form-control" type="text" name="nombre_l">
						</div>
						{{-- @if ($tipo_cliente == "nacional") --}}
							<div class="col-4">
								<label class="control-label">{{__("RFC del representante")}}</label>
								<input class="form-control" type="text" name="rfc">
							</div>
						{{-- @endif --}}
						<div class="col-4">
							<label class="control-label">{{__("Fecha")}}</label>
							<input class="form-control" type="date" name="fecha_l">
						</div>
				</div>
				<div class="row mt-3 card-header justify-content-center">
					<h5>{{ __('Documentos') }}</h5>
				</div>
				<div class="row form-group mt-3">
					<div class="col-3">
						<label class="control-label">{{ __('Constancia de situación fiscal (CIF actualizado):') }}</label>
						<input id="input-b1" name="cif_tax_nit_rut" type="file" class="file form-control" data-browse-on-zone-click="true">
					</div>
					<div class="col-3">
						<label class="control-label">{{ __('Comprobante de domicilio (Reciente, no más de 3 meses de antigüedad):') }}</label>
						<input id="input-b1" name="comp_dom" type="file" class="file form-control" data-browse-on-zone-click="true">
					</div>
					<div class="col-3">
						<label class="control-label">{{ __('Acta constitutiva:') }}</label>
						<input id="input-b1" name="acta_constitutiva" type="file" class="file form-control" data-browse-on-zone-click="true">
					</div>
					<div class="col-3">
						<label class="control-label">{{ __('Identificación del Representante legal de la empresa:') }}</label>
						<input id="input-b1" name="identificacion_rep_legal" type="file" class="file form-control" data-browse-on-zone-click="true">
					</div>
					{{-- <div class="col-3">
						<label class="control-label">{{ __('Carta poder de la empresa:') }}</label>
						<input id="input-b1" name="carta_poder" type="file" class="file form-control" data-browse-on-zone-click="true">
					</div> --}}
				</div>
				<div class="row form-group justify-content-center">
					<button type="submit" class="btn btn-success btn-lg">
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