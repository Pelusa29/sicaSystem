<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
