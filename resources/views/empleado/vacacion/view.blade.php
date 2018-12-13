@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Vacaciones:</h4>
		</div>
		@if ($diastotales == 0)
			{{-- expr --}}
			<div class="card-body">
				<h4>Todavía no cumple un año en la institución</h4>
			</div>
		@else
			<div class="card-body">
				@if ($diastotales > $diasdisfrutados)
					{{-- expr --}}
					<form method="POST" action="{{ route('empleados.vacacions.store',['empleado'=>$empleado]) }}">
						@csrf
						<div class="row form-group">
							<div class="col-3 offset-1">
								<label class="control-label" for="contratacion" id="lbl_vacaciones">Fecha de contratación:</label>
								<input type="date" class="form-control disabled" id="contratacion" readonly="" name="contratacion" value="{{$empleado->datosLab->first()->fechacontratacion}}">
							</div>
							<div class="col-3">
								<label class="control-label" for="diastotales" id="lbl_vacaciones">Antigüedad:</label>
								<div class="input-group mb-3">
								  <input type="number" class="form-control" id="diastotales" readonly="" name="diastotales" value="{{$antiguedad}}">
								  <div class="input-group-append">
								    <span class="input-group-text" id="basic-addon2">años</span>
								  </div>
								</div>
							</div>
							<div class="col-3">
								<label class="control-label" for="contratacion" id="lbl_vacaciones">Días totales de vacaciones:</label>
								<input type="number" class="form-control disabled" id="contratacion" readonly="" name="contratacion" value="{{$diastotales}}">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-3 offset-1">
								<label class="control-label" for="fechainicio" id="lbl_vacaciones">Fecha de Inicio:</label>
								<input type="date" class="form-control" id="fechainicio" name="fechainicio" min="{{date('Y-m-d')}}">
							</div>
							<div class="col-3">
								<label class="control-label" for="fechafin" id="lbl_vacaciones">Fecha de Fin:</label>
								<input type="date" class="form-control" id="fechafin" name="fechafin">
							</div>
							<div class="col-3">
								<label class="control-label" for="diastomados">Número de días de vacaciones:</label>
		    					<input type="text" class="form-control" id="dias_a_disfrutar" step="1" min="1" name="diasdisfrutar">
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
				@else 
					<div class="container">
						<h5>Vacaciones tomadas</h5>
					</div>
				@endif
				<div class="container form-group mt-3">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="table-info">
								<th>Fecha</th>
								<th>Fecha de inicio</th>
								<th>Fecha de termino</th>
								<th>Días a disfrutar</th>
								<th>Días restantes</th>
							</tr>
						</thead>
						@foreach ($vacaciones as $vacacion)
							{{-- expr --}}
							<tr class="active">
								<td>{{$vacacion->created_at->toDateString()}}</td>
								<td>{{$vacacion->fechainicio}}</td>
								<td>{{$vacacion->fechafin}}</td>
								<td>{{$vacacion->diasdisfrutar}}</td>
								<td>{{$diastotales-$diasdisfrutados}}</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		
		@endif
	</div>
	
@endsection
@section('script')
	{{-- expr --}}
	<script type="text/javascript">
		$('#fechainicio').change(function(e){
			console.log($("#fechainicio").val());
			$("#fechafin").attr('min',$('#fechainicio').val());	
			var fin = new Date($('#fechainicio').val());
			fin.setDate(fin.getDate()+{{$diastotales-$diasdisfrutados}});
			console.log(fin.toISOString().slice(0,10));
			$("#fechafin").attr('max',fin.toISOString().slice(0,10));
		})
	</script>
@endsection