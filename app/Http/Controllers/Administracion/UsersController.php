<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function getListUsuarios(Request $request){
        if(!$request->ajax()) return redirect('');

        $cNombre    = $request->cNombre;
        $cUsuario   = $request->cUsuario;
        $cCorreo    = $request->cCorreo;
        $cEstado    = $request->cEstado;

        $cNombre    = ($cNombre == NULL) ? ($cNombre      = '') : $cNombre;
        $cUsuario   = ($cUsuario == NULL) ? ($cUsuario    = '') : $cUsuario;
        $cCorreo    = ($cCorreo == NULL) ? ($cCorreo      = '') : $cCorreo;
        $cEstado    = ($cEstado == NULL) ? ($cEstado      = '') : $cEstado;

        $rpta = DB::select('call sp_Usuario_getListUsuarios(?,?,?,?)',[$cNombre,$cUsuario,$cCorreo,$cEstado]);

        return $rpta;
    }

    public function setRegistrarUsuario(Request $request){
        if(!$request->ajax()) return redirect('');

        $cPrimerNombre      = $request->cPrimerNombre;
        $cSegundoNombre     = $request->cSegundoNombre;
        $cApellido          = $request->cApellido;
        $cUsuario           = $request->cUsuario;
        $cCorreo            = $request->cCorreo;
        $cContrasena        = Hash::make($request->cContrasena);
        $oFotografia        = $request->oFotografia;


        $cPrimerNombre      = ($cPrimerNombre == NUll) ? ($cPrimerNombre = ''): $cPrimerNombre;
        $cSegundoNombre     = ($cSegundoNombre == NUll) ? ($cSegundoNombre = ''): $cSegundoNombre;
        $cApellido          = ($cApellido == NUll) ? ($cApellido = ''): $cApellido;
        $cUsuario           = ($cUsuario == NUll) ? ($cUsuario = ''): $cUsuario;
        $cCorreo            = ($cCorreo == NUll) ? ($cCorreo = ''): $cCorreo;
        $cContrasena        = ($cContrasena == NUll) ? ($cContrasena = ''): $cContrasena;
        $oFotografia        = ($oFotografia == NUll) ? ($oFotografia = null): $oFotografia;

        //Store
        $rpta = DB::select('call sp_Usuario_setRegistrarUsuario(?,?,?,?,?,?,?)',
        [
            $cPrimerNombre,
            $cSegundoNombre,
            $cApellido,
            $cUsuario,
            $cCorreo,
            $cContrasena,
            $oFotografia
        ]);

        return $rpta;
    }

}
