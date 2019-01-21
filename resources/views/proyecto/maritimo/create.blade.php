@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Servicio Maritimo para  {{$proyecto->cliente->razon_social}}:</h4>
		</div>
		<form>
			<div class="card-header">
				<h5>Servicio Maritimo:</h5>

			</div>
			<div class="card-body">
				@foreach ($proyecto->productos as $producto)
					<servmaritimo-component :producto="{{json_encode(json_decode($producto),true)}}"></servmaritimo-component>
				@endforeach
			</div>
			<div class="card-body">
	            <div class="row form-group">
	                <div class="col-4">
	                    <label class="control label">
	                        No incluyen:
	                    </label>
	                    <textarea class="form-control" rows="3"></textarea>
	                </div>
	                <div class="col-4">
	                    <label class="control-label">
	                        Condiciones:
	                    </label>
	                    <textarea class="form-control" rows="3"></textarea>
	                </div>
	                <div class="col-4">
	                    <label class="control-label">
	                        Observaciones antes de embarcar:
	                    </label>
	                    <textarea class="form-control" rows="3"></textarea>
	                </div>
	            </div>
	        </div>
	        <div class="card-footer">
	            <div class="row form-group justify-content-center">
	                <button type="submit" class="btn btn-success btn-lg">
	                    <strong>
	                        <i class="far fa-save"></i> 
	                        Guardar
	                    </strong>
	                </Button>
	            </div>
	        </div>
		</form>
	</div>
@endsection