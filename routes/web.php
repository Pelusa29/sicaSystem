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
##Auth
Route::group(['middleware'=> ['auth']], function(){
    Route::post('/authenticate/logout','Auth\LoginController@logout');

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

    ##Tipo Unidades
    Route::get('/configuracion/catunidades/getListTipoUnidades','Configuracion\TruckController@getListTipoUnidades');
    Route::post('/configuracion/catunidades/setRegistraTipoUnidad','Configuracion\TruckController@setRegistraTipoUnidad');
    Route::get('/configuracion/catunidades/getTipoUnidad','Configuracion\TruckController@getTipoUnidad');
    Route::post('/configuracion/catunidades/setEditarTipoUnidad','Configuracion\TruckController@setEditarTipoUnidad');

    ##Files
    Route::post('/archivo/setRegistrarArchivo','FilesController@setRegistrarArchivo');
});
Route::get('/{optional?}', function () {
    return view('app');
})->name('basepath')
->where('optional','.*');
