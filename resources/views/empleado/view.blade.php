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
			</form>
		</div>
	</div>
</div>
@endsection
