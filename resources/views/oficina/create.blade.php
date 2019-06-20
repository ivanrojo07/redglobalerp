@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Oficina:</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ $edit ? route('oficinas.update',['oficina'=>$oficina]) : route('oficinas.store') }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="razon_social">Razón Social:</label>
						<input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ $oficina->razon_social }}" required>
					</div>
					<div class="col-3">
						<label class="control-label" for="alias" id="lbl_inst1">Alias:</label>
						<input type="text" class="form-control" id="alias" name="alias" value="{{$oficina->alias }}" required="">
					</div>
					<div class="col-3">
						<label class="control-label" for="rfc">RFC:</label>
						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $oficina->rfc }}" required>
					</div>
					<div class="col-3">
						<label class="control-label">Calle:</label>
						<input type="text" class="form-control" id="calle" name="calle" value="{{$oficina->calle }}" required="">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="num_ext">Número exterior:</label>
						<input type="text" class="form-control" id="num_ext" name="num_ext" value="{{$oficina->num_ext }}" required="">
					</div>
					<div class="col-3">
						<label class="control-label" for="num_int">Número interior:</label>
						<input type="text" class="form-control" id="num_int" name="num_int" value="{{ $oficina->num_int }}">
					</div>
					<div class="col-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $oficina->colonia }}" required>
					</div>
					<div class="col-3">
						<label class="control-label" for="cp">Código Postal:</label>
						<input type="text" class="form-control" id="cp" name="cp" value="{{ $oficina->cp }}" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="alcaldia">Alcaldia:</label>
						<input type="text" class="form-control" id="alcaldia" name="alcaldia" value="{{ $oficina->alcaldia }}" required>
					</div>
					<div class="col-3">
						<label class="control-label" for="ciudad">Ciudad:</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $oficina->ciudad }}" required>
					</div>
					<div class="col-3">
						<label class="control-label" for="estado">Estado:</label>
						<input type="text" class="form-control" id="estado" name="estado" value="{{ $oficina->estado }}" required>
					</div>
					<div class="col-3">
						<label class="control-label" for="responsable">Responsable:</label>
						<input type="text" class="form-control" id="responsable" name="responsable" value="{{ $oficina->responsable }}" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-3">
						<label class="control-label" for="representante_legal">Representante Legal:</label>
						<input type="text" class="form-control" id="representante_legal" name="representante_legal" value="{{ $oficina->representante_legal }}" required>
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
