<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Banco;

class BancoController extends Controller
{
    public function getListBancos(Request $request){
        if(!$request->ajax()) return redirect('');
        $cNombre        = $request->cNombre;
        $cNumcuenta     = $request->cNumcuenta;
        $cEstado        = $request->cEstado;

        $cNombre        = ($cNombre == NULL) ? ($cNombre  = '') : $cNombre;
        $cNumcuenta     = ($cNumcuenta == NULL) ? ($cNumcuenta  = '') : $cNumcuenta;
        $cEstado        = ($cEstado == NULL) ? ($cEstado    = '')  : $cEstado;


        $rpta = DB::select('call sp_Banco_getListBancos(?,?,?)',[$cNombre,$cNumcuenta,$cEstado]);

        return $rpta;

    }
    public function setRegistraBanco(Request $request){
        if(!$request->ajax()) return redirect('');
        $cNombreBanco       = $request->cNombreBanco;
        $cNumCuenta         = $request->cNumCuenta;
        $cNumeroTarjeta     = $request->cNumeroTarjeta;
        $cTitularCuenta     = $request->cTitularCuenta;
        $cFechaCorte        = $request->cFechaCorte;
        $cTipoCuenta        = $request->cTipoCuenta;

        $cNombreBanco       = ($cNombreBanco == NULL) ? ($cNombreBanco  = '') : $cNombreBanco;
        $cNumCuenta         = ($cNumCuenta == NULL) ? ($cNumCuenta  = '') : $cNumCuenta;
        $cNumeroTarjeta     = ($cNumeroTarjeta == NULL) ? ($cNumeroTarjeta  = '') : $cNumeroTarjeta;
        $cTitularCuenta     = ($cTitularCuenta == NULL) ? ($cTitularCuenta  = '') : $cTitularCuenta;
        $cFechaCorte        = ($cFechaCorte == NULL) ? ($cFechaCorte  = '') : $cFechaCorte;
        $cTipoCuenta        = ($cTipoCuenta == NULL) ? ($cTipoCuenta  = '') : $cTipoCuenta;

        $rpta = DB::select('call sp_Banco_setRegistraBanco(?,?,?,?,?,?)',[$cNombreBanco,$cNumCuenta,$cNumeroTarjeta,$cTitularCuenta,$cFechaCorte,$cTipoCuenta]);
    }

    public function getBancoEdit(Request $request){
        if(!$request->ajax()) return redirect('');

        $nIdBanco        = $request->nIdBanco;

        $nIdBanco        = ($nIdBanco == NULL) ? ($nIdBanco  = 0) : $nIdBanco;

        $rpta = DB::select('call sp_Banco_getBancoEdit(?)',[$nIdBanco]);

        return $rpta;
    }


    public function setEditarBanco(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdBanco           = $request->nIdBanco;
        $cNombreBanco       = $request->cNombreBanco;
        $cNumCuenta         = $request->cNumCuenta;
        $cNumeroTarjeta     = $request->cNumeroTarjeta;
        $cTitularCuenta     = $request->cTitularCuenta;
        $cFechaCorte        = $request->cFechaCorte;
        $cTipoCuenta        = $request->cTipoCuenta;

        $nIdBanco           = ($nIdBanco == NULL) ? ($nIdBanco = 0) : $nIdBanco;
        $cNombreBanco       = ($cNombreBanco == NULL) ? ($cNombreBanco  = '') : $cNombreBanco;
        $cNumCuenta         = ($cNumCuenta == NULL) ? ($cNumCuenta  = '') : $cNumCuenta;
        $cNumeroTarjeta     = ($cNumeroTarjeta == NULL) ? ($cNumeroTarjeta  = '') : $cNumeroTarjeta;
        $cTitularCuenta     = ($cTitularCuenta == NULL) ? ($cTitularCuenta  = '') : $cTitularCuenta;
        $cFechaCorte        = ($cFechaCorte == NULL) ? ($cFechaCorte  = '') : $cFechaCorte;
        $cTipoCuenta        = ($cTipoCuenta == NULL) ? ($cTipoCuenta  = '') : $cTipoCuenta;


         $rpta = DB::select('call sp_Banco_setEditarBanco(?,?,?,?,?,?,?)',[$nIdBanco,$cNombreBanco,$cNumCuenta,$cNumeroTarjeta,$cTitularCuenta,$cFechaCorte,$cTipoCuenta]);

    }

    public function setCambiarEstadoBanco(Request $request){
        if(!$request->ajax()) return redirect('');

        $nIdBanco           = $request->nIdBanco;
        $cEstado            = $request->cEstado;

        $nIdBanco           = ($nIdBanco == NULL) ? ($nIdBanco = 0) : $nIdBanco;
        $cEstado            = ($cEstado == NUll) ? ($cEstado = 0): $cEstado;

        $cambiaestatusbanco = Banco::find($nIdBanco);
        if($cambiaestatusbanco){
            $cambiaestatusbanco->state = $cEstado;
            $cambiaestatusbanco->save();

            return true;
        } else{
            return false;
        }
    }
}
