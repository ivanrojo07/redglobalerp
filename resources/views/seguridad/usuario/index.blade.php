@extends('layouts.blank')
@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				<div class="row">
                    <div class="col-sm-4">
                        <h4>Usuarios:</h4>
                    </div>
                    @foreach(Auth::user()->perfil->componentes as $componente)
                    @if($componente->nombre == 'crear usuario')
                    <div class="col-sm-4 text-center">
                        <a class="btn btn-success" href="{{ route('usuario.create') }}"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Usuario</strong></a>
                    </div>
                    @endif
                    @endforeach
                </div>
			</div>
			<div class="card-body">
				<div class="row">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr class="info">
								<th scope="col">Perfil</th>
								<th scope="col">Nombre</th>
								<th scope="col">Correo</th>
								<th scope="col">RFC</th>
								<th scope="col">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@if($usuarios->last()->perfil->nombre == 'Admin')
	                        	<div class="alert alert-danger" role="alert">
								  No sé encontraron registros
								</div>
	                        @else
							@foreach ($usuarios as $usuario)
								<tr>
									<td scope="row">{{ $usuario->perfil->nombre }}</td>
									<td>
										{{ $usuario->empleado->nombre . ' ' . $usuario->empleado->appaterno . ' ' . $usuario->empleado->apmaterno }}
									</td>
									<td>
										{{ $usuario->email }}
									</td>
									<td>
										{{ $usuario->empleado->rfc }}
									</td>
									<td>
										<div class="d-flex justify-content-center">

											@foreach(Auth::user()->perfil->componentes as $componente)
											{{-- Boton ver usuario --}}
                                        	@if($componente->nombre == 'ver usuario')
											<a href="{{ route('usuario.show', ['id' => $usuario->id]) }}" class="btn btn-primary btn-sm mr-3">Ver</a>
											@endif
											{{-- Editar Usuario --}}
                                        	@if($componente->nombre == 'editar usuario')
											<a href="{{ route('usuario.edit', ['id' => $usuario->id]) }}" class="btn btn-info btn-sm mr-3">Editar</a>
											 @endif
											 {{-- Eliminar usuario --}}
                                        	@if($componente->nombre == 'eliminar usuario')
                                        	<form method="post" action="{{ route('usuario.destroy', ['id' => $usuario->id]) }}" style="">
                                        		{{ csrf_field() }}
												<button type="submit"  class="btn btn-danger btn-sm mr-3">Eliminar</button>
                                        	</form>
											@endif
                                        	@endforeach
										</div>
									</td>
								</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection