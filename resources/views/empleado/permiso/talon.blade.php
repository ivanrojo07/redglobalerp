<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<style type="text/css">
		ul,li,p{
			font-size: 14px;
			text-align:justify-all;
			margin: 3 5px;
		}
		table, td, th {  
		  border: 1px solid #ddd;
		  text-align: center;
		  font-size: 14px;
		}

		table {
		  border-collapse: collapse;
		  width: 100%;
		  margin-left: 20px;
		  margin-right: 40px;
		}
		.center{
			text-align: center;
		}
		.left{
			text-align: left;
		}
		.right{
			text-align: right;
		}
		.justify{
			text-align: justify;
		}
	</style>
	<title>Recibo de prestamo</title>
</head>
<body>
	<div class="container">
		{{-- <div class="row">
			<div class="twelve columns">
				<div class="ten columns u-pull-left"></div>
				<div class="two columns u-pull-right">
					<img src="img/perfil.png" height="40" width="80">
				</div>
			</div>
		</div> --}}
		<div class="row">
			<div class="twelve columns" style="border-top: 2px solid #B8242B; margin-top: 0px;"></div>
		</div>
		{{-- <div class="row" style="margin-top: 5px;">
			<div class="twelve columns">
				<div class="one-half column u-pull-left">
					<img src="img/carta_bienvenida_header.png" height="50%" width="60%">
				</div>
				<div class="one-half column u-pull-right">
					<label class="right">
						México, CDMX a {{date('d')}} de {{__(date('F'))}} del {{date('Y')}}
					</label>
					<label class="center" style="margin-top: 35px;">
						<strong>Carta de Bienvenida</strong>
					</label>
				</div>
			</div>
		</div> --}}
		<div class="row" style="margin-top: 5px;">
			<div class="twelve columns">
				<p class="justify">
					Yo  {{ $empleado->fullnamespace }}  con fecha de {{ $prestamo->fecha }} solicito a la empresa {{ $empresa->nombre }}  un préstamo por {{ $prestamo->monto }} pagaderos en {{ $prestamo->numero_pagos }}  (en Meses, quincenas o semanas), por motivo de {{ $prestamo->motivo }} y acepto que  la empresa {{ $empresa->nombre }} me descuente de nómina la cantidad de {{ $prestamo->monto/$prestamo->numero_pagos }} cada (Mes, quincena o semana)
				</p>
				<p class="justify">
					Acepto
				</p>
				<p class="justify">
					Para brindarle un mejor servicio y asesorarlo sobre el funcionamiento del plan de financiamiento que usted ha contratado, a partir de este momento cualquier asunto relacionado con el contrato celebrado con <strong>Planea Tu Bien, S.A. de C.V.</strong> queremos invitarlo a ponerse en contacto con nuestra área de atención a clientes mediantelas siguientes formas:
				</p>
				<p class="justify" style="margin-left: 25px;">
					Vía correo electrónico:
				</p>
			</div>
		</div>
		<div class="row" style="margin-top: 10px; margin-right: 50px">
			<div class="twelve columns">
				<div class="one-half column u-pull-left">
					<label class="center">
						Recibí carta de bienvenida
					</label>
				</div>
				<div class="one-half column u-pull-right">
					<label class="center">Acepto</label>
					<label class="center">{{ $empleado->fullnamespace }}</label>
					<label class="center">{{ $empleado->rfc }}</label>
				</div>
			</div>
			<div class="row" style="margin-left: 12px; margin-right: 12px; position: fixed;left: 0;bottom: 40px;width: 100%;">
				<div class="twelve columns">
					<img src="img/header_privacidad.png" width="100%" height="25%">
				</div>
			</div>
		</div>
	</div>
</body>
</html>