@extends('layouts.blank')
@section('content')
	<div class="card">
		<form method="POST" action="{{ $edit ? route('clientes.proyectos.update',['cliente'=>$cliente,'proyecto'=>$proyecto]) : route('clientes.proyectos.store',['cliente'=>$cliente]) }}">
			<div class="card-header">
				<h4>Proyecto:</h4>
			</div>
			<div class="card-body">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="row form-group">
					<div class="col-4">
						<label class="control-label">Nombre completo del responsable:</label>
						<input class="form-control" type="text" name="responsable" required="">
					</div>
					<div class="col-4">
						<label class="control-label">Número telefonico del responsable:</label>
						<input class="form-control" type="text" name="telefono" required="">
					</div>
					<div class="col-4">
						<label class="control-label">Correo electrónico del responsable:</label>
						<input class="form-control" type="email" name="correo" required="">
					</div>
				</div>
			</div>
			<div class="card-header">
				<h5>Productos:</h5>
			</div>
			<productos-component></productos-component>
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