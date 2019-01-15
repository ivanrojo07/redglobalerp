@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Contactos</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ route('clientes.contactos.create',['cliente'=>$cliente]) }}" class="btn btn-success"><i class="fas fa-folder-plus"></i> <strong>Nuevo contacto</strong></a>
				</div>
			</div>
			<div class="row form-group">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<td>Nombre</td>
						<td>Area</td>
						<td>Puesto</td>
						<td>Telefonos</td>
						<td>Correos</td>
						<td>Acción</td>
					</thead>
					<tbody>
						@forelse ($cliente->contactos as $contacto)
							<tr>
								<td>
									{{$contacto->nombre." ".$contacto->appat." ".$contacto->apmat}}
								</td>
								<td>
									{{$contacto->area}}
								</td>
								<td>
									{{$contacto->puesto}}
								</td>
								<td>
									<p>
										Oficina: {{$contacto->telofi.($contacto->ext ? ' ext: '.$contacto->ext : "" )}}
									</p>
									@if ($contacto->telefono)
										<p>
											Otro: {{$contacto->telefono}}
										</p>
									@endif
									@if ($contacto->celular)
										<p>
											Celular: {{$contacto->celular}}
										</p>
									@endif
								</td>
								<td>
									<p>
										Oficina: {{$contacto->correoofi}}
									</p>

									@if ($contacto->correo)
										<p>
											Otro: {{$contacto->correo}}
										</p>
									@endif
								</td>
								<td>
									<div class="d-flex justify-content-around">
										<a class="btn btn-success btn-sm ml-2" href="{{ route('clientes.contactos.show',['cliente'=>$cliente,'contacto'=>$contacto]) }}">
											<i class="fa fa-eye" aria-hidden="true"></i><strong>Ver</strong>
										</a>
										<a class="btn btn-info btn-sm ml-2" href="{{ route('clientes.contactos.edit',['cliente'=>$cliente,'contacto'=>$contacto]) }}">
											<i class="fas fa-edit"></i><strong>Editar</strong>
										</a>
										<form method="POST" id="eliminar{{$contacto->id}}" action="{{ route('clientes.contactos.destroy',['cliente'=>$cliente,'contacto'=>$contacto]) }}">
											@csrf
											@method('DELETE')
											<a class="btn btn-danger btn-sm ml-2" onclick="confirmar('eliminar{{$contacto->id}}')" type="submit">
											<i class="fas fa-trash-alt"></i><strong>Eliminar</strong>
										</a>
										</form>
									</div>
								</td>
							</tr>
						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron registros del cliente.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		function confirmar(id) {
			// body...
			swal({
			  title: "¿Desea eliminar este registro?",
			  text: "¡Una vez eliminado, usted no podra recuperar esta información!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    $(`#${id}`).submit();
			  } else {
			    swal("Cancelado");
			  }
			});
		}
	</script>
@endsection