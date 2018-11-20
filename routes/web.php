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
// Route::resource('empleados.estudios', 'Empleado\EmpleadosEstudiosController');
// Route::resource('empleados.emergencias', 'Empleado\EmpleadosEmergenciasController');
// Route::resource('empleados.vacaciones', 'Empleado\EmpleadosVacacionesController');
// Route::resource('empleados.faltas', 'Empleado\EmpleadosFaltasAdministrativasController');

//	ajax
Route::get('buscarDL/{datoslab}','Empleado\EmpleadoDatosLabController@show'); 


// PRECARGAS
Route::resource('puestos','Precargas\TipoPuestoController');
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajasController');
// Route::get('/home', 'HomeController@index')->name('home');
