@extends('layouts.blank')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4>Empleados</h4>
		</div>
		<div class="card-body">
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
						<label class="control-label" for="identificador">ID de empleado:</label>
						<dd>{{ $empleado->identificador}}</dd>

					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">Tipo de empleado:</label>
						<dd>{{$empleado->tipo}}</dd>

					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">Fecha de nacimiento:</label>
						<dd>{{$empleado->fnac}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{ $empleado->appaterno }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{ $empleado->apmaterno }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{ $empleado->nombre }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="rfc">*RFC:</label>
						<dd>{{ $empleado->rfc }}</dd>
					</div>
				</div>
				<div>
					<ul class="nav nav-tabs" id="empleadoTabs" role="tablist">
						<li class="nav-item"><a href="#generales" class="nav-link active" id="generalTab" data-toggle="tab" role="tab" aria-controls="generales" aria-selected="true">Generales</a></li>
						<li class="nav-item"><a href="#laborales" class="nav-link"  id="laboralTab" data-toggle="tab" role="tab" aria-controls="laborales" aria-selected="false">Laborales</a></li>
						<li class="nav-item"><a href="#estudios" class="nav-link" id="estudioTab" data-toggle="tab" role="tab" aria-controls="estudios" aria-selected="false">Estudios</a></li>
						<li class="nav-item"><a href="#emergencias" class="nav-link"  id="emergenciaTab" data-toggle="tab" role="tab" aria-controls="emergencias" aria-selected="false">Emergencias</a></li>
						<li class="nav-item"><a href="#vacaciones" class="nav-link" id="vacacionTab" data-toggle="tab" role="tab" aria-controls="vacaciones" aria-selected="false">Vacaciones</a></li>
						<li class="nav-item"><a href="#faltas" class="nav-link" id="faltasTab" data-toggle="tab" role="tab" aria-controls="faltas" aria-selected="false">Faltas</a></li>
						<li class="nav-item"><a href="#permisos" class="nav-link" id="permisosTab" data-toggle="tab" role="tab" aria-controls="permisos" aria-selected="false">Permisos</a></li>
						<li class="nav-item"><a href="#disciplinas" class="nav-link" id="disciplinasTab" data-toggle="tab" role="tab" aria-controls="disciplinas" aria-selected="false">Disciplina</a></li>
						<li class="nav-item" @if ($empleado->tipo != "Chofer") style="display: none;" @endif 
						<li class="nav-item" @if ( $empleado->tipo != "Chofer") style="display: none;" @endif id="licenciasT"><a href="#licencias" class="nav-link" id="licenciaTab" data-toggle="tab" role="tab" aria-controls="licencias" aria-selected="false">Licencia de manejo</a></li>
						<li class="nav-item" @if ($empleado->tipo != "Chofer") style="display: none;" @endif id="accidentesT"><a href="#accidentes" class="nav-link" id="licenciaTab" data-toggle="tab" role="tab" aria-controls="licencias" aria-selected="false">Accidente e incidencias</a></li>
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
											<dd>{{ $empleado->telefono }}</dd>
										</div>
										<div class="form-group col-sm-4">
											<label class="control-label" for="movil">Celular:</label>
											<dd>{{ $empleado->movil }}</dd>
										</div>
										<div class="form-group col-sm-4">
											<label class="control-label" for="email">Correo electrónico:</label>
											<dd>{{ $empleado->email }}</dd>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
											<dd>{{ $empleado->nss }}</dd>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="curp">C.U.R.P.:</label>
											<dd>{{ $empleado->curp }}</dd>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="infonavit">Número Infonavit:</label>
											<dd>{{ $empleado->infonavit }}</dd>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="cp">Código Postal:</label>
											<dd>{{ $empleado->cp }}</dd>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="calle">Calle:</label>
											<dd>{{ $empleado->calle }}</dd>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="numext">Número Exterior:</label>
											<dd>{{ $empleado->numext }}</dd>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="numint">Número Interior:</label>
											<dd>{{ $empleado->numint }}</dd>
										</div><div class="form-group col-sm-3">
											<label class="control-label" for="colonia">Colonia:</label>
											<dd>{{ $empleado->colonia }}</dd>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="municipio">Delegación/Municipio:</label>
											<dd>{{ $empleado->municipio }}</dd>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="estado">Estado:</label>
											<dd>{{ $empleado->estado }}</dd>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="calles">Entre calles:</label>
											<dd>{{ $empleado->calles }}</dd>
										</div><div class="form-group col-sm-3">
											<label class="control-label" for="referencia">Referencia:</label>
											<dd>{{ $empleado->referencia }}</dd>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 text-center">
											<a href="{{ route('empleados.edit',['empleado'=>$empleado]) }}" class="btn btn-success">
											 	<strong>Editar</strong>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="laborales" role="tabpanel" style="height: 650px!important;" aria-labelledby="laborales-tab">
							<iframe style="height: 650px!important;" id="laboralesframe" src="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						<div class="tab-pane fade" style="height: 650px!important;" id="estudios" role="tabpanel" aria-labelledby="estudios-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						<div class="tab-pane fade" id="emergencias" style="height: 650px!important;" role="tabpanel" aria-labelledby="emergencias-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						<div class="tab-pane fade" id="vacaciones" style="height: 650px!important;" role="tabpanel" aria-labelledby="vacaciones-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.vacacions.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						<div class="tab-pane fade" id="faltas" style="height: 650px!important;" role="tabpanel" aria-labelledby="faltas-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						<div class="tab-pane fade" id="permisos" style="height: 650px!important;" role="tabpanel" aria-labelledby="permisos-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.permisos.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						<div class="tab-pane fade" id="disciplinas" style="height: 650px!important;" role="tabpanel" aria-labelledby="disciplinas-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.disciplinas.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						{{-- MOSTRAR ADMINISTRATIVO SOLO SI ES ADMINISTRATIVO --}}
						@if ($empleado->tipo == "Chofer")
						<div class="tab-pane fade" id="licencias" style="height: 650px!important;" role="tabpanel" aria-labelledby="licencias-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.licencias.index',['empleados'=>$empleado]) }}"></iframe>
						</div>
						<div class="tab-pane fade" id="accidentes" style="height: 650px!important;" role="tabpanel" aria-labelledby="accidentes-tab">
							<iframe style="height: 650px!important;" src="{{ route('empleados.accidentes.index',['empleado'=>$empleado]) }}"></iframe>
						</div>
						@endif
					</div>
					
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
