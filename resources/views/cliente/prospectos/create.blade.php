@extends('layouts.blank')
@section('content')
	<div class="card">
		<form method="POST" action="{{ route('prospectos.store') }}">
			@csrf
			<div class="card-header">
				<h4>Solicitud de cotización: <span class="badge badge-secondary"><i class="fas fa-asterisk"></i> Campos obligatorios</span></h4>
			</div>
			<div class="card-body">
				@csrf
				<div class="form-row">
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Nombre completo del responsable:</label>
						<input class="form-control" type="text" name="responsable" required="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Razon social:</label>
						<input class="form-control" type="text" name="razon_social" required="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Número telefonico del responsable:</label>
						<input class="form-control" type="text" name="telefono" required="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Número de celular del responsable:</label>
						<input class="form-control" type="text" name="celular" required="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Correo electrónico del responsable:</label>
						<input class="form-control" type="email" name="correo" required="">
					</div>
					<div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Tipo de servicio:
                        </label>
                        <select class="form-control" id="tipo_servicio" name="tipo_servicio" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Terrestre FTL">Terrestre FTL</option>
                            <option value="Terrestre LTL">Terrestre LTL</option>
                            <option value="Maritimo FCL">Maritimo FCL</option>
                            <option value="Maritimo LCL">Maritimo LCL</option>
                            <option value="Aereo">Aereo</option>
                            <option value="Ferroviario">Ferroviario</option>
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Material peligroso <input type="checkbox" id="Peligroso">
                        </h4>
                    </div>
                    <div class="col-4 form-group" id="clase_peligrosa" style="display: none">
                        <label><i class="fas fa-asterisk"></i> Clase</label>
                        <input type="number" class="form-control" name="peligroso_clase" max="9" min="1"></input>
                    </div>
                    <div class="col-4 form-group" id="nu_peligroso" style="display: none">
                        <label><i class="fas fa-asterisk"></i> NU</label>
                        <input type="text" class="form-control" name="peligroso_nu">
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Dirección de origen
                        </h4>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Linea 1</label>
                        <textarea rows="1" type="text" class="form-control" name="linea1_origen" required=""></textarea>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Código Postal</label>
                        <input type="text" class="form-control" name="cp_origen" required="">
                    </div>

                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Dirección de destino
                        </h4>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Linea 1</label>
                        <textarea rows="1" type="text" class="form-control" name="linea1_destino" required=""></textarea>
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> Código Postal</label>
                        <input type="text" class="form-control" name="cp_destino" required="">
                    </div>

                    <div class="col-4 form-group">
                        <label><i class="fas fa-asterisk"></i> eta</label>
                        <input type="date" class="form-control" name="eta" required="">
                    </div>
                    <div class="col-4 form-group">
                        <label><i class="fas fa-question-circle"></i>Requiere despacho aduanal</label>
                        <input type="checkbox" id="despacho_aduanal" name="despacho_aduanal">
                    </div>
                    <div class="col-4 form-group" id="estibable"  style="display: none">
                        <label><i class="fas fa-question-circle"></i>¿Es estibable?</label>
                        <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" id="inlineCheckboxSI" name="es_estibable" value="1">
						  <label class="form-check-label" for="inlineCheckboxSI">Si</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" id="inlineCheckboxNO" name="es_estibable" value="0">
						  <label class="form-check-label" for="inlineCheckboxNO">No</label>
						</div>
                    </div>
				</div>
			</div>
			
			<mercancias-component></mercancias-component>
			<servicios-component></servicios-component>
			<div class="d-flex justify-content-center mb-3">
				<button type="submit" class="btn btn-success btn-lg" >
					<strong>
						<i class="far fa-save"></i>
						Guardar
					</strong>
				</Button>
			</div>
		</form>
	</div>
@endsection