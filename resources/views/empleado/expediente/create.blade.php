@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Expediente:</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ route('empleados.expediente.store',['empleado'=>$empleado]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row form-group">
					<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">Hoja Palco</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="hoja_palco" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">Identificación Oficial</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="identificacion" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">Comprobante de Domicilio</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="comprobante_domicilio" data-preview-file-type="text" required>
		    		</div>
		    	</div>
		    	<div class="row form-group">
					<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">CURP</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="curp" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">RFC</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="rfc" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">Acta de Nacimiento</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="acta_nacimiento" data-preview-file-type="text" required>
		    		</div>
		    	</div>
		    	<div class="row form-group">
					<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">IMSS</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="imss" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-4 col-xl-4 form-group text-center">
		    			<label class="control-label" for="">Contrato Firmado</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="contrato" data-preview-file-type="text" required>
		    		</div>
		    	</div>
				<div class="row form-group">
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