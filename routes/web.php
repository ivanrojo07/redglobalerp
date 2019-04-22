<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if(Auth::check()){
    	return view('welcome');
	}else{
		return redirect()->route('login');
	}
});
Route::get('/denegado',function(){
	return view('errors.denegado');
})->name('denegado');
Route::get('/home', function () {
	if(Auth::check()){
    	return view('welcome');
	}else{
		return redirect()->route('login');
	}
})->name('home');

// Rutas de autenticación del cliente


Route::prefix('client')->group(function(){
	Route::get('/login','Auth\ClienteLoginController@showLoginForm')->name('cliente.login');
	Route::post('/login','Auth\ClienteLoginController@login')->name('cliente.login.submit');
	Route::get('/','ClienteCredentialsController@index')->name('cliente.dashboard');
	Route::post('/logout','Auth\ClienteLoginController@logout')->name('cliente.logout');

	// Reestablecer las contraseñas 
	Route::post('/password/email','Auth\ClienteForgotPasswordController@sendResetLinkEmail')->name('cliente.password.email');
	Route::get('/password/reset','Auth\ClienteForgotPasswordController@showLinkRequestForm')->name('cliente.password.request');
	Route::post('/password/reset','Auth\ClienteResetPasswordController@reset');
	Route::get('/password/reset/{token}','Auth\ClienteResetPasswordController@showResetForm')->name('cliente.password.reset');
	Route::resource('cotizacions','Cliente\CotizacionController');

});

Route::get('/cliente','Cliente\ClienteController@index');
// AUTH
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// SEGURIDAD
Route::resource('perfil', 'Perfil\PerfilController');
Route::resource('usuario', 'Usuario\UsuarioController');
// Auth::routes();

// EMPLEADOS
Route::resource('empleados', 'Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales', 'Empleado\EmpleadoDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadoEstudioController');
Route::resource('empleados.emergencias','Empleado\EmpleadoEmergenciaController');
Route::resource('empleados.vacacions','Empleado\EmpleadoVacacionController');
Route::resource('empleados.faltas','Empleado\EmpleadoFaltaController');
Route::resource('empleados.licencias','Empleado\EmpleadoLicenciaController');
Route::resource('empleados.accidentes','Empleado\EmpleadoAccidenteController');
Route::resource('empleados.permisos','Empleado\EmpleadoPermisoController');
Route::resource('empleados.disciplinas','Empleado\EmpleadoDisciplinaController');
//Route::resource('cotizacions','Cliente\CotizacionController');
Route::resource('empleados.beneficiario','Empleado\EmpleadoBeneficiarioController',['only'=>['index','create','store','edit','update']]);
// Route::resource('empleados.estudios', 'Empleado\EmpleadosEstudiosController');
// Route::resource('empleados.emergencias', 'Empleado\EmpleadosEmergenciasController');
// Route::resource('empleados.vacaciones', 'Empleado\EmpleadosVacacionesController');
// Route::resource('empleados.faltas', 'Empleado\EmpleadosFaltasAdministrativasController');
Route::get('cotizaciones/index','Empleado\CotizacionesController@index');
Route::get('cotizaciones/create','Empleado\CotizacionesController@create');
Route::get('cotizaciones/show','Empleado\CotizacionesController@show');
//Route::post('cotizaciones/store','Empleado\CotizacionesController@store');


// EMPLEADOS VER CLIENTES
Route::prefix('empleado')->group(function(){
	Route::resource('credencials','Empleado\Cliente\ClienteCredentialsController',['except'=>['show']]);
});


// CLIENTES
route::get('clientes/{cliente}/cotizacion/index','Cliente\CotizacionController@index');
Route::get('clientes/{cliente}/cotizacion/create','Cliente\CotizacionController@create');
Route::post('clientes/{cliente}/cotizacion/store','Cliente\CotizacionController@store');
Route::get('clientes/{cliente}/{cotizacion}/cotizacion/show','Cliente\CotizacionController@show');
Route::resource('clientes','Cliente\ClienteController');
Route::resource('clientes.proyectos','Cliente\ClienteProyectosController');
Route::resource('clientes.crms','Cliente\ClienteCRMController');
Route::resource('clientes.dirfiscals','Cliente\ClienteDirFiscalsController');
Route::resource('clientes.contactos','Cliente\ClienteContactoController');
Route::get('clientes/form/{tipo}','Cliente\ClienteController@form');
Route::get('cif_tax/{cliente}','Cliente\ClienteController@cif')->name('cif_tax');
Route::get('compdom/{cliente}','Cliente\ClienteController@compDom')->name('compdom');
Route::get('actacons/{cliente}','Cliente\ClienteController@actaCons')->name('actacons');
Route::get('idrepresentante/{cliente}','Cliente\ClienteController@repLeg')->name('idrepresentante');
Route::get('cartapoder/{cliente}','Cliente\ClienteController@cartaPod')->name('cartapoder');

// PROYECTOS
Route::resource('proyectos','Proyecto\ProyectoController');

// SERVICIOS
Route::get('{proyecto}/maritimo','Tarifas\MaritimoController@create')->name('proyectos.maritimos.create');
Route::get('{proyecto}/aereo','Tarifas\AereoController@create')->name('proyectos.aereos.create');
Route::get('{proyecto}/terrestre','Tarifas\TerrestreController@create')->name('proyectos.terrestres.create');
//	ajax
Route::get('buscarDL/{datoslab}','Empleado\EmpleadoDatosLabController@show'); 
Route::get('getCommodities','Precargas\CommodityController@getCommodities');
Route::get('getServicios/{servicio}','Precargas\ServiciosController@getServicios');
// PRECARGAS
Route::resource('puestos','Precargas\TipoPuestoController');
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajasController');
Route::resource('licencias','Precargas\TipoLicenciaController');
Route::resource('commodities','Precargas\CommodityController');
Route::resource('servicios','Precargas\ServiciosController');
// Route::get('/home', 'HomeController@index')->name('home');
