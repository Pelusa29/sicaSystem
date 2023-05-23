<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

##Authenticate
Route::post('/authenticate/login','Auth\LoginController@login');
Route::post('/authenticate/logout','Auth\LoginController@logout');
##Auth
Route::middleware('auth')->get('/getUsuarioAutenticado',function(){
    return true;
});
Route::group(['middleware'=> ['auth']], function(){

    Route::get('/authenticate/getRefrescarUsuarioAutenticado', function(){
        return Auth::user()->load('file');
    });

    ##Usuario
    Route::get('/administracion/usuario/getListUsuarios','Administracion\UsersController@getListUsuarios');
    Route::post('/administracion/usuario/setRegistrarUsuario','Administracion\UsersController@setRegistrarUsuario');
    Route::post('/administracion/usuario/setEditarUsuario','Administracion\UsersController@setEditarUsuario');
    Route::post('/administracion/usuario/setCambiaEstadoUsuario','Administracion\UsersController@setCambiaEstadoUsuario');
    Route::post('/administracion/usuario/setEditarRolByUsuario','Administracion\UsersController@setEditarRolByUsuario');
    Route::get('/administracion/usuario/getRolByUsuario','Administracion\UsersController@getRolByUsuario');
    Route::get('/administracion/usuario/getListPermisosByRolAsignado','Administracion\UsersController@getListPermisosByRolAsignado');
    Route::get('/administracion/usuario/getListPermisosByUsuario','Administracion\UsersController@getListPermisosByUsuario');
    Route::post('/administracion/usuario/setRegistraPermisosByUsuario','Administracion\UsersController@setRegistraPermisosByUsuario');

    ##Rol
    Route::get('/administracion/rol/getListRoles','Administracion\RolesController@getListRoles');
    Route::get('/administracion/rol/getListPermisosByRol','Administracion\RolesController@getListPermisosByRol');
    Route::post('/administracion/rol/setRegistraRolPermisos','Administracion\RolesController@setRegistraRolPermisos');
    Route::post('/administracion/rol/setEditarRolPermisos','Administracion\RolesController@setEditarRolPermisos');

    ##Permisos
    Route::get('/administracion/permiso/getListPermisos','Administracion\PermissionController@getListPermisos');
    Route::post('/administracion/permiso/setRegistraPermiso','Administracion\PermissionController@setRegistraPermiso');
    Route::post('/administracion/permiso/setEditarPermiso','Administracion\PermissionController@setEditarPermiso');

    ##Seguros
    Route::get('/configuracion/seguro/getListSeguros','Configuracion\SeguroController@getListSeguros');
    Route::post('/configuracion/seguro/setRegistraSeguro','Configuracion\SeguroController@setRegistraSeguro');
    Route::get('/configuracion/seguro/getSeguroById','Configuracion\SeguroController@getSeguroById');
    Route::get('/configuracion/seguro/getListadoSeguros','Configuracion\SeguroController@getListadoSeguros');

    ##Tipo Unidades
    Route::get('/configuracion/catunidades/getListTipoUnidades','Configuracion\TruckController@getListTipoUnidades');
    Route::get('/configuracion/catunidades/getTipoGirosList','Configuracion\TruckController@getTipoGirosList');
    Route::post('/configuracion/catunidades/setRegistraTipoUnidad','Configuracion\TruckController@setRegistraTipoUnidad');
    Route::get('/configuracion/catunidades/getTipoUnidad','Configuracion\TruckController@getTipoUnidad');
    Route::post('/configuracion/catunidades/setEditarTipoUnidad','Configuracion\TruckController@setEditarTipoUnidad');

    ##Placas
    Route::get('/configuracion/placa/getListPlacas','Configuracion\PlacaController@getListPlacas');
    Route::get('/configuracion/placa/getListaUnidades','Configuracion\PlacaController@getListaUnidades');
    Route::post('/configuracion/placa/setRegistraPlaca','Configuracion\PlacaController@setRegistraPlaca');
    Route::get('/configuracion/placa/getPlacaById','Configuracion\PlacaController@getPlacaById');
    Route::get('/configuracion/placa/getListadoPlacas','Configuracion\PlacaController@getListadoPlacas');
    Route::post('/configuracion/placa/setEditarPlaca','Configuracion\PlacaController@setEditarPlaca');

    ##Inventarios
    Route::get('/configuracion/catinventario/getListInventario','Configuracion\InventoryController@getListInventario');
    Route::get('/configuracion/catinventario/getTipoInventario','Configuracion\InventoryController@getTipoInventario');
    Route::post('/configuracion/catinventario/setRegistraInventario','Configuracion\InventoryController@setRegistraInventario');

    ##Employs
    Route::get('/administracion/employ/getListEmpleados','Administracion\EmployController@getListEmpleados');
    Route::post('/administracion/employ/setRegistrarEmpleado','Administracion\EmployController@setRegistrarEmpleado');

    ##Conductores
    Route::get('/administracion/conductor/getListConductores','Administracion\ConductorController@getListConductores');
    Route::post('/administracion/conductor/setRegistrarConductor','Administracion\ConductorController@setRegistrarConductor');
    Route::post('/administracion/conductor/setCambiaEstadoConductor','Administracion\ConductorController@setCambiaEstadoConductor');
    Route::get('/administracion/conductor/getConductorById','Administracion\ConductorController@getConductorById');
    Route::post('/administracion/conductor/setEditarConductor','Administracion\ConductorController@setEditarConductor');


    ##Clientes
    Route::get('/administracion/cliente/getListClientes','Administracion\ClienteController@getListClientes');
    Route::post('/administracion/cliente/setRegistrarCliente','Administracion\ClienteController@setRegistrarCliente');
    Route::post('/administracion/cliente/setCambiaEstadoCliente','Administracion\ClienteController@setCambiaEstadoCliente');
    Route::get('/administracion/cliente/getListadoConductores','Administracion\ClienteController@getListadoConductores');
    Route::get('/administracion/cliente/getListadoClientestotal','Administracion\ClienteController@getListadoClientestotal');
    Route::get('/administracion/cliente/getListadoClientesByTipo','Administracion\ClienteController@getListadoClientesByTipo');
    Route::get('/administracion/cliente/getSearchInfoByConductor','Administracion\ClienteController@getSearchInfoByConductor');

    ##Unidades
    Route::get('/configuracion/unidad/getListUnidades','Configuracion\UnidadController@getListUnidades');
    Route::get('/configuracion/unidad/getListadoTipoUnidades','Configuracion\UnidadController@getListadoTipoUnidades');
    Route::post('/configuracion/unidad/setRegistraUnidad','Configuracion\UnidadController@setRegistraUnidad');
    Route::get('/configuracion/unidad/getUnidadById','Configuracion\UnidadController@getUnidadById');
    Route::post('/configuracion/unidad/setEditarUnidad','Configuracion\UnidadController@setEditarUnidad');
    Route::post('/archivo/setAdjuntarDocumento','FilesController@setAdjuntarDocumento');
    Route::get('/configuracion/unidad/getListDocumentos','Configuracion\UnidadController@getListDocumentos');


    ##Contratos
    Route::get('/operacion/contrato/getListContratostaxi','Operacion\ContratoController@getListContratostaxi');
    Route::post('/operacion/contrato/setRegistraContrato','Operacion\ContratoController@setRegistraContrato');
    Route::post('/operacion/contrato/setRegistraContratotaxi','Operacion\ContratoController@setRegistraContratotaxi');
    Route::get('/operacion/contrato/setBuscarDataContrato','Operacion\ContratoController@setBuscarDataContrato');
    Route::post('/operacion/contrato/setEditarContratotaxi','Operacion\ContratoController@setEditarContratotaxi');
    Route::post('/operacion/contrato/setGenerardocumento','Operacion\ContratoController@setGenerardocumento');

    ##Contratos diarios
    Route::get('/operacion/contratodiario/getListContratosdiarios','Operacion\ContratoController@getListContratosdiarios');
    Route::post('/operacion/contratodiario/setRegistraContratodiario','Operacion\ContratoController@setRegistraContratodiario');
    Route::get('/operacion/contratodiario/setBuscarDataContratoDiario','Operacion\ContratoController@setBuscarDataContratoDiario');
    Route::post('/operacion/contratodiario/setActualizaContratodiario','Operacion\ContratoController@setActualizaContratodiario');
    Route::post('/operacion/contratodiario/setGenerardocumento','Operacion\ContratoController@setGenerardocumentodiario');
    ##Files
    Route::post('/archivo/setRegistrarArchivo','FilesController@setRegistrarArchivo');

});

Route::get('/{optional?}', function () {
        return view('app');
    })->name('basepath')
    ->where('optional','.*');

