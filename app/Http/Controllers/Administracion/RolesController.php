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

        $cNombre    = $request->cNombre;
        $cSlug      = $request->cUrl;

        $cNombre    = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cSlug      = ($cSlug == NULL) ? ($cSlug      = '')  : $cSlug;


        $rpta = DB::select('call sp_Rol_getListRoles(?,?)',[$cNombre,$cSlug]);

        return $rpta;
    }

    public function getListPermisosByRol(Request $request){
        if(!$request->ajax()) return redirect('');

        $rpta =  DB::select('call sp_Rol_getListPermisosByRol');


        return $rpta;
    }

    public function setRegistraRolPermisos(Request $request){
        if(!$request->ajax()) return redirect('');

        $cNombre    = $request->cNombre;
        $cSlug      = $request->cSlug;

        var_dump($request->listPermisosFilter);

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
}
