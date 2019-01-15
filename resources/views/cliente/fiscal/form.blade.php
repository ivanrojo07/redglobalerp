@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			{{$edit ? 'Editar dirección fiscal' : 'Nueva dirección fiscal'}}
		</div>
		<div class="card-body">
			<form method="POST" action="{{ $edit ? route('clientes.dirfiscals.update',['cliente'=>$cliente,'dirfiscal'=>$dirfiscal]) : route('clientes.dirfiscals.store',['cliente'=>$cliente]) }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="row form-group">
					<div class="col-4 mb-2">
						<label for="nombre" class="control-label">Nombre</label>
						<input type="text" name="nombre" class="form-control" value="{{$dirfiscal->nombre}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="calle" class="control-label">Calle</label>
						<input type="text" name="calle" class="form-control" value="{{$dirfiscal->calle}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="numext" class="control-label">Número exterior</label>
						<input type="text" name="numext" class="form-control" value="{{$dirfiscal->numext}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="numint" class="control-label">Número interior</label>
						<input type="text" name="numint" class="form-control" value="{{$dirfiscal->numint}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="cp" class="control-label">Código Postal</label>
						<input type="text" name="cp" class="form-control" value="{{$dirfiscal->cp}}" pattern="[0-9]{5,5}" title="Agregue un código postal de 5 digitos" required>
					</div>
					<div class="col-4 mb-2">
						<label for="colonia" class="control-label">Colonia</label>
						<input type="text" name="colonia" class="form-control" value="{{$dirfiscal->colonia}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="municipio" class="control-label">Alcaldía o municipio</label>
						<input type="text" name="municipio" class="form-control" value="{{$dirfiscal->municipio}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="ciudad" class="control-label">Ciudad</label>
						<input type="text" name="ciudad" class="form-control" value="{{$dirfiscal->ciudad}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="estado" class="control-label">Estado</label>
						<input type="text" name="estado" class="form-control" value="{{$dirfiscal->estado}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="calle1" class="control-label">Entre calle</label>
						<input type="text" name="calle1" class="form-control" value="{{$dirfiscal->calle1}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="calle2" class="control-label">Y calle</label>
						<input type="text" name="calle2" class="form-control" value="{{$dirfiscal->calle2}}" required>
					</div>
					<div class="col-4 mb-2">
						<label for="referencia" class="control-label">Referencia adicional</label>
						<input type="text" name="referencia" class="form-control" value="{{$dirfiscal->referencia}}" required>
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