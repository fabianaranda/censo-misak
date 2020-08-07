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

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/set_language/{lang}', 'Controller@set_language')->name('set_language');

Route::middleware(['auth'])->group(function () {
	

/* 
|--------------------------------------------------------------------------
|              MENU LATERIAL DE LAS VISTAS DE CENSO POBLACIONAL
|
*/

		//Route menu lateral de los furmulario del censo poblacional ////
	 
	   Route:: get('/menu-lateral2',function(){
		return view('menu_lateral.menu_lateral_informacion');
   });
 
	   		 

/*
|--------------------------------------------------------------------------
|                            CENSO VIVIENDA  
|
*/

Route:: get("/menu-lateral/{porcentaje}", function ($porcentaje)
{
   return view('menu_lateral.MenuIzquierdoCensoSIPESM', [
	   'porcentaje' => $porcentaje
   ]);
});
Route::middleware(['Autorizar:1'])->group(function () {
	// Modulo del Censo Poblacional
	Route::get('/censo-poblacional', function() {
		return view('interfaces.censopoblacional');
	});
	// Modulo Vivienda
	Route::get('/censo-poblacional/vivienda','ViviendaController@index')->name('vivienda');
	Route::post('/censo-poblacional/vivienda', 'ViviendaController@store')->name('vivienda.store');
	Route::get('/censo-poblacional/vivienda/{id_vivienda}','ViviendaController@indexById')->name('vivienda.id');
	// Modulo de Familia
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia','FamiliaController@index')->name('vivienda.familia');
	Route::post('/censo-poblacional/vivienda/{id_vivienda}/familia','FamiliaController@store')->name('vivienda.familia.store');
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_hogar}','FamiliaController@indexById')->name('vivienda.familia');
	// Modulo De Miembros de la familia
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/miembros', 'FamiliaController@miembros_familia')->name('vivienda.familia.mimbros');
	Route::post('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/miembros', 'FamiliaController@create_grupo_familiar')->name('vivienda.familia.mimbros.store');
	Route::post('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/miembros/validar-existencia', 'FamiliaController@validarExistenciaPersona')->name('vivienda.familia.mimbros.store');
	//Modulo del censo de personas
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/censo', 'PersonasController@index')->name('vivienda.familia.mimbros.censo');
	Route::post('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/verificar-estado-censo', 'PersonasController@verificarEstadoCenso')->name('vivienda.familia.mimbros.censo.verificar');
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/censo/{id_persona}', 'PersonasController@show')->name('vivienda.familia.mimbros.censo.persona');
	Route::post('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/censo/{id_persona}', 'PersonasController@store')->name('vivienda.familia.mimbros.censo.persona.store');
	//Modulos De la Educación de las personas
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/censo/{id_persona}/educacion-formal', 'EducacionFormalController@index');
	Route::post('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/censo/{id_persona}/educacion-formal', 'EducacionFormalController@store');
	Route::delete('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/censo/{id_persona}/educacion-formal', 'EducacionFormalController@destroy');
	Route::get('/educacion-formal/consultarmunicipios/{id_departamento}','EducacionFormalController@ConsultarMunicipios');
	Route::get('/educacion-formal/consultarcolegios/{id_municipio}','EducacionFormalController@ConsultarColegios');
	Route::get('/educacion-formal/consultarsedes/{id_colegio}','EducacionFormalController@ConsultarSedes');
	Route::get('/educacion-formal/consultartiposeducacion/{id_sede}','EducacionFormalController@ConsultarTiposEducacion');
	//Modulos Informativos del censo
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/censo/{id_persona}/resumen', 'PersonasController@resumen_censo');
	Route::get('/censo-poblacional/vivienda/{id_vivienda}/familia/{id_familia}/certificado-censo','PersonasController@certificado_censo')->name('certificado-Censo');
	Route::post('/consultar-vivienda-persona','PersonasController@consultar_vivienda_persona')->name('persona.vivienda');
});

Route::middleware(['Autorizar:4'])->group(function () {
	//Modulo de actualizacion de datos
	Route::post('/Actualizacion-informacion-general', 'PersonasController@actualizar_informacion_general_persona');
	Route::post('/Actualizacion-informacion-general/{id}/actualizar','PersonasController@update');
	Route::post('/Actualizacion-informacion-general/{id}/educacion-superior','PersonasController@update_educacion_superior');
	Route::get('/Actualizacion-informacion-general/{id}/actualizar','PersonasController@vista_actualizacion_datos_personales');
	Route::get('/Actualizacion-informacion-general','PersonasController@vista_consulta_actualizacion_general')->name('Actualizacion-datos');
	Route::get('/descargar-documento/{id_persona}','PersonasController@descargarDocumento');
});

 

Route::get('Vivienda-Hogar_persona/{id_persona}','DireccionViviendaHogarController@direccion_Hogar_Vivienda_persona')->name('Vivienda-Hogar_persona');
Route::get('get-municipio-list','DireccionViviendaHogarController@getmunicipio');
Route::get('get-resguardo-list','DireccionViviendaHogarController@getresguardo');
Route::get('get-zona-list','DireccionViviendaHogarController@getzona');
Route::get('get-vereda-list','DireccionViviendaHogarController@getvereda');
Route::get('get-sector-list','DireccionViviendaHogarController@getsector');

/*

|--------------------------------------------------------------------------
|                            CENSO HOGAR    
|
*/

// Route::get('Hogar','InterfacesController@interfas_hogar')->name ('Hogar');
Route::POST('Vivienda-Hogar/Guardado', 'HogarController@create_hogar');
Route::get('get-municipio-list','DireccionHogarController@getmunicipio');
Route::get('get-resguardo-list','DireccionHogarController@getresguardo');
Route::get('get-zona-list','DireccionHogarController@getzona');
Route::get('get-vereda-list','DireccionHogarController@getvereda');
Route::get('get-sector-list','DireccionHogarController@getsector');

/*
|--------------------------------------------------------------------------
|                        CENSO    PERSONAS DENTRO DE LA FAMILIA  Misak     
|
*/

Route::get('Personas', function () {
    return view('interfaces.personas');
});


/*
|--------------------------------------------------------------------------
|                        CENSO  INFORMACION PERSONA Misak  INGRESAR  a cada unu de los integrantes de la familia     
|
*/ 
/// ruta para guardar informacion persona 
  Route::POST('info_persona/Guardado', 'InfoformacionPersonaController@create_informacion_persona');


/*
|--------------------------------------------------------------------------
|                       CENSO  MENU EDUCACION FORMAL      
|
*/ 

Route::get('Menu-Educacion-Formal/{id_persona}','InterfacesController@interfas_menu_educacion_formal')->name ('Menu-Educacion-Formal');


/*
|--------------------------------------------------------------------------
|                       CENSO   EDUCACION FORMAL DE LA PERSONA     
|
*/ 
Route::POST('Educacion_Formal/Guardado', 'EducacionPersonaController@create_educacion_escuale_colegio');


//Route::get('Educacion_Formal','InterfacesController@interfas_educacion_formal')->name ('Educacion_Formal');

Route::get('Educacion_Formal/{id_persona}','ColeEscueDireccionController@direccion_escue_cole')->name ('Educacion_Formal');

Route::get('get-colegio-list','ColeEscueDireccionController@getcolegio');

Route::get('get-sede-list','ColeEscueDireccionController@getsede');

 Route::get('get-tipoE-list','ColeEscueDireccionController@gettipoE');

/*
|--------------------------------------------------------------------------
|                       CENSO   EDUCACION SUPERIOR DE LA PERSONA     
|
*/

Route::get('Educacion_Superior/{id_persona}','InterfacesController@interfas_educacion_superior')->name ('Educacion_Superior');
Route::POST('Educacion_Superior', 'EducacionSuperiorController@create_educacion_superior');

 /*                                                                       |   
|                                                                         |
|--------------------------------resumen del certificado por persona -----------------------|
|                                                                         |
|                                                                         | 
*/  
Route::get('Resumen-Censo-Personal/{id_persona}','InterfacesController@interfas_resomen_censo')->name ('Resumen-Censo-Personal');


 /*                                                                       |   
|                                                                         |
|--------------------------------CERTIFICADO CENSO POBLACIONAL-----------------------|
|                                                                         |
|                                                                         | 
*/  
Route::get('Certificado-Censo/{hogar_id}','InterfacesController@interfas_certifcado_censo_familiar')->name ('Certificado-Censo');



 /*                                                                       |   
|                                                                         |
|--------------------------------OPCION DE COSULTAS-----------------------|
|                                                                         |
|                                                                         | 
*/                                                                        

 /*
|--------------------------------------------------------------------------
|                               MENU DE CONSULTAS   
*/
Route::middleware(['Autorizar:2'])->group(function () {
	Route::get('Menu-Cunsultas','InterfacesController@interfas_menu_consulta')->name('Menu-Cunsultas');
///  modulo Buscar personas si se encuentdentro del sistema poblacional  
Route::post('/Informacion-Persona', 'PersonasController@buscar_informacion_general_persona');
Route::get('/Informacion-Persona/{id}','PersonasController@vista_informacion_total_personales')->name('Informacion-Persona');

Route::get('Informacion-Persona','PersonasController@interfas_cunsulta_persona')->name('Informacion-Persona');
Route::get('/descargar-documento/{id_persona}','PersonasController@descargarDocumento');
/// modulo buscar hogar 
Route::post('/Informacion-hogar', 'PersonasController@buscar_informacion_hogar_persona');
Route::get('/Informacion-hogar','PersonasController@interfas_cunsulta_hogar')->name('Informacion-hogar');
Route::get('Integrantes-hogar/{id_hogar}/Familia-Misak','PersonasController@total_personas_hogar')->name ('Integrantes-hogar');

//mudolo buscar vivienda
Route::post('/Informacion-vivienda', 'PersonasController@buscar_informacion_vivienda_persona');
Route::get('/Informacion-vivienda','PersonasController@interfas_cunsulta_vivienda')->name('Informacion-vivienda');
Route::get('Informacion-vivienda/{id_vivienda}/Vivienda-Misak','PersonasController@total_personas_vivienda')->name ('Informacion-vivienda');


}); 
   


/*
|--------------------------------------------------------------------------
|                              VISTA  ACTUALIZACION MENU 
*/

Route::get('Menu-Actualizacion','InterfacesController@vista_nemu_actualizacion')->name('Menu-Actualizacio');


 // VISTA ACTUALIZACION TABLA PERSONA ///
Route::get('Edit-Informacion/{id_persona}','InterfacesController@actualizacion_informacion_personas')->name('Edit-Informacion');




Route::resource('products','ProductController');


/*

|--------------------------------------------------------------------------
|             VISTA  NUEVA PERSONA DENTRO DE HOGAR (INGRESAR PERSONA CON CODIGO DEL HOGAR)
*/

Route::get('Ingreso-persona-Nocleo-familiar','InterfacesController@vista_nueva_persona_nucleo_familiar')->name('Ingreso-persona-Nocleo-familiar');

Route::post('Ingreso-persona-Nocleo-familiar', 'PersonasController@create_grupo_familiar');
/* */
/*

|--------------------------------------------------------------------------
|             VISTA  NUEVA HOGAR MISAK- ACTUALIZACIONES , INGREZAR UN NUEVO HOGAR , PERSONAS REGISTRADOS EN EL SISTEMA

*/
// Ruta, hogar familia, 
Route::get('Nuevo-Hogar-Misak','InterfacesController@vista_nuevo_hogar_nucleo_familiar')->name('Nuevo-Hogar-Misak');

//Route::POST('Vivienda-Hogar/Guardado', 'HogarController@create_hogar');
Route::get('Nuevo-Hogar-Misak','HogarNuevoController@direccion_Hogar');
Route::get('get-municipio-list','HogarNuevoController@getmunicipio');
Route::get('get-resguardo-list','HogarNuevoController@getresguardo');
Route::get('get-zona-list','HogarNuevoController@getzona');
Route::get('get-vereda-list','HogarNuevoController@getvereda');
Route::get('get-sector-list','HogarNuevoController@getsector');


/// Ruta para ingresar la nueva familia, Misak..
Route::get('Nueva-Familia-Misak/{id_Hogar}','InterfacesController@vista_nuevo_nucleo_familiar')->name('Nuevo-Hogar-Misak');




/*
|--------------------------------------------------------------------------
|                              VISTA  REPORTES 
*/
Route::middleware(['Autorizar:3'])->group(function () {
	Route::get('Menu-Reportes','InterfacesController@vista_menu_reporte')->name('Menu-Reportes');
		/*
	|--------------------------------------------------------------------------
	|                              VISTA  REPORTES  personas 
	*/

	Route::get('Reportes-Personas','InterfacesController@vista_reportes_personas')->name('Reportes-Personas');

	route::resource('Reportes-Personas','ReportesController');
	/*
	|--------------------------------------------------------------------------
	|                       VISTA  REPORTE CENSO GENERAL POBLACIONAL por   VIGENCIA 
	*/


	Route::get('Censo-general','InterfacesController@vista_censoGeneralVigencia')->name('Censo-general');

	//Route::any('Censo_general', 'InformacionCensoControlador@consulta_censo_ministerio');

	Route::get('Censo_general/download', 'PersonasController@descargar_reporte_censo');

	Route::get('Listado-personas-retirados','InterfacesController@vista_censoRetirados')->name('Listado-personas-retirados');
	Route::get('Listado-personas-fallecidos','InterfacesController@vista_censoFallecidos')->name('Listado-personas-fallecidos');
	
		
		/*
	|--------------------------------------------------------------------------
	|                       VISTA  REPORTE EDUCACION PROPIA  
	*/
	Route::get('Reporte-Educacion-Propia','InterfacesController@vista_reporte_educacion_propia')->name('Reporte-Educacion-Propia');

		/*
	|--------------------------------------------------------------------------
	|                       VISTA  REPORTE SALUD PROPIA  
	*/		
																																													
		Route:: get('/Reporte-Salud',function(){
			return view('reportes.reporteSaludPropia');
	});
});





   	/*
|--------------------------------------------------------------------------
|                       VISTA  MENU NOVEDAD RETIRO   
*/
Route::middleware(['Autorizar:5'])->group(function () {
	Route::get('Menu-Novedad','InterfacesController@vista_interfas_menu_novedad')->name('Menu-Novedad');
	// buscar persona fallecida 
	Route::get('Buscar-Persona-Fallecido/{documento}', 'NovedadController@showFallecido');
	Route::get('Buscar-Persona-Fallecido','NovedadController@indexFallecido')->name('Buscar-Persona-Fallecido');

	/// retiro  persona  fallecida 
	Route::get('Novedad-Persona-Fallecido/{id_persona}','NovedadController@viewNovedadFallecido')->name('Novedad-Persona-Fallecido');
	Route::post('/Novedad-Persona-Fallecido','NovedadController@storeFallecido');
	/// buscar retiro del censo, por traslado. 
	Route::get('Buscar-Persona-Retirar/{id_persona}', 'NovedadController@showRetirado');

	Route::get('Buscar-Persona-Retirar','NovedadController@indexRetirado')->name('Buscar-Persona-Retirar');


	Route::get('Novedad-Persona-Retirada/{id_persona}','NovedadController@viewNovedadRetirado')->name('Retiro-Censo-Poblacional');
	Route::post('/Novedad-Persona-Retirado','NovedadController@storeRetirado');

});



   	/*
|--------------------------------------------------------------------------
|                       VISTA  MENU   ADMINISTRADOR    
*/
Route::middleware(['Autorizar:6'])->group(function () {
	Route::get('/Menu-administrador','InterfacesController@Vista_interfas_menuAdminsitrador')->name('Menu-administrador');
	Route::get('/Validacion','NovedadController@viewSolicitudes')->name('Validacion');
	Route::get('/cambiar-estado-solicitud/{id_novedad}','NovedadController@cambiarEstadoSolicitud');
	Route::get('/descargar-acta/{id_novedad}','NovedadController@descargarActa');
	//Users
	Route::POST('users', 'UserController@store')->name('Ingresar_Usuarios.create');
	Route::get('Menu-Usuarios', 'UserController@index')->name('users.index');
	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

	Route::get('/Certificado-Retiro/{id_persona}','NovedadController@interfaz_certificado_retiro')->name('Certificado-Retiro');
});


/*
|--------------------------------------------------------------------------
|                       VISTA   INGRESAR USUARIOS     
*/

Route::get('listtar-personas', function () {

    return view('Ingresar_Persona');
});


Route::get('listtar-persons', 'datatablecontroller@getdate')->name('listtar-persons');

Route::get('/listtar-persons/estado/{id}/{estado}', 'datatablecontroller@cambiar_estadoPersona');


});

