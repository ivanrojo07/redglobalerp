@extends('layouts.blank')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4>Empleados</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ $edit ? route('empleados.update',['empleado'=>$empleado]) : route('empleados.store') }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<input type="hidden" id="consecutivo" name="" value="{{ $numero }}">
				<div class="row">
					<div class="col-sm-4">
						<h5>Datos del Empleado:</h5>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('empleados.index') }}"><strong>Lista de Empleados</strong></a>
					</div>
				</div>
				<div class="row mt-3">
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">*ID de empleado:(Automático)</label>
						@if($edit)
						<dd>{{ $empleado->identificador}}</dd>
						@else
						<input class="form-control" id="identificador" type="text" name="identificador" readonly autofocus>
						@endif
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">*Tipo de empleado:</label>
						<select type="select" class="form-control" name="tipo" id="tipo" required>
							<option value="">Seleccione</option>
							<option value="Administrativo" {{ ($edit && $empleado->tipo == "Administrativo") ? "selected" :'' }}>Administrativo</option>
							<option value="Chofer" {{($edit && $empleado->tipo == "Chofer") ? "selected" :'' }}>Chofer</option>
						</select>

					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">*Fecha de nacimiento:</label>
						<input type="date" name="fnac" class="form-control" value="{{$empleado->fnac}}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="appaterno">*Apellido Paterno:</label>
						<input type="text" class="form-control" id="appaterno" name="appaterno" required="required" value="{{ $empleado->appaterno }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="apmaterno">*Apellido Materno:</label>
						<input type="text" id="apmaterno" class="form-control" name="apmaterno" required="required" value="{{ $empleado->apmaterno }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">*Nombre(s):</label>
						<input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{ $empleado->nombre }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="rfc">*RFC:</label>
						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc }}" required="">
					</div>
				</div>
				<div>
					<ul class="nav nav-tabs">
						<li class="nav-item"><a href="#" class="nav-link active">Generales</a></li>
						<li class="nav-item"><a href="#" class="nav-link ">Laborales</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Estudios</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Emergencias</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Vacaciones</a></li>
						<li class="nav-item" style="display: none;" id="admin"><a href="#" class="nav-link">Administrativo</a></li>
						<li class="nav-item" style="display: none;" id="chofer"><a href="#" class="nav-link">Licencia de manejo</a></li>
					</ul>
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-sm-4">
									<h5>Datos Generales:</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="form-group col-sm-4">
									<label class="control-label" for="telefono">Teléfono:</label>
									<input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
								</div>
								<div class="form-group col-sm-4">
									<label class="control-label" for="movil">Celular:</label>
									<input type="text" class="form-control" name="movil" id="movil" value="{{ $empleado->movil }}">
								</div>
								<div class="form-group col-sm-4">
									<label class="control-label" for="email"><i class="fa fa-asterisk" aria-hidden="true"></i>Correo electrónico:</label>
									<input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}" required="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-3">
									<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
									<input type="text" class="form-control" name="nss" id="nss" value="{{ $empleado->nss }}">
								</div>
								<div class="form-group col-sm-3">
									<label class="control-label" for="curp">C.U.R.P.:</label>
									<input type="text" class="form-control" name="curp" id="curp" value="{{ $empleado->curp }}">
								</div>
								<div class="form-group col-sm-3">
									<label class="control-label" for="infonavit">Número Infonavit:</label>
									<input type="text" class="form-control" name="infonavit" id="infonavit" value="{{ $empleado->infonavit }}">
								</div>
								<div class="form-group col-sm-3">
									<label class="control-label" for="cp">Código Postal:</label>
									<input type="text" class="form-control" name="cp" id="cp" value="{{ $empleado->cp }}">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-3">
									<label class="control-label" for="calle">Calle:</label>
									<input type="text" class="form-control" name="calle" id="calle" value="{{ $empleado->calle }}">
								</div>
								<div class="form-group col-sm-3">
									<label class="control-label" for="numext">Número Exterior:</label>
									<input type="text" class="form-control" name="numext" id="numext" value="{{ $empleado->numext }}">
								</div>
								<div class="form-group col-sm-3">
									<label class="control-label" for="numint">Número Interior:</label>
									<input type="text" class="form-control" name="numint" id="numint" value="{{ $empleado->numint }}">
								</div><div class="form-group col-sm-3">
									<label class="control-label" for="colonia">Colonia:</label>
									<input type="text" class="form-control" name="colonia" id="colonia" value="{{ $empleado->colonia }}">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-3">
									<label class="control-label" for="municipio">Delegación/Municipio:</label>
									<input type="text" class="form-control" name="municipio" id="municipio" value="{{ $empleado->municipio }}">
								</div>
								<div class="form-group col-sm-3">
									<label class="control-label" for="estado">Estado:</label>
									<input type="text" class="form-control" name="estado" id="estado" value="{{ $empleado->estado }}">
								</div>
								<div class="form-group col-sm-3">
									<label class="control-label" for="calles">Entre calles:</label>
									<input type="text" class="form-control" name="calles" id="calles" placeholder="calle y calle" value="{{ $empleado->calles }}">
								</div><div class="form-group col-sm-3">
									<label class="control-label" for="referencia">Referencia:</label>
									<input type="text" class="form-control" name="referencia" id="referencia" value="{{ $empleado->referencia }}">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 text-center">
									<button type="submit" class="btn btn-success">
									 	<strong>Guardar</strong>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<div class="row">
                <div class="col-sm-12 text-right">
                    <h4><small><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small> Campos Requeridos</small></small></h4>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
@section('script')
	<script type="text/javascript">
		$('#tipo').change(function(e){
			$("#admin").hide();
			$("#chofer").hide();
			var empleado = $("#tipo").val();
			if(empleado === "Administrativo"){
				$("#admin").show();
			}
			if(empleado === "Chofer"){
				$("#chofer").show();
			}
		});
	</script>
@endsection