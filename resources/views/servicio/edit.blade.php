@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="card">
		<form role="form" method="POST" action="{{ route($actualizar,['familia'=>$servicio]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT"><div class="card">
			<div class="card-header">
				<h4>
					Editar {{$titulo}}
				</h4>
			</div>
			<div class="card-body row">
				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label class="control-label" for="nombre">* Nombre de {{$titulo}}:</label>
  					<input type="text" class="form-control" id="nombre" name="nombre" value="{{$servicio->nombre}}" required>
				</div>
				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label class="control-label" for="nombre">* Tipo de {{$titulo}}:</label>
  					<select id="tipo_servicio" name="tipo_servicio" class="form-control" required>
  						<option value="">Seleccione una opción</option>
  						<option value="Terrestre FTL" {{$servicio->tipo_servicio == "Terrestre FTL" ? "selected" : "" }}>Terrestre FTL</option>
  						<option value="Terrestre LTL" {{$servicio->tipo_servicio == "Terrestre LTL" ? "selected" : "" }}>Terrestre LTL</option>
  						<option value="Maritimo FCL" {{$servicio->tipo_servicio == "Maritimo FCL" ? "selected" : "" }}>Maritimo FCL</option>
  						<option value="Maritimo LCL" {{$servicio->tipo_servicio == "Maritimo LCL" ? "selected" : "" }}>Maritimo LCL</option>
  						<option value="Aereo" {{$servicio->tipo_servicio == "Aereo" ? "selected" : "" }}>Aereo</option>
  					</select>
				</div>
				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label class="control-label" for="descripcion">Descripción:</label>
  					<textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{$servicio->descripcion}}</textarea>
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