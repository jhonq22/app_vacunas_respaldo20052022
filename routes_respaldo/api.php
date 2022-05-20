<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API DE INFORMACION VACUNADOS PARA MPPS //
Route::get('mpps/listado/vacunados/completa', 'VacunadosController@ApiInformacionCompletaVacunadosMpps');

Route::get('mpps/listado/vacunados/fecha1/{fecha1}', 'VacunadosController@ApiInformacionCompletaVacunadosMppsFecha1');

Route::get('mpps/listado/vacunados/fecha2/{fecha1}/{fecha2}', 'VacunadosController@ApiInformacionCompletaVacunadosMppsFecha2');

Route::get('vacuna_perdida/api/mpps', 'VacunasPerdidasController@vacunasPerdidasApiMpps');


//Users
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('profile', 'UserController@getAuthenticatedUser');
Route::get('user/list/configuracion', 'UserController@usuariosConfiguracion');
//cambiar contraseña
Route::put('user/actualizar/password/{user_id}', 'UserController@actualizarPassword');


//CRUD USERS
Route::resource('usuarios', 'UserController');
Route::resource('roles', 'RolesController');

Route::resource('parroquias', 'ParroquiasController');
//DATA salud
Route::resource('datasalud', 'DataSaludController');


// CEDULADOS //

Route::get('cedulados/{numcedula}/{lectura}', 'CeduladosController@show');


// SUBIR
Route::resource('convocados_patrias', 'ConvocadosPatriasController');
Route::resource('estatus_convocados', 'EstatusConvocadosController');



//VACUNADOS 
Route::resource('vacunados', 'VacunadosController');
Route::get('vacunas/listado', 'VacunadosController@listadoVacunados');

Route::get('vacunas/listado/qr/completo', 'VacunadosController@listadoVacunadosQRCompleta');

Route::get('vacunas/cedula/{cedula}/{tipo_identificacion}', 'VacunadosController@cedulaVacunadosRegistrado');
Route::put('vacunas/dosis/{vacunado_id}', 'VacunadosController@actualizarDosis');

Route::get('vacunas/qr/{cedula}', 'VacunadosController@listadoVacunadosPorCedula');

Route::get('vacunas/excel/todos', 'VacunadosController@listadoVacunadosExcel');




Route::resource('vacunas_recibidas', 'VacunasRecibidasController');
Route::get('vacuna_recibida/excel/todos', 'VacunasRecibidasController@listadoExcel');




//roles estadal vacunados 

Route::get('vacunas/estadal/{estado_id}', 'VacunadosController@listadoVacunadosEstadal');
Route::get('vacunas/excel/estadal/{estado_id}', 'VacunadosController@listadoVacunadosExcelEstadalRol');


// ROL REGISTRADOR

Route::get('vacunas/centro_salud/{centro_salud_id}', 'VacunadosController@listadoVacunadosPorCentroSalud');
Route::get('vacunas/excel/centro_salud/{centro_salud_id}', 'VacunadosController@listadoVacunadosExcelCentroSaludRol');




//VACUNADOS BUSCAR POR CEDULA EN TABLA PATRIA
Route::get('vacunados/patria/master/cedula/{cedula}/{centro_salud_id}', 'ConvocadosPatriasController@cedulaVacunadosRegistradoPatria');




// CENTRO SALUD //

Route::resource('centro_salud', 'CentroSaludController');
Route::get('centro_salud_list', 'CentroSaludController@centrosaludList');

Route::resource('estados','EstadoController');
Route::resource('municipios','MunicipioController');


//  CRUD 

Route::resource('etnias', 'EtniasController');
Route::resource('grupo_especiales', 'GrupoEspecialesController');
Route::resource('tipo_vacunas', 'TipoVacunasController');
Route::resource('pueblo_indigenas', 'PuebloIndigenasController');

Route::resource('vacunas_perdidas', 'VacunasPerdidasController');
Route::get('vacuna_perdida/excel/todos', 'VacunasPerdidasController@ExcelVacunasPerdidas');



