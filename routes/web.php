<?php

use Illuminate\Support\Facades\Route;

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

##Usuario
Route::get('/administracion/usuario/getListUsuarios','Administracion\UsersController@getListUsuarios');
Route::post('/administracion/usuario/setRegistrarUsuario','Administracion\UsersController@setRegistrarUsuario');
Route::post('/administracion/usuario/setEditarUsuario','Administracion\UsersController@setEditarUsuario');
Route::post('/administracion/usuario/setCambiaEstadoUsuario','Administracion\UsersController@setCambiaEstadoUsuario');

##Rol
Route::get('/administracion/rol/getListRoles','Administracion\RolesController@getListRoles');
Route::get('/administracion/rol/getListPermisosByRol','Administracion\RolesController@getListPermisosByRol');
Route::post('/administracion/rol/setRegistraRolPermisos','Administracion\RolesController@setRegistraRolPermisos');
Route::post('/administracion/rol/setEditarRolPermisos','Administracion\RolesController@setEditarRolPermisos');

##Permisos
Route::get('/administracion/permiso/getListPermisos','Administracion\PermissionController@getListPermisos');
Route::post('/administracion/permiso/setRegistraPermiso','Administracion\PermissionController@setRegistraPermiso');
Route::post('/administracion/permiso/setEditarPermiso','Administracion\PermissionController@setEditarPermiso');

##Files
Route::post('/archivo/setRegistrarArchivo','FilesController@setRegistrarArchivo');

Route::get('/{optional?}', function () {
    return view('app');
})->name('basepath')
->where('optional','.*');
