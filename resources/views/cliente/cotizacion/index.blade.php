@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<form id="buscarempleado" action="busqueda"
	onKeypress="if(event.keyCode == 13) event.returnValue = false;">
			<!-- {{ csrf_field() }} -->
				<div class="row">
					<div class="col mt-3">
						<h4>Cotizaciones @isset ($prospecto)
							de {{$prospecto->razon_social}}
						    
						@endisset</h4>
						
					</div>
					<div class="col mt-3">
						<div class="input-group mb-3">
							<input type="text" list='browsers' id="empleado" name="query" class="form-control" placeholder="Buscar..." autofocus>
							<div class="input-group-append">
							    <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
							  </div>
						</div>
					</div>
					<div class="col mt-3">
						@isset ($cliente)
							<div class="col-sm-3">
								 <a class="btn btn-info" href="{{ url('clientes/'.$cliente->id.'/cotizacion/create') }}">							        
								   Agregar Cotizacion
								</a>
							</div>   
						@endisset
						@isset ($prospecto)
						    <div class="col-sm-3">
								 <a class="btn btn-info" href="{{ url('prospectos/'.$prospecto->id.'/addCotizacion') }}">							        
								   Agregar Cotizacion
								</a>
							</div>   
						@endisset
						
					</div>
				</div>
			</form>
		</div>
		<div class="card-body">
			<div id="datos" name="datos" class="container">
				<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
					<thead>
						<tr class="info">
							<th>Folio</th>							
							<th>Nombre</th>
							<th>Responsable</th>
							<th>Telefono</th>
							<th>Correo</th>
							<th>Acciones</th>	
						</tr>
					</thead>
					@foreach ($cotizaciones as $cotizacion)
						{{-- expr --}}
						<tr class="active"
						    title="Has Click Aquì para Ver"
							style="cursor: pointer"
							href="#{{$cotizacion->id}}"
							>
							<td>
								@if ($cotizacion->folio_consecutivo)
									{{$cotizacion->folio_consecutivo}}
								@else
									{{$cotizacion->id}}
								@endif
							</td>
							@isset ($cotizacion->cliente)
								<td>{{$cotizacion->cliente->razon_social}}</td>
							@endisset
							@isset ($prospecto)
								<td>{{$prospecto->razon_social}}</td>				    
							@endisset							
							<td>{{$cotizacion->responsable}}</td>
							<td>{{$cotizacion->telefono}}</td>
							<td>{{$cotizacion->correo}}</td>
							<td>
								@isset ($cotizacion->cliente)
									<a class="btn btn-success btn-sm" href="{{ url('clientes/'.$cliente->id.'/'.$cotizacion->id.'/cotizacion/show') }}"/><i class="fa fa-eye" aria-hidden="true"></i> 
									<strong>Ver</strong>	</a>
									<a class="btn btn-warning btn-sm" href="{{ url('clientes/'.$cliente->id.'/'.$cotizacion->id.'/edit') }}"/><i class="fas fa-edit" aria-hidden="true"></i> 
									<strong>Editar</strong></a>
								@endisset
								@isset ($prospecto)
									<a class="btn btn-success btn-sm" href="{{ url('prospectos/'.$prospecto->id.'/'.$cotizacion->id.'/show') }}"/><i class="fa fa-eye" aria-hidden="true"></i> 
									<strong>Ver</strong></a>
									<a class="btn btn-warning btn-sm" href="{{ url('prospectos/'.$prospecto->id.'/'.$cotizacion->id.'/edit') }}"/><i class="fas fa-edit" aria-hidden="true"></i> 
									<strong>Editar</strong></a>

								@endisset	
							</td>							
							
								{{-- <a class="btn btn-success btn-sm" href="{{ route('empleados.show',['empleado'=>$empleado]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
							<strong>Ver</strong>	</a>
								<a class="btn btn-info btn-sm" href="{{ route('empleados.edit',['empleado'=>$empleado]) }}">
									<i class="fas fa-edit"></i>
									<strong>Editar</strong>	
								</a> --}}
							
						</tr>
					@endforeach
				</table>
				{{-- {{ $empleados->links() }} --}}
			</div>
		</div>
	</div>
@endsection