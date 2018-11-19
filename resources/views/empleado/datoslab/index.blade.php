@extends('layouts.blank')
@section('content')
<div class="card">
	<div class="card-header">
		<h4>
			Datos Laborales:
		</h4>	
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="fechacontratacion" class="control-label">* Fecha de contratación</label>
					<dd><strong> {{ $actual->fechacontratacion }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">* Tipo de contrato:</label>
					@if($contrato==null)
					<dd><strong>NO DEFINIDO</strong></dd>
					@else
					<dd><strong>{{ $contrato->nombre }}</strong></dd>
					@endif
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						*Puesto:
					</label>
					@if($puesto==null)
					<dd><strong>NO DEFINIDO</strong></dd>
					@else
					<dd><strong>{{ $puesto->nombre }}</strong></dd>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						*Salario Nóminal:
					</label>
					<dd><strong>{{ $actual->salarionom }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						Salario Diario
					</label>
					<dd><strong>{{ $actual->salariodia }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">
						Periodicidad de pago:
					</label>
					<dd><strong>{{ $actual->periodopaga }}</strong></dd>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Prestaciones:
					</label>
					<dd><strong>{{ $actual->prestaciones }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Régimen de contratación:
					</label>
					<dd><strong>{{ $actual->regimen }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Hora de entrada:
					</label>
					<dd><strong>{{ $actual->hentrada }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Hora de salida:
					</label>
					<dd><strong>{{ $actual->hsalida }}</strong></dd>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Tiempo de comida:
					</label>
					<dd><strong>{{ $actual->hcomida }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Banco:
					</label>
					@if($actual->banco==null)
					<dd><strong>NO DEFINIDO</strong></dd>
					@else
					<dd><strong>{{ $actual->banco }}</strong></dd>
					@endif
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						Cuenta:
					</label>
					<dd><strong>{{ $actual->cuenta }}</strong></dd>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">
						CLABE:
					</label>
					<dd><strong>{{ $actual->clabe }}</strong></dd>
				</div>
			</div>
		</div>
		@if ($actual->fechabaja)
			<div class="card-header">
				Datos de baja:
			</div>
			<div class="row mt-3">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="" class="control-label">
							Fecha de baja:
						</label>
						<dd><strong>{{ $actual->fechabaja }}</strong></dd>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="" class="control-label">
							Tipo de Baja:
						</label>
  						<dd><strong>{{$actual->tipobaja->nombre}}</strong></dd>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="" class="control-label">
							Comentarios:
						</label>
						<dd><strong>{{$actual->comentariobaja}}</strong></dd>
					</div>
				</div>
			</div>
		@else
			<div class="d-flex justify-content-center">
				<div class="offset-2 col-4">
					<a class="btn btn-info btn-md" href="{{ route('empleados.datoslaborales.edit',['empleado'=>$empleado,'actual'=>$actual]) }}">
						<strong>Editar</strong>
					</a>
				</div>
				<div class="col-4">
					<a class="btn btn-success btn-md" href="{{ route('empleados.datoslaborales.create',['empleado'=>$empleado]) }}">
						<strong>Nuevo</strong>
					</a>
				</div>
			</div>
		@endif
		<div class="card-header">
			<h4>Historial laboral:</h4>
		</div>
		<div class="container-fluid mt-3">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr class="table-info">
						<th>Fecha</th>
						<th>Contrato</th>
						<th>Puesto</th>
						<th>Salario nominal</th>
						<th>Tipo de contrato</th>
						<th>Hora de entrada</th>
						<th>Hora de salida</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($datoslabs as $datoslab)
						<tr title="Haz click para más detalles" style="cursor: pointer;" data-toggle="modal" data-target="#modal-info" onclick="buscarDato({{$datoslab->id}})">
							<td>{{$datoslab->fechacontratacion}}</td>
							<td>{{$datoslab->tipocontrato->nombre}}</td>
							<td>{{$datoslab->tipopuesto->nombre}}</td>
							<td>{{$datoslab->salarionom}}</td>
							<td>{{$datoslab->tipocontrato->nombre}}</td>
							<td>{{$datoslab->hentrada}}</td>
							<td>{{$datoslab->hsalida}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
{{-- MODAL VER DATO LABORAL --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="datosmodal" id="modal-info" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h4>Detalles:</h4>
    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
    	</div>
    	<div class="modal-body" id="body">
    		
    	</div>
    </div>
  </div>
</div>
@endsection
@section('script')
	<script type="text/javascript">
		function buscarDato(id){
			$("#body").html("");
			$.ajax({
				url: `../../buscarDL/${id}`,
				method:"GET",
				dataType: "HTML"
			}).done(function(res){
				$("#body").html(res);
			});
		}
	</script>
@endsection