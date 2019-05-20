@extends('layouts.blank')
@section('content')
	<div class="card">
		<form method="POST" action="">
			@csrf
			<div class="card-header">
				<h4>Datos del responsable:</h4>
			</div>
			<div class="card-body">
				@csrf
				<div class="row mt-3">
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">Folio:</label>
						@isset ($cotizacion->folio_consecutivo)
					    	<dd>{{ $cotizacion->folio_consecutivo}}</dd>
						@endisset
						@empty ($cotizacion->folio_consecutivo)
						    <dd>{{ $cotizacion->id}}</dd>
						@endempty
						
					</div>
					
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">Nombre completo del responsable:</label>
						<dd>{{ $cotizacion->responsable}}</dd>
					</div>
					
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador"> Número telefonico del responsable:</label>
						<dd>{{ $cotizacion->telefono}}</dd>
					</div>
					
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Correo electrónico del responsable</label>
						<dd>{{ $cotizacion->correo}}</dd>
					</div>
				</div>
			</div>
	</div>
	<div class="card-header">
		<h4>Mercancias</h4>
	</div>	
	<div class="card-body">
		@foreach ($cotizacion->mercancias as $clave=>$valor)
			 	<h4><span class="badge badge-secondary">Datos generales de la mercancia</span></h4>
			 	<div class="row mt-3">
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Mercancia:</label>
						<dd>{{ $valor->id}}</dd>					
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Naturaleza :</label>
						<dd>{{ $valor->naturaleza}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Servicio :</label>
						<dd>{{ $valor->tipo_servicio}}</dd>	
					</div>

			 	</div>
			 	@if ($valor->peligroso_clase || $valor->peligroso_nu)
				 	<h4><span class="badge badge-secondary">Clasificado como material peligroso</span></h4>
				 	<div class="row mt-3">
				 		@isset ($valor->peligroso_clase)
					 		<div class="form-group col-sm-3">
								<label class="control-label" for="identificador">  Clase :</label>
								<dd>{{ $valor->peligroso_clase}}</dd>	
							</div>
				 		@endisset
				 		
						@isset ($valor->peligroso_nu)
							<div class="form-group col-sm-3">
								<label class="control-label" for="identificador">  
								NU :</label>
								<dd>{{ $valor->peligroso_nu}}</dd>	
							</div>  
						@endisset
						
				 	</div>
			 	@endif
			 	

			 	<h4><span class="badge badge-secondary">Datos de origen</span></h4>
			 	<div class="row mt-3">
			 		<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Linea de origen :</label>
						<dd>{{ $valor->line1_origen}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  
						Codigo Postal de origen :</label>
						<dd>{{ $valor->cp_origen}}</dd>	
					</div>
			 	</div>

			 	<h4><span class="badge badge-secondary">Datos de destino</span></h4>
			 	<div class="row mt-3">
			 		<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Linea de destino :</label>
						<dd>{{ $valor->line1_destino}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Codigo Postal de destino :</label>
						<dd>{{ $valor->cp_destino}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">eta :</label>
						<dd>{{$valor->eta}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">Requiere despacho aduanal :</label>
						@if ($valor->despacho_aduanal)
							<dd>si</dd>
						@else
							<dd>no</dd>
						@endif
					</div>
			 	</div>

			 	<h4><span class="badge badge-secondary">Dimensiones y peso de la mercancia</span></h4>
			 	<div class="row mt-3">
			 		<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Alto :</label>
						<dd>{{ $valor->alto}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Ancho :</label>
						<dd>{{ $valor->ancho}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Profundo :</label>
						<dd>{{ $valor->profundo}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Medidas :</label>
						<dd>{{ $valor->medidas}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Peso bruto :</label>
						<dd>{{ $valor->peso_br}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Bultos :</label>
						<dd>{{ $valor->peso_total}}</dd>	
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Volumen total :</label>
						<dd>{{ $valor->volumen_total}}</dd>	
					</div>
					
			 	</div>

			 	<h4><span class="badge badge-secondary">Observaciones</span></h4>
			 	<div class="row mt-3">
			 		<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">  Observaciones :</label>
						<dd>{{ $valor->observaciones}}</dd>	
					</div>
			 	</div>
			 	<hr style="border:solid black 1px">
		@endforeach
	</div>
			
			
		</form>
	</div>
@endsection