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
        if(!$request->ajax()) return redirect('');
        $cNumeroPlaca               = $request->cNumeroPlaca;
        $cTipoPlaca                 = $request->cTipoPlaca;
        $cNombrePagoPlaca           = $request->cNombrePagoPlaca;
        $cNombreConcesionPlaca      = $request->cNombreConcesionPlaca;
        $cFechaPagoRenta            = $request->cFechaPagoRenta;
        $cImporteRenta              = $request->cImporteRenta;
        $cObservaciones             = $request->cObservaciones;

        $cNumeroPlaca           = ($cNumeroPlaca == NULL) ? ($cNumeroPlaca = '') : $cNumeroPlaca;
        $cTipoPlaca             = ($cTipoPlaca == NULL) ? ($cTipoPlaca  = '') : $cTipoPlaca;
        $cNombrePagoPlaca       = ($cNombrePagoPlaca == NULL) ? ($cNombrePagoPlaca = '') : $cNombrePagoPlaca;
        $cNombreConcesionPlaca  = ($cNombreConcesionPlaca == NULL) ? ($cNombreConcesionPlaca = '') : $cNombreConcesionPlaca;
        $cFechaPagoRenta        = ($cFechaPagoRenta == NULL) ? ($cFechaPagoRenta = NULL) : $cFechaPagoRenta;
        $cImporteRenta          = ($cImporteRenta == NULL) ? ($cImporteRenta = 0.0) : $cImporteRenta;
        $cObservaciones         = ($cObservaciones == NULL) ? ($cObservaciones = NULL) : $cObservaciones;

        $rpt = DB::select('call sp_Placa_setRegistraPlaca(?,?,?,?,?,?,?)',[
            $cNumeroPlaca,
            $cTipoPlaca,
            $cNombrePagoPlaca,
            $cNombreConcesionPlaca,
            $cFechaPagoRenta,
            $cImporteRenta,
            $cObservaciones
        ]);

       return $rpt[0]->nExiste;
    }

    public function getPlacaById(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdPlaca = $request->nIdPlaca;

        $nIdPlaca     = ($nIdPlaca == NULL) ? ($nIdPlaca = 0) : $nIdPlaca;

        $rpta =  DB::select('call sp_Placa_getPlacaById(?)',[$nIdPlaca]);


        return $rpta;
    }

    public function getListadoPlacas(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdPlaca   = $request->cnIdPlaca;
        $nIdPlaca   = ($nIdPlaca == NULL) ? ($nIdPlaca = NULL) : $nIdPlaca;
        $rpta = DB::select('call sp_Placa_getListadoPlacas(?)',[$nIdPlaca]);
        return $rpta;
    }

    public function setEditarPlaca(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdPlaca                   = $request->nIdPlaca;
        $cNumeroPlaca               = $request->cNumeroPlaca;
        $cTipoPlaca                 = $request->cTipoPlaca;
        $cNombrePagoPlaca           = $request->cNombrePagoPlaca;
        $cNombreConcesionPlaca      = $request->cNombreConcesionPlaca;
        $cFechaPagoRenta            = $request->cFechaPagoRenta;
        $cImporteRenta              = $request->cImporteRenta;
        $cObservaciones             = $request->cObservaciones;

        $cNumeroPlaca           = ($cNumeroPlaca == NULL) ? ($cNumeroPlaca = '') : $cNumeroPlaca;
        $cTipoPlaca             = ($cTipoPlaca == NULL) ? ($cTipoPlaca  = '') : $cTipoPlaca;
        $cNombrePagoPlaca       = ($cNombrePagoPlaca == NULL) ? ($cNombrePagoPlaca = '') : $cNombrePagoPlaca;
        $cNombreConcesionPlaca  = ($cNombreConcesionPlaca == NULL) ? ($cNombreConcesionPlaca = '') : $cNombreConcesionPlaca;
        $cFechaPagoRenta        = ($cFechaPagoRenta == NULL) ? ($cFechaPagoRenta = NULL) : $cFechaPagoRenta;
        $cImporteRenta          = ($cImporteRenta == NULL) ? ($cImporteRenta = 0.0) : $cImporteRenta;
        $cObservaciones         = ($cObservaciones == NULL) ? ($cObservaciones = NULL) : $cObservaciones;

        $rpt = DB::select('call sp_Placa_setEditarPlaca(?,?,?,?,?,?,?,?)',[
            $nIdPlaca,
            $cNumeroPlaca,
            $cTipoPlaca,
            $cNombrePagoPlaca,
            $cNombreConcesionPlaca,
            $cFechaPagoRenta,
            $cImporteRenta,
            $cObservaciones
        ]);
    }
}
