@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>{{$dirfiscal->nombre}}</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="col-4 mb-2">
					<label for="nombre" class="control-label">Nombre</label>
					<label class="form-control">{{$dirfiscal->nombre}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="calle" class="control-label">Calle</label>
					<label class="form-control">{{$dirfiscal->calle}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="numext" class="control-label">Número exterior</label>
					<label class="form-control">{{$dirfiscal->numext}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="numint" class="control-label">Número interior</label>
					<label class="form-control">{{$dirfiscal->numint}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="cp" class="control-label">Código Postal</label>
					<label class="form-control">{{$dirfiscal->cp}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="colonia" class="control-label">Colonia</label>
					<label class="form-control">{{$dirfiscal->colonia}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="municipio" class="control-label">Alcaldía o municipio</label>
					<label class="form-control">{{$dirfiscal->municipio}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="ciudad" class="control-label">Ciudad</label>
					<label class="form-control">{{$dirfiscal->ciudad}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="estado" class="control-label">Estado</label>
					<label class="form-control">{{$dirfiscal->estado}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="calle1" class="control-label">Entre calle</label>
					<label class="form-control">{{$dirfiscal->calle1}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="calle2" class="control-label">Y calle</label>
					<label class="form-control">{{$dirfiscal->calle2}}</label>
				</div>
				<div class="col-4 mb-2">
					<label for="referencia" class="control-label">Referencia adicional</label>
					<label class="form-control">{{$dirfiscal->referencia}}</label>
				</div>
			</div>
			<div class="row form-group justify-content-center">
				<a href="{{ route('clientes.dirfiscals.edit',['cliente'=>$cliente,'dirfiscal'=>$dirfiscal]) }}" class="btn btn-success btn-lg">
					<strong>
						<i class="fas fa-edit"></i>
						Editar
					</strong>
				</a>
			</div>
		</div>
	</div>
@endsection