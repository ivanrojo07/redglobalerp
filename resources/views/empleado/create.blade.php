@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Empleados</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ $edit ? route('empleados.update',['empleado'=>$empleado]) : route('empleados.store') }}">
				@csrf
				@if ($edit)
					@method('PUT')
				@endif
				<input type="hidden" id="consecutivo" name="" value="{{ $numero }}">
				<div class="row">
					<div class="col-sm-4">
						<h5>Datos del Empleado:</h5>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('empleados.index') }}"><strong>Lista de Empleados</strong></a>
					</div>
				</div>
				<div class="row mt-3">
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">*ID de empleado:(Automático)</label>
						@if($edit)
						<dd>{{ $empleado->identificador}}</dd>
						@else
						<input class="form-control" id="identificador" type="text" name="identificador" readonly autofocus>
						@endif
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">*Tipo de empleado:</label>
						<select type="select" class="form-control" name="tipo" id="tipo" required>
							<option value="">Seleccione</option>
							@foreach($puestos as $p)
								<option value="{{ str_replace(' ', '', $p->nombre) }}" {{ ($edit && $empleado->tipo == $p->nombre) ? "selected" :'' }}>{{ $p->nombre }}</option>
							@endforeach
						</select>

					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">*Fecha de nacimiento:</label>
						<input type="date" name="fnac" class="form-control" value="{{$empleado->fnac}}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="appaterno">*Apellido Paterno:</label>
						<input type="text" class="form-control" id="appaterno" name="appaterno" required="required" value="{{ $empleado->appaterno }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="apmaterno">*Apellido Materno:</label>
						<input type="text" id="apmaterno" class="form-control" name="apmaterno" required="required" value="{{ $empleado->apmaterno }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">*Nombre(s):</label>
						<input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{ $empleado->nombre }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="rfc">*RFC:</label>
						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc }}" minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres" style="text-transform:uppercase">
					</div>
				</div>
				<div>
					<ul class="nav nav-tabs" id="empleadoTabs" role="tablist">
						<li class="nav-item"><a href="#generales" class="nav-link active" id="generalTab" data-toggle="tab" role="tab" aria-controls="generales" aria-selected="true">Generales</a></li>
						<li class="nav-item"><a href="#beneficiario" class="nav-link {{$edit ? '' : 'disabled'}}"  id="beneficiarioTab" data-toggle="tab" role="tab" aria-controls="beneficiario" aria-selected="false">Beneficiario</a></li>
						<li class="nav-item"><a href="#laborales" class="nav-link {{$edit ? '' : 'disabled'}}"  id="laboralTab" data-toggle="tab" role="tab" aria-controls="laborales" aria-selected="false">Laborales</a></li>
						<li class="nav-item"><a href="#estudios" class="nav-link {{$edit ? '' : 'disabled'}}" id="estudioTab" data-toggle="tab" role="tab" aria-controls="estudios" aria-selected="false">Estudios</a></li>
						<li class="nav-item"><a href="#emergencias" class="nav-link {{$edit ? '' : 'disabled'}}"  id="emergenciaTab" data-toggle="tab" role="tab" aria-controls="emergencias" aria-selected="false">Emergencias</a></li>
						<li class="nav-item"><a href="#vacaciones" class="nav-link {{$edit ? '' : 'disabled'}}" id="vacacionTab" data-toggle="tab" role="tab" aria-controls="vacaciones" aria-selected="false">Vacaciones</a></li>
						<li class="nav-item"><a href="#faltas" class="nav-link {{$edit ? '' : 'disabled'}}" id="faltasTab" data-toggle="tab" role="tab" aria-controls="faltas" aria-selected="false">Faltas</a></li>
						<li class="nav-item"><a href="#permisos" class="nav-link {{$edit ? '' : 'disabled'}}" id="permisosTab" data-toggle="tab" role="tab" aria-controls="permisos" aria-selected="false">Permisos</a></li>
						<li class="nav-item"><a href="#disciplinas" class="nav-link {{$edit ? '' : 'disabled'}}" id="disciplinasTab" data-toggle="tab" role="tab" aria-controls="disciplinas" aria-selected="false">Disciplina</a></li>
						<li class="nav-item" @if ($edit && $empleado->tipo != "Chofer") style="display: none;" @endif id="licenciasT"><a href="#licencias" class="nav-link {{$edit ? '' : 'disabled'}}" id="licenciaTab" data-toggle="tab" role="tab" aria-controls="licencias" aria-selected="false">Licencia de manejo</a></li>
						<li class="nav-item" @if ($edit && $empleado->tipo != "Chofer") style="display: none;" @endif id="accidentesT"><a href="#accidentes" class="nav-link {{$edit ? '' : 'disabled'}}" id="licenciaTab" data-toggle="tab" role="tab" aria-controls="licencias" aria-selected="false">Accidente e incidencias</a></li>
					</ul>
					<div class="tab-content" id="empleadoTabContent">
						<div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales-tab">
							<div class="card">
								<div class="card-header">
									<div class="row">
										<div class="col-sm-4">
											<h5>Datos Generales:</h5>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="form-group col-sm-4">
											<label class="control-label" for="telefono">Teléfono:</label>
											<input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
										</div>
										<div class="form-group col-sm-4">
											<label class="control-label" for="movil">Celular:</label>
											<input type="text" class="form-control" name="movil" id="movil" value="{{ $empleado->movil }}">
										</div>
										<div class="form-group col-sm-4">
											<label class="control-label" for="email"><i class="fa fa-asterisk" aria-hidden="true"></i>Correo electrónico:</label>
											<input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}" required="">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="nacionalidad">Nacionalidad:</label>
											<select name="nacionalidad" id="nacionalidad" class="form-control" id="nacionalidad">
												<option value="">Seleccione la nacionalidad</option>
												<option value="Mexicana" {{ ($edit && $empleado->nacionalidad == "Mexicana") ? "selected" :'' }}>Mexicana</option>
												<option value="Extranjera" {{ ($edit && $empleado->nacionalidad == "Extranjera") ? "selected" :'' }}>Extranjera</option>
											</select>
										</div>
										<div class="form-group col-sm-3" id="div-pais" style="display: none">
											<label class="control-label" for="pais">País</label>
											<select name="pais" id="pais" class="form-control">
												<option value="Elegir" id="AF">Elegir opción</option>
												<option value="Afganistán" id="AF">Afganistán</option>
												<option value="Albania" id="AL">Albania</option>
												<option value="Alemania" id="DE">Alemania</option>
												<option value="Andorra" id="AD">Andorra</option>
												<option value="Angola" id="AO">Angola</option>
												<option value="Anguila" id="AI">Anguila</option>
												<option value="Antártida" id="AQ">Antártida</option>
												<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
												<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
												<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
												<option value="Argelia" id="DZ">Argelia</option>
												<option value="Argentina" id="AR">Argentina</option>
												<option value="Armenia" id="AM">Armenia</option>
												<option value="Aruba" id="AW">Aruba</option>
												<option value="Australia" id="AU">Australia</option>
												<option value="Austria" id="AT">Austria</option>
												<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
												<option value="Bahamas" id="BS">Bahamas</option>
												<option value="Bahrein" id="BH">Bahrein</option>
												<option value="Bangladesh" id="BD">Bangladesh</option>
												<option value="Barbados" id="BB">Barbados</option>
												<option value="Bélgica" id="BE">Bélgica</option>
												<option value="Belice" id="BZ">Belice</option>
												<option value="Benín" id="BJ">Benín</option>
												<option value="Bermudas" id="BM">Bermudas</option>
												<option value="Bhután" id="BT">Bhután</option>
												<option value="Bielorrusia" id="BY">Bielorrusia</option>
												<option value="Birmania" id="MM">Birmania</option>
												<option value="Bolivia" id="BO">Bolivia</option>
												<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
												<option value="Botsuana" id="BW">Botsuana</option>
												<option value="Brasil" id="BR">Brasil</option>
												<option value="Brunei" id="BN">Brunei</option>
												<option value="Bulgaria" id="BG">Bulgaria</option>
												<option value="Burkina Faso" id="BF">Burkina Faso</option>
												<option value="Burundi" id="BI">Burundi</option>
												<option value="Cabo Verde" id="CV">Cabo Verde</option>
												<option value="Camboya" id="KH">Camboya</option>
												<option value="Camerún" id="CM">Camerún</option>
												<option value="Canadá" id="CA">Canadá</option>
												<option value="Chad" id="TD">Chad</option>
												<option value="Chile" id="CL">Chile</option>
												<option value="China" id="CN">China</option>
												<option value="Chipre" id="CY">Chipre</option>
												<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
												<option value="Colombia" id="CO">Colombia</option>
												<option value="Comores" id="KM">Comores</option>
												<option value="Congo" id="CG">Congo</option>
												<option value="Corea" id="KR">Corea</option>
												<option value="Corea del Norte" id="KP">Corea del Norte</option>
												<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
												<option value="Costa Rica" id="CR">Costa Rica</option>
												<option value="Croacia" id="HR">Croacia</option>
												<option value="Cuba" id="CU">Cuba</option>
												<option value="Dinamarca" id="DK">Dinamarca</option>
												<option value="Djibouri" id="DJ">Djibouri</option>
												<option value="Dominica" id="DM">Dominica</option>
												<option value="Ecuador" id="EC">Ecuador</option>
												<option value="Egipto" id="EG">Egipto</option>
												<option value="El Salvador" id="SV">El Salvador</option>
												<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
												<option value="Eritrea" id="ER">Eritrea</option>
												<option value="Eslovaquia" id="SK">Eslovaquia</option>
												<option value="Eslovenia" id="SI">Eslovenia</option>
												<option value="España" id="ES">España</option>
												<option value="Estados Unidos" id="US">Estados Unidos</option>
												<option value="Estonia" id="EE">Estonia</option>
												<option value="c" id="ET">Etiopía</option>
												<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
												<option value="Filipinas" id="PH">Filipinas</option>
												<option value="Finlandia" id="FI">Finlandia</option>
												<option value="Francia" id="FR">Francia</option>
												<option value="Gabón" id="GA">Gabón</option>
												<option value="Gambia" id="GM">Gambia</option>
												<option value="Georgia" id="GE">Georgia</option>
												<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
												<option value="Ghana" id="GH">Ghana</option>
												<option value="Gibraltar" id="GI">Gibraltar</option>
												<option value="Granada" id="GD">Granada</option>
												<option value="Grecia" id="GR">Grecia</option>
												<option value="Groenlandia" id="GL">Groenlandia</option>
												<option value="Guadalupe" id="GP">Guadalupe</option>
												<option value="Guam" id="GU">Guam</option>
												<option value="Guatemala" id="GT">Guatemala</option>
												<option value="Guayana" id="GY">Guayana</option>
												<option value="Guayana francesa" id="GF">Guayana francesa</option>
												<option value="Guinea" id="GN">Guinea</option>
												<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
												<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
												<option value="Haití" id="HT">Haití</option>
												<option value="Holanda" id="NL">Holanda</option>
												<option value="Honduras" id="HN">Honduras</option>
												<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
												<option value="Hungría" id="HU">Hungría</option>
												<option value="India" id="IN">India</option>
												<option value="Indonesia" id="ID">Indonesia</option>
												<option value="Irak" id="IQ">Irak</option>
												<option value="Irán" id="IR">Irán</option>
												<option value="Irlanda" id="IE">Irlanda</option>
												<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
												<option value="Isla Christmas" id="CX">Isla Christmas</option>
												<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
												<option value="Islandia" id="IS">Islandia</option>
												<option value="Islas Caimán" id="KY">Islas Caimán</option>
												<option value="Islas Cook" id="CK">Islas Cook</option>
												<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
												<option value="Islas Faroe" id="FO">Islas Faroe</option>
												<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
												<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
												<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
												<option value="Islas Marshall" id="MH">Islas Marshall</option>
												<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
												<option value="Islas Palau" id="PW">Islas Palau</option>
												<option value="Islas Salomón" d="SB">Islas Salomón</option>
												<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
												<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
												<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
												<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
												<option value="Israel" id="IL">Israel</option>
												<option value="Italia" id="IT">Italia</option>
												<option value="Jamaica" id="JM">Jamaica</option>
												<option value="Japón" id="JP">Japón</option>
												<option value="Jordania" id="JO">Jordania</option>
												<option value="Kazajistán" id="KZ">Kazajistán</option>
												<option value="Kenia" id="KE">Kenia</option>
												<option value="Kirguizistán" id="KG">Kirguizistán</option>
												<option value="Kiribati" id="KI">Kiribati</option>
												<option value="Kuwait" id="KW">Kuwait</option>
												<option value="Laos" id="LA">Laos</option>
												<option value="Lesoto" id="LS">Lesoto</option>
												<option value="Letonia" id="LV">Letonia</option>
												<option value="Líbano" id="LB">Líbano</option>
												<option value="Liberia" id="LR">Liberia</option>
												<option value="Libia" id="LY">Libia</option>
												<option value="Liechtenstein" id="LI">Liechtenstein</option>
												<option value="Lituania" id="LT">Lituania</option>
												<option value="Luxemburgo" id="LU">Luxemburgo</option>
												<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
												<option value="Madagascar" id="MG">Madagascar</option>
												<option value="Malasia" id="MY">Malasia</option>
												<option value="Malawi" id="MW">Malawi</option>
												<option value="Maldivas" id="MV">Maldivas</option>
												<option value="Malí" id="ML">Malí</option>
												<option value="Malta" id="MT">Malta</option>
												<option value="Marruecos" id="MA">Marruecos</option>
												<option value="Martinica" id="MQ">Martinica</option>
												<option value="Mauricio" id="MU">Mauricio</option>
												<option value="Mauritania" id="MR">Mauritania</option>
												<option value="Mayotte" id="YT">Mayotte</option>
												<option value="México" id="MX">México</option>
												<option value="Micronesia" id="FM">Micronesia</option>
												<option value="Moldavia" id="MD">Moldavia</option>
												<option value="Mónaco" id="MC">Mónaco</option>
												<option value="Mongolia" id="MN">Mongolia</option>
												<option value="Montserrat" id="MS">Montserrat</option>
												<option value="Mozambique" id="MZ">Mozambique</option>
												<option value="Namibia" id="NA">Namibia</option>
												<option value="Nauru" id="NR">Nauru</option>
												<option value="Nepal" id="NP">Nepal</option>
												<option value="Nicaragua" id="NI">Nicaragua</option>
												<option value="Níger" id="NE">Níger</option>
												<option value="Nigeria" id="NG">Nigeria</option>
												<option value="Niue" id="NU">Niue</option>
												<option value="Norfolk" id="NF">Norfolk</option>
												<option value="Noruega" id="NO">Noruega</option>
												<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
												<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
												<option value="Omán" id="OM">Omán</option>
												<option value="Panamá" id="PA">Panamá</option>
												<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
												<option value="Paquistán" id="PK">Paquistán</option>
												<option value="Paraguay" id="PY">Paraguay</option>
												<option value="Perú" id="PE">Perú</option>
												<option value="Pitcairn" id="PN">Pitcairn</option>
												<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
												<option value="Polonia" id="PL">Polonia</option>
												<option value="Portugal" id="PT">Portugal</option>
												<option value="Puerto Rico" id="PR">Puerto Rico</option>
												<option value="Qatar" id="QA">Qatar</option>
												<option value="Reino Unido" id="UK">Reino Unido</option>
												<option value="República Centroafricana" id="CF">República Centroafricana</option>
												<option value="República Checa" id="CZ">República Checa</option>
												<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
												<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
												<option value="República Dominicana" id="DO">República Dominicana</option>
												<option value="Reunión" id="RE">Reunión</option>
												<option value="Ruanda" id="RW">Ruanda</option>
												<option value="Rumania" id="RO">Rumania</option>
												<option value="Rusia" id="RU">Rusia</option>
												<option value="Samoa" id="WS">Samoa</option>
												<option value="Samoa occidental" id="AS">Samoa occidental</option>
												<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
												<option value="San Marino" id="SM">San Marino</option>
												<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
												<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
												<option value="Santa Helena" id="SH">Santa Helena</option>
												<option value="Santa Lucía" id="LC">Santa Lucía</option>
												<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
												<option value="Senegal" id="SN">Senegal</option>
												<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
												<option value="Sychelles" id="SC">Seychelles</option>
												<option value="Sierra Leona" id="SL">Sierra Leona</option>
												<option value="Singapur" id="SG">Singapur</option>
												<option value="Siria" id="SY">Siria</option>
												<option value="Somalia" id="SO">Somalia</option>
												<option value="Sri Lanka" id="LK">Sri Lanka</option>
												<option value="Suazilandia" id="SZ">Suazilandia</option>
												<option value="Sudán" id="SD">Sudán</option>
												<option value="Suecia" id="SE">Suecia</option>
												<option value="Suiza" id="CH">Suiza</option>
												<option value="Surinam" id="SR">Surinam</option>
												<option value="Svalbard" id="SJ">Svalbard</option>
												<option value="Tailandia" id="TH">Tailandia</option>
												<option value="Taiwán" id="TW">Taiwán</option>
												<option value="Tanzania" id="TZ">Tanzania</option>
												<option value="Tayikistán" id="TJ">Tayikistán</option>
												<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
												<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
												<option value="Timor Oriental" id="TP">Timor Oriental</option>
												<option value="Togo" id="TG">Togo</option>
												<option value="Tonga" id="TO">Tonga</option>
												<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
												<option value="Túnez" id="TN">Túnez</option>
												<option value="Turkmenistán" id="TM">Turkmenistán</option>
												<option value="Turquía" id="TR">Turquía</option>
												<option value="Tuvalu" id="TV">Tuvalu</option>
												<option value="Ucrania" id="UA">Ucrania</option>
												<option value="Uganda" id="UG">Uganda</option>
												<option value="Uruguay" id="UY">Uruguay</option>
												<option value="Uzbekistán" id="UZ">Uzbekistán</option>
												<option value="Vanuatu" id="VU">Vanuatu</option>
												<option value="Venezuela" id="VE">Venezuela</option>
												<option value="Vietnam" id="VN">Vietnam</option>
												<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
												<option value="Yemen" id="YE">Yemen</option>
												<option value="Zambia" id="ZM">Zambia</option>
												<option value="Zimbabue" id="ZW">Zimbabue</option>
											</select>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="edo_civil">Estado civil:</label>
											<select name="edo_civil" class="form-control" id="edo_civil">
												<option value="">Seleccione el estado civil</option>
												<option value="Soltero" {{ ($edit && $empleado->edo_civil == "Soltero") ? "selected" :'' }}>Soltero/a</option>
												<option value="Comprometido" {{ ($edit && $empleado->edo_civil == "Comprometido") ? "selected" :'' }}>Comprometido/a</option>
												<option value="Casado" {{ ($edit && $empleado->edo_civil == "Casado") ? "selected" :'' }}>Casado/a</option>
												<option value="Divorciado" {{ ($edit && $empleado->edo_civil == "Divorciado") ? "selected" :'' }}>Divorciado/a</option>
												<option value="Viudo" {{ ($edit && $empleado->edo_civil == "Viudo") ? "selected" :'' }}>Viudo/a</option>
												<option value="Union Libre" {{ ($edit && $empleado->edo_civil == "UnionLibre") ? "selected" :'' }}>Unión Libre</option>
												<option value="Madre Soltera" {{ ($edit && $empleado->edo_civil == "MadreSoltera") ? "selected" :'' }}>Madre Soltera</option>
												<option value="Padre Soltero" {{ ($edit && $empleado->edo_civil == "PadreSoltero") ? "selected" :'' }}>Padre Soltero</option>
												<option value="Prefiero no decir" {{ ($edit && $empleado->edo_civil == "Prefiero no decir") ? "selected" :'' }}>Prefiero no decir</option>
											</select>
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="padre">Nombre completo del padre:</label>
											<input type="text" class="form-control" name="padre" id="padre" value="{{ $empleado->padre }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="madre">Nombre completo de la madre:</label>
											<input type="text" class="form-control" name="madre" id="madre" value="{{ $empleado->madre }}">
										</div>
										
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="conyugue">Nombre completo del conyugue <br> (en caso de tenerlo):</label>
											<input type="text" class="form-control" name="conyugue" id="conyugue" value="{{ $empleado->conyugue }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="dependientes">Número de dependientes económicos:</label>
											<input type="number" min="0" step="1" class="form-control" name="dependientes" id="dependientes" value="{{ $empleado->dependientes }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="ref_pers">Nombre completo de la referencia personal:</label>
											<input type="text" class="form-control" name="ref_pers" id="ref_pers" value="{{ $empleado->ref_pers }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="tel_ref_pers">Teléfono de la referencia personal:</label>
											<input type="text" class="form-control" name="tel_ref_pers" id="tel_ref_pers" value="{{ $empleado->tel_ref_pers }}">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
											<input type="text" class="form-control" name="nss" id="nss" value="{{ $empleado->nss }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="curp">C.U.R.P.:</label>
											<input type="text" class="form-control" name="curp" id="curp" value="{{ $empleado->curp }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="infonavit">Número Infonavit:</label>
											<input type="text" class="form-control" name="infonavit" id="infonavit" value="{{ $empleado->infonavit }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="cp">Código Postal:</label>
											<input type="text" class="form-control" name="cp" id="cp" value="{{ $empleado->cp }}">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="calle">Calle:</label>
											<input type="text" class="form-control" name="calle" id="calle" value="{{ $empleado->calle }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="numext">Número Exterior:</label>
											<input type="text" class="form-control" name="numext" id="numext" value="{{ $empleado->numext }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="numint">Número Interior:</label>
											<input type="text" class="form-control" name="numint" id="numint" value="{{ $empleado->numint }}">
										</div><div class="form-group col-sm-3">
											<label class="control-label" for="colonia">Colonia:</label>
											<input type="text" class="form-control" name="colonia" id="colonia" value="{{ $empleado->colonia }}">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label class="control-label" for="municipio">Delegación/Municipio:</label>
											<input type="text" class="form-control" name="municipio" id="municipio" value="{{ $empleado->municipio }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="estado">Estado:</label>
											<input type="text" class="form-control" name="estado" id="estado" value="{{ $empleado->estado }}">
										</div>
										<div class="form-group col-sm-3">
											<label class="control-label" for="calles">Entre calles:</label>
											<input type="text" class="form-control" name="calles" id="calles" placeholder="calle y calle" value="{{ $empleado->calles }}">
										</div><div class="form-group col-sm-3">
											<label class="control-label" for="referencia">Referencia:</label>
											<input type="text" class="form-control" name="referencia" id="referencia" value="{{ $empleado->referencia }}">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 text-center">
											<button type="submit" class="btn btn-success">
											 	<strong>Guardar</strong>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="beneficiario" role="tabpanel" style="height: 650px!important;" aria-labelledby="beneficiario-tab">
							<iframe style="height: 650px!important;" id="laboralesframe" src="{{ $edit ? route('empleados.beneficiario.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="laborales" role="tabpanel" style="height: 650px!important;" aria-labelledby="laborales-tab">
							<iframe style="height: 650px!important;" id="laboralesframe" src="{{ $edit ? route('empleados.datoslaborales.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" style="height: 650px!important;" id="estudios" role="tabpanel" aria-labelledby="estudios-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.estudios.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="emergencias" style="height: 650px!important;" role="tabpanel" aria-labelledby="emergencias-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.emergencias.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="vacaciones" style="height: 650px!important;" role="tabpanel" aria-labelledby="vacaciones-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.vacacions.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="faltas" style="height: 650px!important;" role="tabpanel" aria-labelledby="faltas-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.faltas.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="permisos" style="height: 650px!important;" role="tabpanel" aria-labelledby="permisos-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.permisos.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="disciplinas" style="height: 650px!important;" role="tabpanel" aria-labelledby="disciplinas-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.disciplinas.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						{{-- MOSTRAR CHOFER SOLO SI ES CHOFER --}}
						@if ($edit && $empleado->tipo == "Chofer")
						<div class="tab-pane fade" id="licencias" style="height: 650px!important;" role="tabpanel" aria-labelledby="licencias-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route("empleados.licencias.index",['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						<div class="tab-pane fade" id="accidentes" style="height: 650px!important;" role="tabpanel" aria-labelledby="accidentes-tab">
							<iframe style="height: 650px!important;" src="{{ $edit ? route('empleados.accidentes.index',['empleado'=>$empleado]) : '' }}"></iframe>
						</div>
						@endif
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<div class="row">
                <div class="col-sm-12 text-right">
                    <h4><small><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small> Campos Requeridos</small></small></h4>
                </div>
            </div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$('#tipo').change(function(e){
			$("#licenciasT").hide();
			$("#accidentesT").hide();
			var empleado = $("#tipo").val();
			if(empleado === "Operador"){
				$("#licenciasT").show();
				$("#accidentesT").show();
			}
		});
		$('#nacionalidad').change(function(e){
			var nacionalidad = $(this).val();
			$('#div-pais').prop('style', 'display:none;');
			if (nacionalidad == 'Extranjera' ) {
				$('#div-pais').prop('style', '');
			}
			
		});	
		document.getElementById("laboralesframe").width();
		document.getElementById("laboralesframe").height();

	</script>
@endsection