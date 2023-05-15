<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeguroController extends Controller
{
    public function getListSeguros(Request $request){
        if(!$request->ajax()) return redirect('');
        $cTipoVigencia          = $request->cTipoVigencia;
        $cNumPoliza             = $request->cNumPoliza;
        $cFechaVencimiento      = $request->cFechaVencimiento;


        $cTipoVigencia          = ($cTipoVigencia == NULL) ? ($cTipoVigencia  = '') : $cTipoVigencia;
        $cNumPoliza             = ($cNumPoliza == NULL) ? ($cNumPoliza  = '') : $cNumPoliza;
        $cFechaVencimiento      = ($cFechaVencimiento == NULL) ? ($cFechaVencimiento    = NULL)  : $cFechaVencimiento;


        $rpta = DB::select('call sp_Seguro_getListSeguros(?,?,?)',[$cTipoVigencia,$cNumPoliza,$cFechaVencimiento]);

        return $rpta;
    }

    public function setRegistraSeguro(Request $request){
        if(!$request->ajax()) return redirect('');
        $cNombreAgente     = $request->cNombreAgente;
        $cTipoVigencia     = $request->cTipoVigencia;
        $cCobertura        = $request->cCobertura;
        $cDeducible        = $request->cDeducible;
        $cFechaRenovacion  = $request->cFechaRenovacion;
        $cFechaVencimiento = $request->cFechaVencimiento;
        $cNumPoliza        = $request->cNumPoliza;
        $cPagoSeguro       = $request->cPagoSeguro;
        $cAseguradora      = $request->cAseguradora;

        $cNombreAgente       = ($cNombreAgente == NULL) ? ($cNombreAgente  = '') : $cNombreAgente;
        $cTipoVigencia       = ($cTipoVigencia == NULL) ? ($cTipoVigencia  = '') : $cTipoVigencia;
        $cCobertura          = ($cCobertura == NULL) ? ($cCobertura  = '') : $cCobertura;
        $cDeducible          = ($cDeducible == NULL) ? ($cDeducible  = '') : $cDeducible;
        $cFechaRenovacion    = ($cFechaRenovacion == NULL) ? ($cFechaRenovacion  = '') : $cFechaRenovacion;
        $cFechaVencimiento   = ($cFechaVencimiento == NULL) ? ($cFechaVencimiento  = '') : $cFechaVencimiento;
        $cNumPoliza          = ($cNumPoliza == NULL) ? ($cNumPoliza  = '') : $cNumPoliza;
        $cPagoSeguro         = ($cPagoSeguro == NULL) ? ($cPagoSeguro  = 0) : $cPagoSeguro;
        $cAseguradora        = ($cAseguradora == NULL) ? ($cAseguradora  = '') : $cAseguradora;

        $rpta = DB::select('call sp_Seguro_setRegistraSeguro(?,?,?,?,?,?,?,?,?)',[$cNombreAgente,$cTipoVigencia,$cCobertura,$cDeducible,$cFechaRenovacion,$cFechaVencimiento,$cNumPoliza,$cPagoSeguro,$cAseguradora]);

        return $rpta;
    }

    public function getSeguroById(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdSeguro     = $request->nIdSeguro;
        $nIdSeguro     = ($nIdSeguro == NULL) ? ($nIdSeguro = 0) : $nIdSeguro;

        $rpta =  DB::select('call sp_Seguro_getSeguroById(?)',[$nIdSeguro]);

        return $rpta;
    }

    public function getListadoSeguros(Request $request){
        if(!$request->ajax()) return redirect('');

        $rpta = DB::select('call sp_Seguro_getListadoSeguros()');

        return $rpta;
    }
}
