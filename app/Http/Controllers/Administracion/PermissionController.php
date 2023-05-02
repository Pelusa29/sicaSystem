<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\PayUService\Exception;

class PermissionController extends Controller
{
    public function getListPermisos(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdPermiso     = $request->nIdPermiso;
        $cNombre    = $request->cNombre;
        $cSlug      = $request->cUrl;

        $nIdPermiso     = ($nIdPermiso == NULL) ? ($nIdPermiso = 0) : $nIdPermiso;
        $cNombre    = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cSlug      = ($cSlug == NULL) ? ($cSlug      = '')  : $cSlug;


        $rpta = DB::select('call sp_Permiso_getListPermisos(?,?,?)',[$nIdPermiso,$cNombre,$cSlug]);

        return $rpta;
    }

    public function setRegistraPermiso(Request $request){

        if(!$request->ajax()) return redirect('');

        $cNombre    = $request->cNombre;
        $cSlug      = $request->cSlug;


        $cNombre    = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cSlug      = ($cSlug == NULL) ? ($cSlug      = '')  : $cSlug;


        DB::select('call sp_Permiso_setRegistraPermiso(?,?)',[$cNombre,$cSlug]);
    }
}
