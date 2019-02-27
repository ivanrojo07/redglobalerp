@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="card card-default">
		<div class="card-header">
			<h4>
				{{$edit ? "Editar" : "Nueva"}} credencial
			</h4>
		</div>
		<div class="card-body">
			@if ($errors->any())
				<div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>	
			@endif
			<form method="POST" action="{{$edit ? route('credencials.update',['credencial'=>$credencial]) : route('credencials.store') }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<div class="row form-group">
					<div class="col-6 mb-2">
						<label for="name">Razón social ó Nombre del cliente </label>
						<input class="form-control" type="text" name="name" id="name" value="{{$edit ? $credencial->name : old('name')}}" required="">
					</div>
					<div class="col-6 mb-2">
						<label for="email">Correo electrónico con el que se registra </label>
						<input class="form-control" type="email" name="email" id="email" value="{{$edit ? $credencial->email : old('email')}}" required="">
					</div>
					<div class="col-6 mb-2">
						<label for="name">Contraseña </label>
						<input class="form-control" type="text" name="password" id="password" @if (!$edit)
							required=""
						@endif>
					</div>
					<div class="col-6 mb-2">
						<label for="name">Confirmar la contraseña </label>
						<input class="form-control" type="text" name="password_confirmation" id="password_confirmation" @if (!$edit)
							required=""
						@endif>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-success">
						 	<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection