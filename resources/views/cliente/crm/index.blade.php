@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>CRM:</h4>
			{{-- {{dd($cliente->crms)}} --}}
		</div>
		<div class="card-body">
			<form method="POST" action="{{ route('clientes.crms.store',['cliente'=>$cliente]) }}">
				@csrf
				<div class="row">
					<div class="col-4 form-group">
						<label class="control-label">
							Fecha de contacto:
						</label>
						<input type="date" name="fecha_cont" class="form-control" required>
					</div>
					<div class="col-4 form-group">
						<label class="control-label">
							Fecha del siguiente contacto:
						</label>
						<input type="date" name="fecha_sig" class="form-control" required>
					</div>
					<div class="col-4 form-group">
						<label class="control-label" for="forma_cont">Forma de contacto:</label>
						<select class="form-control" type="select" name="forma_cont" id="forma_cont" required>
							<option id="Mail" value="Mail">Email/Correo Electronico</option>
							<option id="Telefono" value="Telefono">Telefono</option>
							<option id="Cita" value="Cita">Cita</option>
							<option id="Whatsapp" value="Whatsapp">Whatsapp</option>
							<option id="Otro" value="Otro" selected="selected">Otro</option>
						</select>
					</div>
					<div class="col-4 form-group">
						<label class="control-label" for="servicio">Servicio:</label>
						<select class="form-control" type="select" name="servicio" id="servicio" required>
							<option id="Rastreo" value="Rastreo">Rastreo</option>
							<option id="Cotización" value="Cotización">Cotización</option>
							<option id="Cita" value="Cita">Cita</option>
							<option id="Servicio" value="Servicio">Servicio</option>
							<option id="Otro" value="Otro" selected="selected">Otro</option>
						</select>
					</div>
					<div class="col-4 form-group">
						<label class="control-label">Telefono:</label>
						<input type="string" name="telefono" class="form-control" pattern="[0-9]{8,}" title="Solo digitos numericos, minimo 8 digitos" required>
					</div>
					<div class="col-4 form-group">
						<label class="control-label">Extensión:</label>
						<input type="string" name="ext" class="form-control" pattern="[0-9]{1,}" title="Solo digitos numericos, minimo 1 digitos">
					</div>
					<div class="col-4 form-group">
						<label class="control-label">Celular:</label>
						<input type="string" name="celular" class="form-control" pattern="[0-9]{10,}" title="Solo digitos numericos, minimo 10 digitos" required>
					</div>
					<div class="col-4 form-group">
						<label class="control-label">Correo:</label>
						<input type="email" name="correo" class="form-control" required>
					</div>
					<div class="col-4 form-group">
						<label class="control-label">Comentarios:</label>
						<textarea class="form-control" name="comentario"></textarea>
					</div>
					<div class="col-4 form-group">
						<label class="control-label">Acuerdos:</label>
						<textarea class="form-control" name="acuerdos"></textarea>
					</div>
				</div>
				<div class="row form-group justify-content-center">
					<button type="submit" class="btn btn-success btn-lg">
						<strong>
							<i class="far fa-save"></i> 
							Guardar
						</strong>
					</Button>
				</div>
			</form>
			<div class="row">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th>
								Fecha de contacto
							</th>
							<th>
								Fecha del proximo contacto
							</th>
							<th>
								Forma de contacto
							</th>
							<th>
								Servicio
							</th>
							<th>
								Telefono
							</th>
							<th>
								Celular
							</th>
							<th>
								Comentarios
							</th>
							<th>
								Acuerdos
							</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($cliente->crms as $crm)
							<tr>
								<td>
									{{$crm->fecha_cont}}
								</td>
								<td>
									{{$crm->fecha_sig}}
								</td>
								<td>
									{{$crm->forma_cont}}
								</td>
								<td>
									{{$crm->servicio}}
								</td>
								<td>
									{{$crm->ext ? $crm->telefono.' ext:'.$crm->ext : $crm->telefono}}
								</td>
								<td>
									{{$crm->celular}}
								</td>
								<td>
									{{$crm->comentario}}
								</td>
								<td>
									{{$crm->acuerdos}}
								</td>
							</tr>

						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron registros de clientes.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection