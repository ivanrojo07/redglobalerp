@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="card card-default">
		<div class="card-header">
			<div class="d-flex bd-highlight">
				<div class="p-2 w-75 bd-highlight">
					<h4 class="title">Credenciales</h4>
				</div>
				<div class="p-2 flex-shrink-1 bd-highlight">
					<a href="{{ route('credencials.create') }}" class="btn btn-info text-white">
						<i class="far fa-id-card"></i> Nueva Credencial
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Razón social/Nombre</th>
						<th scope="col">Correo electronico</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($credenciales as $credencial)
						<tr>
							<th scope="row">{{$credencial->id}}</th>
							<th>{{$credencial->name}}</th>
							<th>{{$credencial->email}}</th>
							<th>
								<div class="container btn-group">
									@if ($credencial->cliente)
										{{-- expr --}}
										<a href="{{ route('clientes.show',['cliente'=>$credencial->cliente]) }}" class="btn btn-primary"><i class="far fa-eye"></i> Ver cliente</a>
									@endif
										<a href="{{ route('credencials.edit',['credencial'=>$credencial]) }}" class="btn btn-success"><i class="fas fa-edit"></i> Editar / contraseña</a>
										<a href="#" onclick="deleteFunction('delete_{{$credencial->id}}')" class="btn btn-danger"><i class="fas fa-archive"></i> Archivar</a>
										<form method="POST" id="delete_{{$credencial->id}}" action="{{ route('credencials.destroy',['credencial'=>$credencial]) }}" style="display: none;">
											@csrf
											@method('DELETE')
										</form>
								</div>
							</th>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="d-flex justify-content-center">
				{{ $credenciales->links() }}
			</div>
		</div>
	</div>
</div>
@endsection