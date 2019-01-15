@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			{{$edit ? 'Editar contacto' : 'Nuevo contacto'}}
		</div>
		<div class="card-body">
			<form method="POST" action="{{ $edit ? route('clientes.contactos.update',['cliente'=>$cliente,'contacto'=>$contacto]) : route('clientes.contactos.store',['cliente'=>$cliente]) }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="row form-group">
					<div class="col-4 mb-2">
						<label for="nombre" class="control-label">Nombre</label>
						<input type="text" name="nombre" class="form-control" value="{{$contacto->nombre}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="appat" class="control-label">Apellido Paterno</label>
						<input type="text" name="appat" class="form-control" value="{{$contacto->appat}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="apmat" class="control-label">Apellido Materno</label>
						<input type="text" name="apmat" class="form-control" value="{{$contacto->apmat}}">
					</div>
					<div class="col-4 mb-2">
						<label for="area" class="control-label">Area</label>
						<input type="text" name="area" class="form-control" value="{{$contacto->area}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="puesto" class="control-label">Puesto</label>
						<input type="text" name="puesto" class="form-control" value="{{$contacto->puesto}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="telofi" class="control-label">Telefono de oficina</label>
						<input type="text" name="telofi" class="form-control" value="{{$contacto->telofi}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="ext" class="control-label">Extensión</label>
						<input type="text" name="ext" class="form-control" value="{{$contacto->ext}}">
					</div>
					<div class="col-4 mb-2">
						<label for="correoofi" class="control-label">Correo de oficina</label>
						<input type="email" name="correoofi" class="form-control" value="{{$contacto->correoofi}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="telefono" class="control-label">Telefono de contacto</label>
						<input type="text" name="telefono" class="form-control" value="{{$contacto->telefono}}">
					</div>
					<div class="col-4 mb-2">
						<label for="correo" class="control-label">Correo de contacto</label>
						<input type="email" name="correo" class="form-control" value="{{$contacto->correo}}">
					</div>
					<div class="col-4 mb-2">
						<label for="celular" class="control-label">Telefono celular</label>
						<input type="text" name="celular" class="form-control" value="{{$contacto->celular}}">
					</div>
					<div class="col-4 mb-2">
						<label for="observaciones" class="control-label">Observaciones</label>
						<textarea name="observaciones" class="form-control">{{$contacto->observaciones}}</textarea>
					</div>
				</div>
				<div class="row form-group justify-content-center">
					<button type="submit" class="btn btn-success btn-lg">
						<strong>
							<i class="far fa-save"></i> 
							Guardar
						</strong>
					</Button>
				</div>
			</form>
		</div>
	</div>
@endsection