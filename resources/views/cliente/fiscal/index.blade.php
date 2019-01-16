@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Direcciones fiscales</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ route('clientes.dirfiscals.create',['cliente'=>$cliente]) }}" class="btn btn-success"><i class="fas fa-folder-plus"></i> <strong>Nueva dirección</strong></a>
				</div>
			</div>
			<div class="row form-group">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<td>Nombre</td>
						<td>Dirección</td>
						<td>Acción</td>
					</thead>
					<tbody>
						@forelse ($cliente->dirFiscales as $fiscal)
							<tr>
								<td>
									{{$fiscal->nombre}}
								</td>
								<td>
									{{'Calle: '.$fiscal->calle.', número exterior: '.$fiscal->numext.($fiscal->numint ? ', int: '.$fiscal->numint : '').', Población: '.$fiscal->colonia.', Alcaldía o Municipio: '.$fiscal->municipio.', Ciudad: '.$fiscal->ciudad.', Estado: '.$fiscal->estado}}
								</td>
								<td>
									<div class="d-flex justify-content-around">
										<a class="btn btn-success btn-sm ml-2" href="{{ route('clientes.dirfiscals.show',['cliente'=>$cliente,'dirfiscal'=>$fiscal]) }}">
											<i class="fa fa-eye" aria-hidden="true"></i><strong>Ver</strong>
										</a>
										<a class="btn btn-info btn-sm ml-2" href="{{ route('clientes.dirfiscals.edit',['cliente'=>$cliente,'dirfiscal'=>$fiscal]) }}">
											<i class="fas fa-edit"></i><strong>Editar</strong>
										</a>
										<form method="POST" id="eliminar{{$fiscal->id}}" action="{{ route('clientes.dirfiscals.destroy',['cliente'=>$cliente,'dirfiscal'=>$fiscal]) }}">
											@csrf
											@method('DELETE')
											<a class="btn btn-danger btn-sm ml-2" onclick="confirmar('eliminar{{$fiscal->id}}')" type="submit">
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