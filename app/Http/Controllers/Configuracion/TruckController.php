<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruckController extends Controller
{
    public function getListTipoUnidades(Request $request){
        if(!$request->ajax()) return redirect('');
        $cDescripcion   = $request->cDescripcion;
        $cTransmicion   = $request->cTransmision;
        $cFecha         = $request->cFecha;

        $cDescripcion   = ($cDescripcion == NULL) ? ($cDescripcion  = '') : $cDescripcion;
        $cTransmicion   = ($cTransmicion == NULL) ? ($cTransmicion  = '') : $cTransmicion;
        $cFecha         = ($cFecha == NULL) ? ($cFecha    = NULL)  : $cFecha;


        $rpta = DB::select('call sp_TipoUnidad_getListTipoUnidades(?,?,?)',[$cDescripcion,$cTransmicion,$cFecha]);

        return $rpta;
    }

    public function getTipoGirosList(Request $request){
        $rpta = DB::select('call sp_TipoGiro_getListTipoGiros()');

        return $rpta;
    }

    public function setRegistraTipoUnidad(Request $request){
        if(!$request->ajax()) return redirect('');
        $cDescripcion   = $request->cDescripcion;
        $cTtipounidad   = $request->cTipounidad;
        $cRentadiara    = $request->cRentadiaria;
        $cTipogiro      = $request->cTipogiro;

        $cDescripcion   = ($cDescripcion == NULL) ? ($cDescripcion = '') : $cDescripcion;
        $cTtipounidad   = ($cTtipounidad == NULL) ? ($cTtipounidad      = '')  : $cTtipounidad;
        $cRentadiara    = ($cRentadiara == NULL) ? ($cRentadiara    = NULL)  : $cRentadiara;
        $cTipogiro      = ($cTipogiro == NULL) ? ($cTipogiro = 0): $cTipogiro;

        $rpta = DB::select('call sp_TipoUnidad_setRegistraTipoUnidad(?,?,?,?)',[$cDescripcion,$cTtipounidad,$cRentadiara, $cTipogiro]);
    }

    public function getTipoUnidad(Request $request){
        if(!$request->ajax()) return redirect('');

        $nIdTipoUnidad     = $request->nIdTipoUnidad;
        $nIdTipoUnidad     = ($nIdTipoUnidad == NULL) ? ($nIdTipoUnidad = 0) : $nIdTipoUnidad;

        $rpta =  DB::select('call sp_TipoUnidad_getTipoUnidad(?)',[$nIdTipoUnidad]);


        return $rpta;
    }

    public function setEditarTipoUnidad(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdTipoUnidad      = $request->nIdTipoUnidad;
        $cDescripcion       = $request->cDescripcion;
        $cTipounidad        = $request->cTipounidad;
        $cRentadiaria       = $request->cRentadiaria;
        $cTipogiro          = $request->cTipogiro;

        $nIdTipoUnidad          = ($nIdTipoUnidad == NULL) ? ($nIdTipoUnidad = 0) : $nIdTipoUnidad;
        $cDescripcion           = ($cDescripcion == NULL) ? ($cDescripcion = '') : $cDescripcion;
        $cTipounidad            = ($cTipounidad == NULL) ? ($cTipounidad  = '')  : $cTipounidad;
        $cRentadiaria           = ($cRentadiaria == NULL) ? ($cRentadiaria      = 0)  : $cRentadiaria;
        $cTipogiro              = ($cTipogiro == NULL) ? ($cTipogiro = 0): $cTipogiro;

        DB::select('call sp_TipoUnidad_setEditarTipoUnidad(?,?,?,?,?)',[$nIdTipoUnidad,$cDescripcion,$cTipounidad,$cRentadiaria,$cTipogiro]);
    }
}
