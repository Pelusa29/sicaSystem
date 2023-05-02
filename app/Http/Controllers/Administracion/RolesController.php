<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\PayUService\Exception;

class RolesController extends Controller
{
     public function getListRoles(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdRol     = $request->nIdRol;
        $cNombre    = $request->cNombre;
        $cSlug      = $request->cUrl;

        $nIdRol     = ($nIdRol == NULL) ? ($nIdRol = 0) : $nIdRol;
        $cNombre    = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cSlug      = ($cSlug == NULL) ? ($cSlug      = '')  : $cSlug;


        $rpta = DB::select('call sp_Rol_getListRoles(?,?,?)',[$nIdRol,$cNombre,$cSlug]);

        return $rpta;
    }

    public function getListPermisosByRol(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdRol     = $request->nIdRol;
        $nIdRol     = ($nIdRol == NULL) ? ($nIdRol = 0) : $nIdRol;

        $rpta =  DB::select('call sp_Rol_getListPermisosByRol(?)',[$nIdRol]);


        return $rpta;
    }

    public function setRegistraRolPermisos(Request $request){
        if(!$request->ajax()) return redirect('');

        $cNombre    = $request->cNombre;
        $cSlug      = $request->cSlug;

        $cNombre    = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cSlug      = ($cSlug == NULL) ? ($cSlug      = '')  : $cSlug;

        //transaction
        try {
            DB::beginTransaction();

            $rpta = DB::select('call sp_Rol_setRegistraRolPermisos(?,?)',[$cNombre,$cSlug]);
            $nIdRol = $rpta[0]->nIdRol;

           $listPermisos       = $request->listPermisosFilter;
            $listPermisosSize   = sizeof($listPermisos);
            if($listPermisosSize > 0){
                foreach ($listPermisos as $key => $value) {
                    if($value['checked'] == true){
                        DB::select('call sp_Rol_setRegistraRolPermisoSelected(?,?)',
                        [
                            $nIdRol,
                            $value['id']
                        ]);
                    }
                }
            }
            //Commit
            DB::commit();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            print_r($e->getMessage());
        }

    }

    public function setEditarRolPermisos(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdRol     = $request->nIdRol;
        $cNombre    = $request->cNombre;
        $cSlug      = $request->cSlug;

        $nIdRol        = ($nIdRol == NULL) ? ($nIdRol = '') : $nIdRol;
        $cNombre        = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cSlug          = ($cSlug == NULL) ? ($cSlug      = '')  : $cSlug;

        //transaction
        try {
            DB::beginTransaction();

            $rpta = DB::select('call sp_Rol_setEditarRolPermisos(?,?,?)',[$nIdRol,$cNombre,$cSlug]);

            $listPermisos       = $request->listPermisosFilter;
            $listPermisosSize   = sizeof($listPermisos);
            if($listPermisosSize > 0){
                foreach ($listPermisos as $key => $value) {
                    if($value['checked'] == true){
                        DB::select('call sp_Rol_setRegistraRolPermisoSelected(?,?)',
                        [
                            $nIdRol,
                            $value['id']
                        ]);
                    }
                }
            }
            //Commit
            DB::commit();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            print_r($e->getMessage());
        }
    }
}
