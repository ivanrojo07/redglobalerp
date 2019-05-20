@extends('layouts.blank')
@section('content')
	<div class="card">
		<form method="POST" action="{{ url('prospectos/'.$cotizacion->id.'/update') }}">
			@csrf
			<div class="card-header">
				<h4>Solicitud de cotización: <span class="badge badge-secondary"><i class="fas fa-asterisk"></i> Campos obligatorios</span></h4>
			</div>
			<div class="card-body">
				@csrf
				<div class="form-row">
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Nombre completo del responsable:</label>
						<input class="form-control" type="text" name="responsable" required="" value="{{ $cotizacion->responsable }}">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Razon social:</label>
						<input class="form-control" type="text" name="razon_social" required="" value="{{ $cotizacion->prospecto->razon_social }}" readonly="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Número telefonico del responsable:</label>
						<input class="form-control" type="text" name="telefono" required="" value="{{ $cotizacion->telefono }}">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Número de celular del responsable:</label>
						<input class="form-control" type="text" name="celular" required="" value="{{ $cotizacion->prospecto->celular }}">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Correo electrónico del responsable:</label>
						<input class="form-control" type="email" name="correo" required="" value="{{ $cotizacion->correo }}">
					</div>
				</div>
			</div>
			
			<mercancias-component></mercancias-component>
			<div class="d-flex justify-content-center mb-3">
				<button type="submit" class="btn btn-success btn-lg" >>
					<strong>
						<i class="far fa-save"></i>
						Guardar
					</strong>
				</Button>
			</div>
		</form>
	</div>
@endsection