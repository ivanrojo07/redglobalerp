@extends('layouts.blank')
@section('content')
<div>
	<div class="card">
		<div class="card-header">
			<h4>Beneficiario</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-3">
					<label class="control-label">
						Nombre:
					</label>
					<dd>{{$beneficiario->nombre}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Apellido Paterno:
					</label>
					<dd>{{$beneficiario->appaterno}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Apellido Materno:
					</label>
					<dd>{{$beneficiario->apmaterno}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Parentesco:
					</label>
					<dd>{{$beneficiario->parentesco}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						RFC:
					</label>
					<dd>{{$beneficiario->rfc}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Calle:
					</label>
					<dd>{{$beneficiario->calle}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Número exterior:
					</label>
					<dd>{{$beneficiario->num_ext}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Número interior:
					</label>
					<dd>{{$beneficiario->num_int}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Colonia:
					</label>
					<dd>{{$beneficiario->colonia}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Alcaldía o municipio:
					</label>
					<dd>{{$beneficiario->municipio}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Estado:
					</label>
					<dd>{{$beneficiario->estado}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Telefono:
					</label>
					<dd>{{$beneficiario->telefono}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Unidad medica
					</label>
					<dd>{{$beneficiario->unidad_medica}}</dd>
				</div>
				<div class="form-group col-3">
					<label class="control-label">
						Turno
					</label>
					<dd>{{$beneficiario->turno_atencion}}</dd>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<a href="{{ route('empleados.beneficiario.edit',['empleado'=>$empleado,'beneficiario'=>$beneficiario]) }}" class="btn btn-success">
					 	<strong>Editar</strong>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection