@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Estudios:</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ $edit ? route('empleados.estudios.update',['empleado'=>$empleado,'estudio'=>$estudio]) : route('empleados.estudios.store',['empleado'=>$empleado]) }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">Escolaridad 1:</label>
						<select type="select" name="escolaridad1" class="form-control" id="escolaridad1"
						 required>
							<option value="">Seleccionar</option>
							<option id="1" value="Primaria" @if ($estudio->escolaridad1 == "Primaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Primaria</option>
							<option id="2" value="Secundaria" @if ($estudio->escolaridad1 == "Secundaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Secundaria</option>
	    					<option id="3" value="Preparatoria" @if ($estudio->escolaridad1 == "Preparatoria")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Preparatoria</option>
	    					<option id="4" value="Carrera" @if ($estudio->escolaridad1 == "Carrera")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Carrera</option>
							<option id="5" value="Maestría" @if ($estudio->escolaridad1 == "Maestría")
								{{-- expr --}}
								selected="selected" 
							@endif>Maestría</option>
	    					<option id="6" value="Doctorado" @if ($estudio->escolaridad1 == "Doctorado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Doctorado</option>
	    					<option id="7" value="Diplomado" @if ($estudio->escolaridad1 == "Diplomado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Diplomado</option>
						</select>
					</div>
					<div class="col-4">
						<label class="control-label" for="institucion1" id="lbl_inst1">Institución:</label>
						<input type="text" class="form-control" id="institucion1" name="institucion1" value="{{$estudio->institucion1 }}">
					</div>
					<div class="col-4">
						<label class="control-label" for="cedula1" id="lbl_cedula">Número de Cédula:</label>
						<input type="text" class="form-control" id="cedula1" name="cedula1" value="{{ $estudio->cedula1 }}" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">Escolaridad 2:</label>
						<select type="select" name="escolaridad2" class="form-control" id="escolaridad2"
						 required>
							<option value="">Seleccionar</option>
							<option id="1" value="Primaria" @if ($estudio->escolaridad2 == "Primaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Primaria</option>
							<option id="2" value="Secundaria" @if ($estudio->escolaridad2 == "Secundaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Secundaria</option>
	    					<option id="3" value="Preparatoria" @if ($estudio->escolaridad2 == "Preparatoria")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Preparatoria</option>
	    					<option id="4" value="Carrera" @if ($estudio->escolaridad2 == "Carrera")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Carrera</option>
							<option id="5" value="Maestría" @if ($estudio->escolaridad2 == "Maestría")
								{{-- expr --}}
								selected="selected" 
							@endif>Maestría</option>
	    					<option id="6" value="Doctorado" @if ($estudio->escolaridad2 == "Doctorado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Doctorado</option>
	    					<option id="7" value="Diplomado" @if ($estudio->escolaridad2 == "Diplomado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Diplomado</option>
						</select>
					</div>
					<div class="col-4">
						<label class="control-label" for="institucion2" id="lbl_inst1">Institución:</label>
						<input type="text" class="form-control" id="institucion2" name="institucion2" value="{{$estudio->institucion2 }}">
					</div>
					<div class="col-4">
						<label class="control-label" for="cedula2" id="lbl_cedula">Número de Cédula:</label>
						<input type="text" class="form-control" id="cedula2" name="cedula2" value="{{ $estudio->cedula2 }}" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="idioma1" id="lbl_idioma">Idioma:</label>
						<select type="select" name="idioma1" class="form-control" id="idioma1">
							<option value="">Seleccionar</option>
							<option id="1" value="Inglés" @if ($estudio->idioma1 == "Inglés")
								{{-- expr --}}
								selected="selected" 
							@endif>Inglés</option>
							<option id="2" value="Frances" @if ($estudio->idioma1 == "Frances")
								{{-- expr --}}
								selected="selected" 
							@endif>Frances</option>
	    					<option id="3" value="Portugues" @if ($estudio->idioma1 == "Portugues")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Portugues</option>
	    					<option id="4" value="Aleman" @if ($estudio->idioma1 == "Aleman")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Aleman</option>
							<option id="5" value="Italiano" @if ($estudio->idioma1 == "Italiano")
								{{-- expr --}}
								selected="selected" 
							@endif>Italiano</option>
	    					<option id="6" value="Chino" @if ($estudio->idioma1 == "Chino")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Chino</option>
	    					<option id="7" value="Japones" @if ($estudio->idioma1 == "Japones")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Japones</option>
	    					<option id="8" value="Otro" @if ($estudio->idioma1 == "Otro")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Otro</option>
						</select>
					</div>
					<div class="col-3">
						<label class="control-label" for="nivel1" id="lbl_nivel">Nivel:</label>
						<select type="select" name="nivel1" class="form-control" id="nivel1">
							<option value="">Seleccionar</option>
							<option id="1" value="Básico" @if ($estudio->nivel1 == "Básico")
								{{-- expr --}}
								selected="selected" 
							@endif>Básico</option>
							<option id="2" value="Medio" @if ($estudio->nivel1 == "Medio")
								{{-- expr --}}
								selected="selected" 
							@endif>Medio</option>
	    					<option id="3" value="Alto" @if ($estudio->nivel1 == "Alto")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Alto</option>
						</select>
					</div>
					<div class="col-3">
						<label class="control-label" for="idioma2" id="lbl_idioma">Idioma:</label>
						<select type="select" name="idioma2" class="form-control" id="idioma2">
							<option value="">Seleccionar</option>
							<option id="1" value="Inglés" @if ($estudio->idioma2 == "Inglés")
								{{-- expr --}}
								selected="selected" 
							@endif>Inglés</option>
							<option id="2" value="Frances" @if ($estudio->idioma2 == "Frances")
								{{-- expr --}}
								selected="selected" 
							@endif>Frances</option>
	    					<option id="3" value="Portugues" @if ($estudio->idioma2 == "Portugues")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Portugues</option>
	    					<option id="4" value="Aleman" @if ($estudio->idioma2 == "Aleman")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Aleman</option>
							<option id="5" value="Italiano" @if ($estudio->idioma2 == "Italiano")
								{{-- expr --}}
								selected="selected" 
							@endif>Italiano</option>
	    					<option id="6" value="Chino" @if ($estudio->idioma2 == "Chino")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Chino</option>
	    					<option id="7" value="Japones" @if ($estudio->idioma2 == "Japones")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Japones</option>
	    					<option id="8" value="Otro" @if ($estudio->idioma1 == "Otro")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Otro</option>
						</select>
					</div>
					<div class="col-3">
						<label class="control-label" for="nivel2" id="lbl_nivel">Nivel:</label>
						<select type="select" name="nivel2" class="form-control" id="nivel2">
							<option value="">Seleccionar</option>
							<option id="1" value="Básico" @if ($estudio->nivel2 == "Básico")
								{{-- expr --}}
								selected="selected" 
							@endif>Básico</option>
							<option id="2" value="Medio" @if ($estudio->nivel2 == "Medio")
								{{-- expr --}}
								selected="selected" 
							@endif>Medio</option>
	    					<option id="3" value="Alto" @if ($estudio->nivel2 == "Alto")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Alto</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="idioma3" id="lbl_idioma">Idioma:</label>
						<select type="select" name="idioma3" class="form-control" id="idioma3">
							<option value="">Seleccionar</option>
							<option id="1" value="Inglés" @if ($estudio->idioma3 == "Inglés")
								{{-- expr --}}
								selected="selected" 
							@endif>Inglés</option>
							<option id="2" value="Frances" @if ($estudio->idioma3 == "Frances")
								{{-- expr --}}
								selected="selected" 
							@endif>Frances</option>
	    					<option id="3" value="Portugues" @if ($estudio->idioma3 == "Portugues")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Portugues</option>
	    					<option id="4" value="Aleman" @if ($estudio->idioma3 == "Aleman")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Aleman</option>
							<option id="5" value="Italiano" @if ($estudio->idioma3 == "Italiano")
								{{-- expr --}}
								selected="selected" 
							@endif>Italiano</option>
	    					<option id="6" value="Chino" @if ($estudio->idioma3 == "Chino")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Chino</option>
	    					<option id="7" value="Japones" @if ($estudio->idioma3 == "Japones")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Japones</option>
	    					<option id="8" value="Otro" @if ($estudio->idioma3 == "Otro")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Otro</option>
						</select>
					</div>
					<div class="col-3">
						<label class="control-label" for="nivel3" id="lbl_nivel">Nivel:</label>
						<select type="select" name="nivel3" class="form-control" id="nivel3">
							<option value="">Seleccionar</option>
							<option id="1" value="Básico" @if ($estudio->nivel3 == "Básico")
								{{-- expr --}}
								selected="selected" 
							@endif>Básico</option>
							<option id="2" value="Medio" @if ($estudio->nivel3 == "Medio")
								{{-- expr --}}
								selected="selected" 
							@endif>Medio</option>
	    					<option id="3" value="Alto" @if ($estudio->nivel3 == "Alto")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Alto</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label" for="curso1" id="lbl_curso">Curso:</label>
						<input type="text" class="form-control" id="id_curso1" name="curso1" value="{{ $estudio->curso1 }}">
						
						<label class="mt-2 switch">
							<input type="checkbox" name="certificado1" @if ($estudio->certificado1 == 1)checked="checked"@endif> 
							 <span class="slider round"></span>
						</label>
						<label>¿Certificación?</label>
					</div>
					<div class="col-4">
						<label class="control-label" for="curso2" id="lbl_curso">Curso:</label>
						<input type="text" class="form-control" id="id_curso2" name="curso2" value="{{ $estudio->curso2 }}">
						
						<label class="mt-2 switch">
							<input type="checkbox" name="certificado2" @if ($estudio->certificado2 == 1)checked="checked"@endif> 
							 <span class="slider round"></span>
						</label>
						<label>¿Certificación?</label>
					</div>
					<div class="col-4">
						<label class="control-label" for="curso3" id="lbl_curso">Curso:</label>
						<input type="text" class="form-control" id="id_curso3" name="curso3" value="{{ $estudio->curso3 }}">
						
						<label class="mt-2 switch">
							<input type="checkbox" name="certificado3" @if ($estudio->certificado3 == 1)checked="checked"@endif> 
							 <span class="slider round"></span>
						</label>
						<label>¿Certificación?</label>
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
