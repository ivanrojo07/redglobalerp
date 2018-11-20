@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Estudios:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="col-4">
					<label class="control-label" for="escolaridad1" id="lbl_escolaridad1">Escolaridad 1:</label>
					<dd>{{$estudio->escolaridad1}}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="institucion1" id="lbl_inst1">Institución:</label>
					<dd>{{ $estudio->institucion1 }}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="cedula1" id="lbl_cedula">Número de Cédula:</label>
					<dd>{{ $estudio->cedula1 }}</dd>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-4">
					<label class="control-label" for="escolaridad2" id="lbl_escolaridad2">Escolaridad 2:</label>
					<dd>{{$estudio->escolaridad2}}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="institucion2" id="lbl_inst2">Institución:</label>
					<dd>{{ $estudio->institucion2 }}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="cedula2" id="lbl_cedula">Número de Cédula:</label>
					<dd>{{ $estudio->cedula2 }}</dd>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-3">
					<label class="control-label" for="idioma1" id="lbl_idioma">Idioma:</label>
					<dd>{{$estudio->idioma1}}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="nivel1" id="lbl_nivel">Nivel:</label>
					<dd>{{$estudio->nivel1}}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="idioma2" id="lbl_idioma">Idioma:</label>
					<dd>{{$estudio->idioma2}}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="nivel2" id="lbl_nivel">Nivel:</label>
					<dd>{{$estudio->nivel2}}</dd>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-3">
					<label class="control-label" for="idioma3" id="lbl_idioma">Idioma:</label>
					<dd>{{$estudio->idioma3}}</dd>
				</div>
				<div class="col-3">
					<label class="control-label" for="nivel3" id="lbl_nivel">Nivel:</label>
					<dd>{{$estudio->nivel3}}</dd>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-4">
					<label class="control-label" for="curso1" id="lbl_curso">Curso:</label>
					<dd>{{ $estudio->curso1 }}</dd>
					<label class="control-label">¿Certificación?</label>
					<dd>{{$estudio->certificado1 ? "SI" : "NO"}}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="curso1" id="lbl_curso">Curso:</label>
					<dd>{{ $estudio->curso2 }}</dd>
					<label class="control-label">¿Certificación?</label>
					<dd>{{$estudio->certificado2 ? "SI" : "NO"}}</dd>
				</div>
				<div class="col-4">
					<label class="control-label" for="curso1" id="lbl_curso">Curso:</label>
					<dd>{{ $estudio->curso3 }}</dd>
					<label class="control-label">¿Certificación?</label>
					<dd>{{$estudio->certificado3 ? "SI" : "NO"}}</dd>
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<div class="offset-2 col-4">
					<a class="btn btn-info btn-md" href="{{ route('empleados.estudios.edit',['empleado'=>$empleado,'estudio'=>$estudio]) }}">
						<strong>Editar</strong>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection