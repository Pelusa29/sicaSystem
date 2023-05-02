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
        $nIdUsuario = $request->nIdUsuario;
        $cNombre    = $request->cNombre;
        $cUsuario   = $request->cUsuario;
        $cCorreo    = $request->cCorreo;
        $cEstado    = $request->cEstado;

        $nIdUsuario = ($nIdUsuario == NULL) ? ($nIdUsuario = 0) : $nIdUsuario;
        $cNombre    = ($cNombre == NULL) ? ($cNombre      = '')  : $cNombre;
        $cUsuario   = ($cUsuario == NULL) ? ($cUsuario    = '')  : $cUsuario;
        $cCorreo    = ($cCorreo == NULL) ? ($cCorreo      = '')  : $cCorreo;
        $cEstado    = ($cEstado == NULL) ? ($cEstado      = '')  : $cEstado;

        $rpta = DB::select('call sp_Usuario_getListUsuarios(?,?,?,?,?)',[$nIdUsuario,$cNombre,$cUsuario,$cCorreo,$cEstado]);

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

        return $rpta[0]->nIdUsuario;
    }

    public function setEditarUsuario(Request $request){
        if(!$request->ajax()) return redirect('');

        $nIdUsuario         = $request->nIdUsuario;
        $cPrimerNombre      = $request->cPrimerNombre;
        $cSegundoNombre     = $request->cSegundoNombre;
        $cApellido          = $request->cApellido;
        $cUsuario           = $request->cUsuario;
        $cCorreo            = $request->cCorreo;
        $cContrasena        = $request->cContrasena;
        if($cContrasena != NULL) {
            $cContrasena        = Hash::make($request->cContrasena);
        }

        $oFotografia        = $request->oFotografia;

        $nIdUsuario         = ($nIdUsuario == NULL) ? ($nIdUsuario = '') : $nIdUsuario;
        $cPrimerNombre      = ($cPrimerNombre == NUll) ? ($cPrimerNombre = ''): $cPrimerNombre;
        $cSegundoNombre     = ($cSegundoNombre == NUll) ? ($cSegundoNombre = ''): $cSegundoNombre;
        $cApellido          = ($cApellido == NUll) ? ($cApellido = ''): $cApellido;
        $cUsuario           = ($cUsuario == NUll) ? ($cUsuario = ''): $cUsuario;
        $cCorreo            = ($cCorreo == NUll) ? ($cCorreo = ''): $cCorreo;
        $cContrasena        = ($cContrasena == NUll) ? ($cContrasena = ''): $cContrasena;
        $oFotografia        = ($oFotografia == NUll) ? ($oFotografia = null): $oFotografia;

        //Store
        $rpta = DB::select('call sp_Usuario_setEditarUsuario(?,?,?,?,?,?,?,?)',
        [
            $nIdUsuario,
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

    public function setCambiaEstadoUsuario(Request $request){
        if(!$request->ajax()) return redirect('');

        $nIdUsuario   = $request->nIdUsuario;
        $cEstado      = $request->cEstado;

        $nIdUsuario   = ($nIdUsuario == NULL) ? ($nIdUsuario = 0) : $nIdUsuario;
        $cEstado      = ($cEstado == NUll) ? ($cEstado = 0): $cEstado;

        $rpta = DB::select('call sp_Usuario_setCambiarEstadoUsuario(?,?)',
        [
            $nIdUsuario,
            $cEstado
        ]);

    }

    public function setEditarRolByUsuario(Request $request){
         if(!$request->ajax()) return redirect('');

        $nIdUsuario         = $request->nIdUsuario;
        $nIdRol             = $request->nIdRol;


        $nIdUsuario     = ($nIdUsuario == NUll) ? ($nIdUsuario = ''): $nIdUsuario;
        $nIdRol         = ($nIdRol == NUll) ? ($nIdRol = ''): $nIdRol;

        //Store
        $rpta = DB::select('call sp_Usuario_setEditarRolByUsuario(?,?)',
        [
            $nIdUsuario,
            $nIdRol
        ]);
    }

}
