<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlacaController extends Controller
{
    //
    public function getListPlacas(Request $request){
        if(!$request->ajax()) return redirect('');
        $cNumeroPlaca               = $request->cNumeroPlaca;
        $cTipoPlaca                 = $request->cTipoPlaca;

        $cNumeroPlaca           = ($cNumeroPlaca == NULL) ? ($cNumeroPlaca = '') : $cNumeroPlaca;
        $cTipoPlaca             = ($cTipoPlaca == NULL) ? ($cTipoPlaca    = '')  : $cTipoPlaca;

        $rpta = DB::select('call sp_Placa_getListPlacas(?,?)',[$cNumeroPlaca,$cTipoPlaca]);

        return $rpta;
    }

    public function setRegistraPlaca(Request $request){
        $cNumeroPlaca   = $request->cNumeroPlaca;
        $cTipoPlaca     = $request->cTipoPlaca;

        $cNumeroPlaca   = ($cNumeroPlaca == NULL) ? ($cNumeroPlaca = '') : $cNumeroPlaca;
        $cTipoPlaca     = ($cTipoPlaca == NULL) ? ($cTipoPlaca  = '') : $cTipoPlaca;


        $rpt = DB::select('call sp_Placa_setRegistraPlaca(?,?)',[$cNumeroPlaca,$cTipoPlaca]);

       return $rpt[0]->nExiste;
    }

    public function getPlacaById(Request $request){
        $nIdPlaca = $request->nIdPlaca;

        $nIdPlaca     = ($nIdPlaca == NULL) ? ($nIdPlaca = 0) : $nIdPlaca;

        $rpta =  DB::select('call sp_Placa_getPlacaById(?)',[$nIdPlaca]);


        return $rpta;
    }

    public function getListadoPlacas(){
        $rpta = DB::select('call sp_Placa_getListadoPlacas()');
        return $rpta;
    }
}
