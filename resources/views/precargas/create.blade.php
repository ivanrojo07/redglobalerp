@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="card">
		<form role="form" method="POST" action="{{ route($guardar) }}">
			{{ csrf_field() }}
			<div class="card-header">
				<h4>
					Nuevo {{$titulo}} 
				</h4>
			</div>
			<div class="card-body">
				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<label class="control-label" for="nombre">* Nombre de {{$titulo}}:</label>
  					<input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>
				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<label class="control-label" for="descripcion">Descripción:</label>
  					<input type="text" class="form-control" id="descripcion" name="descripcion">
				</div>
			</div>
			<div class="card-footer">
				<div class="row justify-content-end">
					<div class="col-5">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
                    </div>
                    <div class="col-2">
                        <h4><small><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small> Campos Requeridos</small></small></h4>
                    </div>
				</div>
				
			</div>	
		</form>
	</div>
@endsection