//ESTADAL VACUNAS PERDIDAS//

Route::get('vacuna_perdida/listado/estadal/{estado_id}', 'VacunasPerdidasController@VacunasPerdidasEstado');

Route::get('vacuna_perdida/excel/estadal/{estado_id}', 'VacunasPerdidasController@VacunasPerdidasEstadoExcel');


//CENTRO SALUD VACUNAS PERDIDAS //
Route::get('vacuna_perdida/listado/centro_salud/{centro_salud_id}', 'VacunasPerdidasController@VacunasPerdidasCentroSalud');

Route::get('vacuna_perdida/excel/centro_salud/{centro_salud_id}', 'VacunasPerdidasController@VacunasPerdidasCentroSalud');






















//////// REPORTES //////////////
//VACUNADOS //

Route::get('vacunas/reportes/dosis1/fecha/{fecha1}/{fecha2}', 'VacunadosController@reportePorFechasDosis1');

Route::get('vacunas/reportes/dosis1/estados/fecha/{estado_id}/{fecha1}/{fecha2}', 'VacunadosController@reportePorFechasDosis1PorEstados');

Route::get('vacunas/reportes/edad/general', 'VacunadosController@reportePorEdadVacunadosGeneral');
Route::get('vacunas/reportes/edad/estadal/{estado_id}', 'VacunadosController@reportePorEdadVacunadosEstados');

// REPORTE CENTRO SALUD VACUNADOS POR EDAD ROL Registrador
Route::get('vacunas/reportes/edad/centro_salud/{centro_salud_id}', 'VacunadosController@reportePorEdadVacunadosCentroSalud');


// 5 REPORTES PARA EL MINISTRO //
Route::get('vacunas/reportes/total/dosis/sexo', 'VacunadosController@reporteSexoTotalDosis');
Route::get('vacunas/reportes/total/dosis', 'VacunadosController@reporteTotalDosis');
Route::get('vacunas/reportes/total/dosis/grupo_especial', 'VacunadosController@reporteGrupoEspecialesTotalDosis');
Route::get('vacunas/reportes/total/dosis/etnias', 'VacunadosController@reporteEtniasTotalDosis');
Route::get('vacunas/reportes/total/dosis/indigenas', 'VacunadosController@reportePuebloIndgineasTotalDosis');






// REPORTES ESPECIAL 3032021 GENERAL VACUNADOS //

Route::get('vacunas/reportes/especial/sexo', 'VacunadosController@reporteEspecialGeneralPorSexo');
Route::get('vacunas/reportes/especial/edades', 'VacunadosController@reporteEspecialGeneralPorEdades');
Route::get('vacunas/reportes/especial/estados', 'VacunadosController@reporteEspecialGeneralPorEstados');

Route::get('vacunas/reportes/especial/general/sumatoria', 'VacunadosController@ReporteEspecialSumatoriaGeneralVacunadosGeneral');




// REPORTES ESPECIAL 06/04/2021 GENERAL VACUNADOS CON WHERE //
Route::get('vacunas/reportes/especial/sexo/where/{tipo_vacuna_id}', 'VacunadosController@reporteEspecialGeneralPorSexoWhere');
Route::get('vacunas/reportes/especial/edades/where/{tipo_vacuna_id}', 'VacunadosController@reporteEspecialGeneralPorEdadesWhere');
Route::get('vacunas/reportes/especial/estados/where/{tipo_vacuna_id}', 'VacunadosController@reporteEspecialGeneralPorEstadosWhere');
Route::get('vacunas/reportes/especial/general/sumatoria/where/{tipo_vacuna_id}', 'VacunadosController@ReporteEspecialSumatoriaGeneralVacunadosGeneralWhere');





// importar excel
// Route::post('import', 'InventarioController@import')->name('import');


// importar excel
 Route::post('import', 'ConvocadosPatriasController@import')->name('import');
