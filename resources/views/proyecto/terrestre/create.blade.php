@extends('layouts.blank')
@section('content')
	<div class="card border-dark">
		<div class="card-header">
			<h4>Servicio Terrestre para {{$proyecto->cliente->razon_social}}:</h4>
		</div>
		<div class="card-header">
			<h4>Servicio Terrestre:</h4>
		</div>
		<div class="card-body">
			@foreach ($proyecto->productos as $producto)
				<servterrestre-component :producto="{{json_encode(json_decode($producto),true)}}"></servterrestre-component>
			@endforeach
		</div>
		<div class="card-body">
            <div class="row form-group">
                <div class="col-4">
                    <label class="control label">
                        Aclaraciones:
                    </label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <div class="col-4">
                    <label class="control-label">
                        Notas del servicio:
                    </label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <div class="col-4">
                    <label class="control-label">
                        Notas aclaratorias:
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
	</div>
@endsection