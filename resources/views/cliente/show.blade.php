@extends('layouts.blank')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>{{$cliente->razon_social}}</h4>
	</div>
	<div class="card-body">
		<div>
			<ul class="nav nav-tabs" id="clientesTabs" role="tablist">
				<li class="nav-item"><a href="#generales" class="nav-link active" id="generalTab" data-toggle="tab" role="tab" aria-controls="generales" aria-selected="true">Datos Generales</a></li>
				<li class="nav-item"><a href="#fiscales" class="nav-link" id="fiscalTab" data-toggle="tab" role="tab" aria-controls="fiscales" aria-selected="true">Datos Fiscales</a></li>
				<li class="nav-item"><a href="#contactos" class="nav-link" id="contactoTab" data-toggle="tab" role="tab" aria-controls="contactos" aria-selected="true">Datos de Contacto</a></li>
				<li class="nav-item"><a href="#comerciales" class="nav-link" id="comercialTab" data-toggle="tab" role="tab" aria-controls="comerciales" aria-selected="true">Condiciones Comerciales</a></li>
				<li class="nav-item"><a href="#proyectos" class="nav-link" id="proyectoTab" data-toggle="tab" role="tab" aria-controls="proyectos" aria-selected="true">Solicitud de cotizaciónes</a></li>
				{{-- <li class="nav-item"><a href="#seguimiento" class="nav-link" id="seguimientoTab" data-toggle="tab" role="tab" aria-controls="seguimiento" aria-selected="true">Seguimiento</a></li> --}}
				<li class="nav-item"><a href="#crm" class="nav-link" id="crmTab" data-toggle="tab" role="tab" aria-controls="crm" aria-selected="true">C.R.M.</a></li>
			</ul>
		</div>
		<div class="tab-content" id="clienteTabContent">
			<div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
				<div class="card">
					<div class="card-header">
						<h4>Datos Generales:</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-4 mb-2">
								<label class="control-label">Tipo de cliente:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->tipo_cliente}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Razón social:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->razon_social}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Giro:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->giro}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Regimen tributario:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->regimen_tributario}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">{{ $cliente->tipo_cliente == "nacional" ? "RFC:" : __('TAX. RUC, NIT') }}</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->rfc_tax_ruc_nit}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Calle:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->calle}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Número exterior:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->num_ext}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Número interior:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->num_int}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Colonia:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->colonia}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Alcaldía o municipio:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->alcaldia_ciudad}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Estado:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->estado}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Pais:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->pais}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Código Postal:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->cp}}</span>
							</div>
							@if ($cliente->tipo_cliente == "extranjero")
							<div class="col-4 mb-2">
								<label class="control-label">Residencia:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->residencia}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Nacionalidad:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->nacionalidad}}</span>
							</div>
							@endif
							<div class="col-4 mb-2">
								<label class="control-label">Telefono:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->telefono}}</span>
							</div>
							<div class="col-4 mb-2">
								<label class="control-label">Correo electronico:</label>
    							<span class="input-group-text" id="addon-wrapping">{{$cliente->email}}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="fiscales" role="tabpanel" aria-labelledby="fiscales-tab">
				<iframe src="{{ route('clientes.dirfiscals.index',['cliente'=>$cliente]) }}" style="height: 650px!important;" id="fiscalesFrame"></iframe>
			</div>
			<div class="tab-pane fade" id="contactos" role="tabpanel" aria-labelledby="contactos-tab">
				<iframe src="{{ route('clientes.contactos.index',['cliente'=>$cliente]) }}" style="height: 650px!important;" id="contactosFrame"></iframe>
			</div>
			<div class="tab-pane fade" id="comerciales" role="tabpanel" aria-labelledby="comerciales-tab">
				<div class="card">
					<div class="card-header">
						<h4>Condiciones comerciales:</h4>
					</div>
					<div class="card-header">
						<h5>Datos de cobranza:</h5>
					</div>
					<div class="card-body">
						<div class="row">
							@isset ($cliente->cobranza)
								 <div class="col-4 mb-2">
									<label class="control-label">Nombre completo del contacto:</label>
	    							<span class="input-group-text" id="addon-wrapping">{{$cliente->cobranza->nombre}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Puesto:</label>
	    							<span class="input-group-text" id="addon-wrapping">{{$cliente->cobranza->puesto}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Telefono de cobro:</label>
	    							<span class="input-group-text" id="addon-wrapping">{{$cliente->cobranza->telefono_cobro}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Correo electronico:</label>
	    							<span class="input-group-text" id="addon-wrapping">{{$cliente->cobranza->correo}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Día de revision de factura:</label>
	    							<span class="input-group-text" id="addon-wrapping">{{$cliente->cobranza->dia_revision_factura}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Día de pago:</label>
	    							<span class="input-group-text" id="addon-wrapping">{{$cliente->cobranza->dia_pago}}</span>
								</div>  
							@endisset
							
							
						</div>
					</div>
					@isset ($cliente->banco)
					    <div class="card-header">
							<h5>Banco:</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-4 mb-2">
									<label class="control-label">Nombre del banco:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->nombre_b}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Plaza:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->plaza}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Sucursal:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->sucursal}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Número de Cuenta:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->cuenta}}</span>
								</div>
								@if ($cliente->tipo_cliente == "extranjero")
								<div class="col-4 mb-2">
									<label class="control-label">Número de Cuenta:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->cuenta}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">ABA:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->aba}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">SWIFT:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->swift}}</span>
								</div>
								@endif
								@if ($cliente->tipo_cliente == "nacional")
								<div class="col-4 mb-2">
									<label class="control-label">RFC del banco:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->rfc_banco}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">CLABE Interbancaria:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->clabe_inter}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Metodo de pago:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->metodo_pago}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Forma de pago:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->forma_pago}}</span>
								</div>
								<div class="col-4 mb-2">
									<label class="control-label">Uso del CFDI:</label>
									<span class="input-group-text" id="addon-wrapping">{{$cliente->banco->uso_cfdi}}</span>
								</div>
								@endif
							</div>
						</div>
					@endisset
					
				</div>
				{{-- <iframe src="#" id="comercialesFrame"></iframe> --}}
			</div>
			<div class="tab-pane fade" id="proyectos" role="tabpanel" aria-labelledby="proyectos-tab" >
				{{-- @component('cliente.proyecto.index',['cliente'=>$cliente]) --}}
				{{-- @endcomponent --}}
				<iframe src="{{ url('clientes/'.$cliente->id.'/cotizacion/index') }}" id="proyectosFrame" style="height: 650px!important;" onload="this.height = this.contentWindow.document.body.scrollHeight + 'px';"></iframe>
			</div>
			<div class="tab-pane fade" id="seguimiento" role="tabpanel" aria-labelledby="seguimiento-tab">
				{{-- <iframe src="{{ route('clientes.crms.index',['cliente'=>$cliente]) }}" style="height: 650px!important;" id="seguimientoFrame"></iframe> --}}
			</div>
			<div class="tab-pane fade" id="crm" role="tabpanel" aria-labelledby="crm-tab">
				<iframe src="{{ route('clientes.crms.index',['cliente'=>$cliente]) }}" style="height: 650px!important;" id="crmframe"></iframe>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	function changeHeight(id) {
		var iFrameID = document.getElementById(`${id}Frame`);
	    if(iFrameID) {
    		// here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
            // here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";

	    }   
	    // this.changeHeight(id);
	}
</script>
@endsection