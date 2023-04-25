<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function getListUsuarios(Request $request){
        if(!$request->ajax()) return redirect('');

        $cNombre    = $request->cNombre;
        $cUsuario   = $request->cUsuario;
        $cCorreo    = $request->cCorreo;
        $cEstado    = $request->cEstado;

        $cNombre    = ($cNombre == NULL) ? ($cNombre = null) : $cNombre;
        $cUsuario   = ($cUsuario == NULL) ? ($cUsuario = null) : $cUsuario;
        $cCorreo    = ($cCorreo == NULL) ? ($cCorreo = null) : $cCorreo;
        $cEstado    = ($cEstado == NULL) ? ($cEstado = null) : $cEstado;

        $rpta = DB::select('call sp_Usuario_getListUsuarios(?,?,?,?)',[$cNombre,$cUsuario,$cCorreo,$cEstado]);

        return $rpta;
    }

}
