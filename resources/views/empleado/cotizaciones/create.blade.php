@extends('layouts.blank')
@section('content')
	<div class="card">
		<form method="POST" action="{{ url('/cotizaciones/store')  }}">
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
						<label class="control-label"><i class="fas fa-asterisk"></i> Número telefonico del responsable:</label>
						<input class="form-control" type="text" name="telefono" required="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Correo electrónico del responsable:</label>
						<input class="form-control" type="email" name="correo" required="">
					</div>
				</div>
				<div class="col-12 mb-2">
                    <h4 class="title">
                        Material peligroso <input type="checkbox" id="Peligroso">
                    </h4>
                </div>
			</div>
			
			<mercancias-component></mercancias-component>
			<div class="d-flex justify-content-center mb-3">
				<button type="submit" class="btn btn-success btn-lg">
					<strong>
						<i class="far fa-save"></i>
						Guardar
					</strong>
				</Button>
			</div>
		</form>
	</div>
@endsection
@section('script')
	<script>
		$(document).ready(function() {
        //set initial state.
        //$('#textbox1').val($(this).is(':checked'));

        $('#Peligroso').change(function() {
            if(this.checked) {
                //alert('checked');
                $('#clase_peligrosa').show();
                $('#nu_peligroso').show();
            }
            else{
                $('#clase_peligrosa').hide();
                $('#nu_peligroso').hide();
            }
            //$('#textbox1').val($(this).is(':checked'));        
        });
    });
	</script>
@endsection