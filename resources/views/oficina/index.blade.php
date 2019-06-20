@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<form id="buscaroficinas" action="busqueda"
	onKeypress="if(event.keyCode == 13) event.returnValue = false;">
			<!-- {{ csrf_field() }} -->
				<div class="row">
					<div class="col mt-3">
						<h4>Oficinas:</h4>
					</div>
					<div class="col mt-3">
						<div class="input-group mb-3">
							<input type="text" list='browsers' id="oficinas" name="query" class="form-control" placeholder="Buscar..." autofocus>
							<div class="input-group-append">
							    <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
							  </div>
						</div>
					</div>
					<div class="col mt-3">
						<div class="col-sm-3">
							 <a class="btn btn-info" href="{{ route('oficinas.create')}}">
							        
							   Agregar Oficina
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="card-body">
			<div id="datos" name="datos" class="container">
				<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
					<thead>
						<tr class="info">
							<th>Razon Social</th>
							<th>Alias</th>
							<th>ciudad</th>
							<th>Responsable</th>
							<th>Representante Legal</th>
							<th>Acciones</th>
						</tr>
					</thead>
					@foreach ($oficinas as $oficina)
						<tr class="active">
							
							<td>{{$oficina->razon_social}}</td>
							<td>{{$oficina->alias}}</td>
							<td>{{$oficina->ciudad}}</td>
							<td>{{$oficina->responsable}}</td>
							<td>{{$oficina->representante_legal}}</td>
							<td>
								<a class="btn btn-success btn-sm" href="{{-- route('oficinas.show',['oficinas'=>$oficinas]) --}}"><i class="fa fa-eye" aria-hidden="true"></i> 
							<strong>Ver</strong>	</a>
								<a class="btn btn-info btn-sm" href="{{-- route('oficinas.edit',['oficinas'=>$oficinas]) --}}">
									<i class="fas fa-edit"></i>
									<strong>Editar</strong>	
								</a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection