@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>
				Datos Laborales:
			</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ $edit ? route('empleados.datoslaborales.update',['empleado'=>$empleado,'datoslaborale'=>$datoslaborale]) : route('empleados.datoslaborales.store',['empleado'=>$empleado]) }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="fechacontratacion" class="control-label">* Fecha de contratación</label>
							@if ($empleado->datosLab->first())
								{{-- expr --}}
								<input type="date" name="fechacontratacion" class="form-control" value="{{$empleado->datosLab->first()->fechacontratacion}}" required readonly>
							@else

								<input type="date" name="fechacontratacion" class="form-control" value="{{$datoslaborale->fechacontratacion}}" required {{$edit ? "readonly" : ""}}>
							@endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">* Tipo de contrato:</label>
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1" onclick='getContratos()'><i class="fas fa-sync-alt"></i></span>
							  </div>
		  						<select type="select" class="form-control" name="contrato_id" id="contrato_id" >
									<option  value="">Seleccione el tipo de contrato</option>
									@foreach ($contratos as $contrato)
										{{-- expr --}}
										<option id="{{$contrato->id}}" value="{{$contrato->id}}" @if ($datoslaborale->contrato_id == $contrato->id)
											{{-- expr --}}
											selected="selected" 
										@endif>{{$contrato->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">
								*Puesto:
							</label>
							<div class="input-group mb-3">
							  	<div class="input-group-prepend">
							    	<span class="input-group-text" id="basic-addon1" onclick='getPuestos()'><i class="fas fa-sync-alt"></i></span>
							  	</div>
		  						<select type="select" 
						        class="form-control" 
						        name="puesto_id" id="puesto_id"
						        >
								   	<option  value="">Sin Definir</option>
		 
									@foreach ($puestos as $puesto)
										{{-- expr --}}
										<option id="{{$puesto->id}}" 
											    value="{{$puesto->id}}" 
									@if ($datoslaborale->puesto_id == $puesto->id)
											{{-- expr --}}
											selected="selected" 
										@endif>{{$puesto->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">
								*Salario Nóminal:
							</label>
							<input class="form-control" type="number" name="salarionom" step="0.01" value="{{$datoslaborale->salarionom}}" required>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">
								Salario Diario
							</label>
							<input class="form-control" type="number" name="salariodia" step="0.01" value="{{$datoslaborale->salariodia}}">	
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">
								Periodicidad de pago:
							</label>
							<select type="select" class="form-control" name="periodopaga" id="periodopaga">
								<option id="1" value="Semanal" @if ($datoslaborale->periodopaga == "Semanal")
									selected="selected" 
								@endif>Semanal</option>
								<option id="2" value="Quincenal" @if ($datoslaborale->periodopaga == "Quincenal")
									selected="selected" 
								@endif>Quincenal</option>
								<option id="3" value="Mensual" @if ($datoslaborale->periodopaga == "Mensual")
									selected="selected" 
								@endif>Mensual</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								Prestaciones:
							</label>
							<select class="form-control" type="select" name="prestaciones" id="prestaciones">
								<option id="1" value="De Ley" @if ($datoslaborale->prestaciones == "De Ley")
									{{-- expr --}}
									selected="selected" 
								@endif>De Ley</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								Régimen de contratación:
							</label>
							<select class="form-control" type="select" name="regimen" id="regimen" value="{{ $datoslaborale->regimen }}">
								<option id="1" value="Sueldos y Salarios" @if ($datoslaborale->regimen == "Sueldos y Salarios")
									{{-- expr --}}
									selected="selected" 
								@endif>Sueldos y Salarios</option>
								<option id="2" value="Jubilados" @if ($datoslaborale->regimen == "Jubilados")
									{{-- expr --}}
									selected="selected" 
								@endif>Jubilados</option>
								<option id="3" value="Pensionados" @if ($datoslaborale->regimen == "Pensionados")
									{{-- expr --}}
									selected="selected" 
								@endif>Pensionados</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								Hora de entrada:
							</label>
							<input class="form-control" type="time" id="hentrada" name="hentrada" value="{{ $datoslaborale->hentrada }}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								Hora de salida:
							</label>
							<input class="form-control" type="time" id="hsalida" name="hsalida" value="{{ $datoslaborale->hsalida }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								Tiempo de comida:
							</label>
							<select class="form-control" type="select" name="hcomida" id="hcomida" value="{{ $datoslaborale->hcomida }}">
								<option id="1" value="0 min" @if ($datoslaborale->hcomida == "0 min")
									{{-- expr --}}
									selected="selected" 
								@endif>0 min.</option>
								<option id="2" value="30 min" @if ($datoslaborale->hcomida == "30 min")
									{{-- expr --}}
									selected="selected" 
								@endif>30 min.</option>
								<option id="3" value="45 min" @if ($datoslaborale->hcomida == "45 min")
									{{-- expr --}}
									selected="selected" 
								@endif>45 min.</option>
								<option id="4" value="60 min" @if ($datoslaborale->hcomida == "60 min")
									{{-- expr --}}
									selected="selected" 
								@endif>60 min.</option>
								<option id="5" value="1 hr 15 min" @if ($datoslaborale->hcomida == "1 hr 15 min")
									{{-- expr --}}
									selected="selected" 
								@endif>1 hr 15 min.</option>
								<option id="6" value="1 hr 30 min" @if ($datoslaborale->hcomida == "1 hr 30 min")
									{{-- expr --}}
									selected="selected" 
								@endif>1 hr 30 min.</option>
								<option id="7" value="2 hrs" @if ($datoslaborale->hcomida == "2 hrs")
									{{-- expr --}}
									selected="selected" 
								@endif>2 hrs.</option>
								<option id="8" value="2 hrs 30 min" @if ($datoslaborale->hcomida == "2 hrs 30 min")
									{{-- expr --}}
									selected="selected" 
								@endif>2 hrs 30 min.</option>
								<option id="9" value="3 hrs" @if ($datoslaborale->hcomida == "3 hrs")
									{{-- expr --}}
									selected="selected" 
								@endif>3 hrs.</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								Banco:
							</label>
							<input type="text" name="banco" class="form-control" value="{{ $datoslaborale->banco }}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								Cuenta:
							</label>
							<input class="form-control" type="text" id="cuenta" name="cuenta" value="{{ $datoslaborale->cuenta }}">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">
								CLABE:
							</label>
							<input class="form-control" type="clabe" name="clabe" id="clabe" value="{{ $datoslaborale->clabe }}">
						</div>
					</div>
				</div>
				<div class="card-header">
					Datos de baja:
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="" class="control-label">
								Fecha de baja:
							</label>
							<input class="form-control" type="date" id="fechabaja" name="fechabaja" value="{{ $datoslaborale->fechabaja }}">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="" class="control-label">
								Tipo de Baja:
							</label>
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1" onclick='getBajas()'><i class="fas fa-sync-alt"></i></span>
							  </div>
		  						<select type="select" class="form-control" name="tipobaja_id" id="tipobaja_id" >
									<option  value="">Sin Definir</option>
									@foreach ($bajas as $baja)
										{{-- expr --}}
										<option id="{{$baja->id}}" value="{{$baja->id}}" @if ($datoslaborale->tipobaja_id == $baja->id)
											{{-- expr --}}
											selected="selected" 
										@endif>{{$baja->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="" class="control-label">
								Comentarios:
							</label>
							<textarea class="form-control" id="comentariobaja" name="comentariobaja" maxlength="500">{{$datoslaborale->comentariobaja}}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-success">
						 	<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</form>
		</div>

	</div>
@endsection