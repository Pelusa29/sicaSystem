<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UnidadController extends Controller
{
    public function getListUnidades(Request $request){
        if(!$request->ajax()) return redirect('');
        $cUnidad                    = $request->cUnidad;
        $cFechaVencimientoSeguro    = $request->cFechaVencimientoSeguro;

        $cUnidad   = ($cUnidad == NULL) ? ($cUnidad  = '') : $cUnidad;
        $cFechaVencimientoSeguro         = ($cFechaVencimientoSeguro == NULL) ? ($cFechaVencimientoSeguro    = NULL)  : $cFechaVencimientoSeguro;


        $rpta = DB::select('call sp_Unidad_getListUnidades(?,?)',[$cUnidad,$cFechaVencimientoSeguro]);

        return $rpta;
    }

    public function getListadoTipoUnidades(Request $request){
        $rpta = DB::select('call sp_Unidad_getListadoTipoUnidades()');

        return $rpta;
    }

    public function setRegistraUnidad(Request $request){
        if(!$request->ajax()) return redirect('');
        $cUnidad                    = $request->cUnidad;
        $cOpUnidad                  = $request->cOpUnidad;
        $cMarca                     = $request->cMarca;
        $cModelo                    = $request->cModelo;
        $cFechaVencimientoSeguro    = $request->cFechaVencimientoSeguro;
        $cCostoSeguro               = $request->cCostoSeguro;
        $cValorUnidad               = $request->cValorUnidad;
        $cTipoCombustible           = $request->cTipoCombustible;

        $cUnidad                    = ($cUnidad == NULL) ? ($cUnidad  = '') : $cUnidad;
        $cOpUnidad                  = ($cOpUnidad == NULL) ? ($cOpUnidad  = '') : $cOpUnidad;
        $cMarca                     = ($cMarca == NULL) ? ($cMarca  = NULL) : $cMarca;
        $cModelo                    = ($cModelo == NULL) ? ($cModelo  = '') : $cModelo;
        $cFechaVencimientoSeguro    = ($cFechaVencimientoSeguro == NULL) ? ($cFechaVencimientoSeguro    = NULL)  : $cFechaVencimientoSeguro;
        $cCostoSeguro               = ($cCostoSeguro == NULL) ? ($cCostoSeguro  = '') : $cCostoSeguro;
        $cValorUnidad               = ($cValorUnidad == NULL) ? ($cValorUnidad  = '') : $cValorUnidad;
        $cTipoCombustible           = ($cTipoCombustible == NULL) ? ($cTipoCombustible  = '') : $cTipoCombustible;

        $rpta = DB::select('call sp_Unidad_setRegistraUnidad(?,?,?,?,?,?,?,?)',[$cUnidad,$cOpUnidad,$cMarca,$cModelo,$cFechaVencimientoSeguro,$cCostoSeguro,$cValorUnidad,$cTipoCombustible]);

        return $rpta;

    }

    public function getUnidadById(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdUnidad     = $request->nIdUnidad;
        $nIdUnidad     = ($nIdUnidad == NULL) ? ($nIdUnidad = 0) : $nIdUnidad;

        $rpta =  DB::select('call sp_Unidad_getUnidadById(?)',[$nIdUnidad]);

        return $rpta;
    }

    public function setEditarUnidad(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdUnidad                  = $request->nIdUnidad;
        $cUnidad                    = $request->cUnidad;
        $cOpUnidad                  = $request->cOpUnidad;
        $cMarca                     = $request->cMarca;
        $cModelo                    = $request->cModelo;
        $cFechaVencimientoSeguro    = $request->cFechaVencimientoSeguro;
        $cCostoSeguro               = $request->cCostoSeguro;
        $cValorUnidad               = $request->cValorUnidad;
        $cTipoCombustible           = $request->cTipoCombustible;

        $nIdUnidad                  = ($nIdUnidad ==  NULL) ? ($nIdUnidad = 0) : $nIdUnidad;
        $cUnidad                    = ($cUnidad == NULL) ? ($cUnidad  = '') : $cUnidad;
        $cOpUnidad                  = ($cOpUnidad == NULL) ? ($cOpUnidad  = '') : $cOpUnidad;
        $cMarca                     = ($cMarca == NULL) ? ($cMarca  = NULL) : $cMarca;
        $cModelo                    = ($cModelo == NULL) ? ($cModelo  = '') : $cModelo;
        $cFechaVencimientoSeguro    = ($cFechaVencimientoSeguro == NULL) ? ($cFechaVencimientoSeguro    = NULL)  : $cFechaVencimientoSeguro;
        $cCostoSeguro               = ($cCostoSeguro == NULL) ? ($cCostoSeguro  = '') : $cCostoSeguro;
        $cValorUnidad               = ($cValorUnidad == NULL) ? ($cValorUnidad  = '') : $cValorUnidad;
        $cTipoCombustible           = ($cTipoCombustible == NULL) ? ($cTipoCombustible  = '') : $cTipoCombustible;

        $rpta = DB::select('call sp_Unidad_setEditarUnidad(?,?,?,?,?,?,?,?,?)',[$nIdUnidad,$cUnidad,$cOpUnidad,$cMarca,$cModelo,$cFechaVencimientoSeguro,$cCostoSeguro,$cValorUnidad,$cTipoCombustible]);

    }

    public function  getListDocumentos(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdUnidad = $request->nIdUnidad;

        $nIdUnidad     = ($nIdUnidad == NULL) ? ($nIdUnidad = 0) : $nIdUnidad;

        $rpta =  DB::select('call sp_Unidad_getListDocumentos(?)',[$nIdUnidad]);

        return $rpta;

    }
}
