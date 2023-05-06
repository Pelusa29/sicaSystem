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
        $cNombreConcesionPlaca      = $request->cNombreConcesionPlaca;
        $cNombrePagoPlaca           = $request->cNombrePagoPlaca;
        $cFechaPagoRenta            = $request->cFechaPagoRenta;
        $cTipoPlaca                 = $request->cTipoPlaca;

        $cNombreConcesionPlaca   = ($cNombreConcesionPlaca == NULL) ? ($cNombreConcesionPlaca  = '') : $cNombreConcesionPlaca;
        $cNombrePagoPlaca   = ($cNombrePagoPlaca == NULL) ? ($cNombrePagoPlaca  = '') : $cNombrePagoPlaca;
        $cFechaPagoRenta         = ($cFechaPagoRenta == NULL) ? ($cFechaPagoRenta    = NULL)  : $cFechaPagoRenta;
        $cTipoPlaca         = ($cTipoPlaca == NULL) ? ($cTipoPlaca    = '')  : $cTipoPlaca;


        $rpta = DB::select('call sp_Placa_getListPlacas(?,?,?,?)',[$cNombreConcesionPlaca,$cNombrePagoPlaca,$cFechaPagoRenta,$cTipoPlaca]);

        return $rpta;
    }

    public function getListaUnidades(Request $request){
        $rpta = DB::select('call sp_Placa_getListaUnidades()');

        return $rpta;
    }
}
