@extends('layouts.blank')
@section('content')
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
							<option value="AyudanteG" {{ ($edit && $empleado->tipo == "AyudanteG") ? "selected" :'' }}>Ayudantes Generales</option>
							<option value="Operador" {{($edit && $empleado->tipo == "Operador") ? "selected" :'' }}>Operadores</option>
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
						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc }}" minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres" style="text-transform:uppercase">
					</div>
				</div>
				<div>
					<ul class="nav nav-tabs" id="empleadoTabs" role="tablist">
						<li class="nav-item"><a href="#generales" class="nav-link active" id="generalTab" data-toggle="tab" role="tab" aria-controls="generales" aria-selected="true">Generales</a></li>
						<li class="nav-item"><a href="#beneficiario" class="nav-link {{$edit ? '' : 'disabled'}}"  id="beneficiarioTab" data-toggle="tab" role="tab" aria-controls="beneficiario" aria-selected="false">Beneficiario</a></li>
						<li class="nav-item"><a href="#laborales" class="nav-link {{$edit ? '' : 'disabled'}}"  id="laboralTab" data-toggle="tab" role="tab" aria-controls="laborales" aria-selected="false">Laborales</a></li>
						<li class="nav-item"><a href="#estudios" class="nav-link {{$edit ? '' : 'disabled'}}" id="estudioTab" data-toggle="tab" role="tab" aria-controls="estudios" aria-selected="false">Estudios</a></li>
						<li class="nav-item"><a href="#emergencias" class="nav-link {{$edit ? '' : 'disabled'}}"  id="emergenciaTab" data-toggle="tab" role="tab" aria-controls="emergencias" aria-selected="false">Emergencias</a></li>
						<li class="nav-item"><a href="#vacaciones" class="nav-link {{$edit ? '' : 'disabled'}}" id="vacacionTab" data-toggle="tab" role="tab" aria-controls="vacaciones" aria-selected="false">Vacaciones</a></li>
						<li class="nav-item"><a href="#faltas" class="nav-link {{$edit ? '' : 'disabled'}}" id="faltasTab" data-toggle="tab" role="tab" aria-controls="faltas" aria-selected="false">Faltas</a></li>
						<li class="nav-item"><a href="#permisos" class="nav-link {{$edit ? '' : 'disabled'}}" id="permisosTab" data-toggle="tab" role="tab" aria-controls="permisos" aria-selected="false">Permisos</a></li>
						<li class="nav-item"><a href="#disciplinas" class="nav-link {{$edit ? '' : 'disabled'}}" id="disciplinasTab" data-toggle="tab" role="tab" aria-controls="disciplinas" aria-selected="false">Disciplina</a></li>
						<li class="nav-item" @if ($edit && $empleado->tipo != "Chofer") style="display: none;" @endif id="licenciasT"><a href="#licencias" class="nav-link {{$edit ? '' : 'disabled'}}" id="licenciaTab" data-toggle="tab" role="tab" aria-controls="licencias" aria-selected="false">Licencia de manejo</a></li>
						<li class="nav-item" @if ($edit && $empleado->tipo != "Chofer") style="display: none;" @endif id="accidentesT"><a href="#accidentes" class="nav-link {{$edit ? '' : 'disabled'}}" id="licenciaTab" data-toggle="tab" role="tab" aria-controls="licencias" aria-selected="false">Accidente e incidencias</a></li>
					</ul>
					<div class="tab-content" id="empleadoTabContent">
						<div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
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
											<label class="control-label" for="nacionalidad">Nacionalidad:</label>
											<select name="nacionalidad" class="form-control" id="nacionalidad">
												<option value="">Seleccione la nacionalidad</option>
												<option value="Mexicana" {{ ($edit && $empleado->nacionalidad == "Mexicana") ? "selected" :'' }}>Mexicana</option>
												<option value="Extranjera" {{ ($edit && $empleado->nacionalidad == "Extranjera") ? "selected" :'' }}>Extranjera</option>
											</select>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="edo_civil">Estado civil:</label>
											<select name="edo_civil" class="form-control" id="edo_civil">
												<option value="">Seleccione el estado civil</option>
												<option value="Soltero" {{ ($edit && $empleado->edo_civil == "Soltero") ? "selected" :'' }}>Soltero/a</option>
												<option value="Comprometido" {{ ($edit && $empleado->edo_civil == "Comprometido") ? "selected" :'' }}>Comprometido/a</option>
												<option value="Casado" {{ ($edit && $empleado->edo_civil == "Casado") ? "selected" :'' }}>Casado/a</option>
												<option value="Divorciado" {{ ($edit && $empleado->edo_civil == "Divorciado") ? "selected" :'' }}>Divorciado/a</option>
												<option value="Viudo" {{ ($edit && $empleado->edo_civil == "Viudo") ? "selected" :'' }}>Viudo/a</option>
											</select>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="padre">Nombre completo del padre:</label>
											<input type="text" class="form-control" name="padre" id="padre" value="{{ $empleado->padre }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="madre">Nombre completo de la madre:</label>
											<input type="text" class="form-control" name="madre" id="madre" value="{{ $empleado->madre }}">
										</div>
										
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="conyugue">Nombre completo del conyugue <br> (en caso de tenerlo):</label>
											<input type="text" class="form-control" name="conyugue" id="conyugue" value="{{ $empleado->conyugue }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="dependientes">Número de dependientes económicos:</label>
											<input type="number" min="0" step="1" class="form-control" name="dependientes" id="dependientes" value="{{ $empleado->dependientes }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="ref_pers">Nombre completo de la referencia personal:</label>
											<input type="text" class="form-control" name="ref_pers" id="ref_pers" value="{{ $empleado->ref_pers }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="tel_ref_pers">Teléfono de la referencia personal:</label>
											<input type="text" class="form-control" name="tel_ref_pers" id="tel_ref_pers" value="{{ $empleado->tel_ref_pers }}">
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
						<div class="tab-pane fade" id="beneficiario" role="tabpanel" style="height: 650px!important;" aria-labelledby="beneficiario-tab">
							<iframe style="height: 650px!important;" id="laboralesframe" src="{{ $edit ? route('empleados.beneficiario.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="laborales" role="tabpanel" style="height: 650px!important;" aria-labelledby="laborales-tab">
							<iframe style="height: 650px!important;" id="laboralesframe" src="{{ $edit ? route('empleados.datoslaborales.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" style="height: 650px!important;" id="estudios" role="tabpanel" aria-labelledby="estudios-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.estudios.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="emergencias" style="height: 650px!important;" role="tabpanel" aria-labelledby="emergencias-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.emergencias.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="vacaciones" style="height: 650px!important;" role="tabpanel" aria-labelledby="vacaciones-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.vacacions.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="faltas" style="height: 650px!important;" role="tabpanel" aria-labelledby="faltas-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.faltas.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="permisos" style="height: 650px!important;" role="tabpanel" aria-labelledby="permisos-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.permisos.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="disciplinas" style="height: 650px!important;" role="tabpanel" aria-labelledby="disciplinas-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.disciplinas.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						{{-- MOSTRAR CHOFER SOLO SI ES CHOFER --}}
						@if ($edit && $empleado->tipo == "Chofer")
						<div class="tab-pane fade" id="licencias" style="height: 650px!important;" role="tabpanel" aria-labelledby="licencias-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route("empleados.licencias.index",['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="accidentes" style="height: 650px!important;" role="tabpanel" aria-labelledby="accidentes-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.accidentes.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						@endif
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
@endsection
@section('script')
	<script type="text/javascript">
		$('#tipo').change(function(e){
			$("#licenciasT").hide();
			$("#accidentesT").hide();
			var empleado = $("#tipo").val();
			if(empleado === "Operador"){
				$("#licenciasT").show();
				$("#accidentesT").show();
			}
		});	
		document.getElementById("laboralesframe").width();
		document.getElementById("laboralesframe").height();

	</script>
@endsection