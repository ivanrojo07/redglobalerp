@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Emergencia:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="col-4">
					<label class="control-label" for="sangre" id="sangre">Tipo de Sangre:</label>
					<dd>{{$emergencia->sangre}}</dd>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-4">
					<label class="control-label" for="enfermedades" id="lbl_enf">Enfermedades:</label>
					<dd>{{ $emergencia->enfermedades }}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="alergias" id="lbl_alerg">Alergias:</label>
					<dd>{{ $emergencia->alergias }}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="operaciones" id="lbl_oper">Operaciones:</label>
					<dd>{{ $emergencia->operaciones }}</dd>
				</div>
			</div>
			<div class="row card-header">
				<h5>En caso de emergencia llamar a:</h5>
			</div>
			<div class="row mt-3 form-group">
				<div class="col-3">
					<label class="control-label" for="nombrecontac1">Nombre:</label>
					<dd>{{ $emergencia->nombrecontac1 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="parentescocontac1">Parentesco:</label>
					<dd>{{ $emergencia->parentescocontac1 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="telefonocontac1">Télefono:</label>
					<dd>{{ $emergencia->telefonocontac1 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="movilcontac1">Telefono celular:</label>
					<dd>{{ $emergencia->movilcontac1 }}</dd>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-3">
					<label class="control-label" for="nombrecontac2">Nombre:</label>
					<dd>{{ $emergencia->nombrecontac2 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="parentescocontac2">Parentesco:</label>
					<dd>{{ $emergencia->parentescocontac2 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="telefonocontac2">Télefono:</label>
					<dd>{{ $emergencia->telefonocontac2 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="movilcontac2">Telefono celular:</label>
					<dd>{{ $emergencia->movilcontac2 }}</dd>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-3">
					<label class="control-label" for="nombrecontac3">Nombre:</label>
					<dd>{{ $emergencia->nombrecontac3 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="parentescocontac3">Parentesco:</label>
					<dd>{{ $emergencia->parentescocontac3 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="telefonocontac3">Télefono:</label>
					<dd>{{ $emergencia->telefonocontac3 }}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="movilcontac3">Telefono celular:</label>
					<dd>{{ $emergencia->movilcontac3 }}</dd>
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<div class="offset-2 col-4">
					<a class="btn btn-info btn-md" href="{{ route('empleados.emergencias.edit',['empleado'=>$empleado,'emergencia'=>$emergencia]) }}">
						<strong>Editar</strong>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection