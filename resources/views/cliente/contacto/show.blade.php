@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>{{$contacto->nombre." ".$contacto->appat." ".$contacto->apmat}}</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="col-4 mb-2">
					<label for="nombre" class="control-label">Nombre</label>
					<label class="form-control">{{$contacto->nombre}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="appat" class="control-label">Apellido Paterno</label>
					<label class="form-control">{{$contacto->appat}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="apmat" class="control-label">Apellido Materno</label>
					<label class="form-control">{{$contacto->apmat}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="area" class="control-label">Area</label>
					<label class="form-control">{{$contacto->area}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="puesto" class="control-label">Puesto</label>
					<label class="form-control">{{$contacto->puesto}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="telofi" class="control-label">Telefono de oficina</label>
					<label class="form-control">{{$contacto->telofi}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="ext" class="control-label">Extensión</label>
					<label class="form-control">{{$contacto->ext}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="correoofi" class="control-label">Correo de oficina</label>
					<label class="form-control">{{$contacto->correoofi}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="telefono" class="control-label">Telefono de contacto</label>
					<label class="form-control">{{$contacto->telefono}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="correo" class="control-label">Correo de contacto</label>
					<label class="form-control">{{$contacto->correo}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="celular" class="control-label">Telefono celular</label>
					<label class="form-control">{{$contacto->celular}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="observaciones" class="control-label">Observaciones</label>
					<label class="form-control">{{$contacto->observaciones}}</label>
				</div>
			</div>
			<div class="row form-group justify-content-center">
				<a href="{{ route('clientes.contactos.edit',['cliente'=>$cliente,'contacto'=>$contacto]) }}" class="btn btn-success btn-lg">
					<strong>
						<i class="fas fa-edit"></i>
						Editar
					</strong>
				</a>
			</div>
		</div>
	</div>
@endsection