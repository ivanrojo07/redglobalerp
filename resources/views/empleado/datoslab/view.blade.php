	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="fechacontratacion" class="control-label">* Fecha de contratación</label>
					<dd><strong> {{ $datoslab->fechacontratacion }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">* Tipo de contrato:</label>
					@if($datoslab->tipocontrato ==null)
					<dd><strong>NO DEFINIDO</strong></dd>
					@else
					<dd><strong>{{ $datoslab->tipocontrato->nombre }}</strong></dd>
					@endif
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						*Puesto:
					</label>
					@if($datoslab->tipopuesto==null)
					<dd><strong>NO DEFINIDO</strong></dd>
					@else
					<dd><strong>{{ $datoslab->tipopuesto->nombre }}</strong></dd>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						*Salario Nóminal:
					</label>
					<dd><strong>{{ $datoslab->salarionom }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						Salario Diario
					</label>
					<dd><strong>{{ $datoslab->salariodia }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						Periodicidad de pago:
					</label>
					<dd><strong>{{ $datoslab->periodopaga }}</strong></dd>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Prestaciones:
					</label>
					<dd><strong>{{ $datoslab->prestaciones }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Régimen de contratación:
					</label>
					<dd><strong>{{ $datoslab->regimen }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Hora de entrada:
					</label>
					<dd><strong>{{ $datoslab->hentrada }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Hora de salida:
					</label>
					<dd><strong>{{ $datoslab->hsalida }}</strong></dd>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Tiempo de comida:
					</label>
					<dd><strong>{{ $datoslab->hcomida }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Banco:
					</label>
					@if($datoslab->banco==null)
					<dd><strong>NO DEFINIDO</strong></dd>
					@else
					<dd><strong>{{ $datoslab->banco }}</strong></dd>
					@endif
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Cuenta:
					</label>
					<dd><strong>{{ $datoslab->cuenta }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						CLABE:
					</label>
					<dd><strong>{{ $datoslab->clabe }}</strong></dd>
				</div>
			</div>
		</div>
		@if ($datoslab->fechabaja)
			<div class="card-header">
				Datos de baja:
			</div>
			<div class="row mt-3">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="" class="control-label">
							Fecha de baja:
						</label>
						<dd><strong>{{ $datoslab->fechabaja }}</strong></dd>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="" class="control-label">
							Tipo de Baja:
						</label>
  						<dd><strong>{{$datoslab->tipobaja->nombre}}</strong></dd>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="" class="control-label">
							Comentarios:
						</label>
						<dd><strong>{{$datoslab->comentariobaja}}</strong></dd>
					</div>
				</div>
			</div>
		@else
			<div class="d-flex justify-content-center">
				<div class="offset-2 col-4">
					<a class="btn btn-info btn-md" href="{{ route('empleados.datoslaborales.edit',['empleado'=>$empleado,'datoslab'=>$datoslab]) }}">
						<strong>Editar</strong>
					</a>
				</div>
				<div class="col-4">
					<a class="btn btn-success btn-md" href="{{ route('empleados.datoslaborales.create',['empleado'=>$empleado]) }}">
						<strong>Nuevo</strong>
					</a>
				</div>
			</div>
		@endif
		
	</div>