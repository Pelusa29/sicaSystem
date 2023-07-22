<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UnidadController extends Controller
{
    public function getListUnidades(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $cUnidad                    = $request->cUnidad;
        $cFechaVencimientoSeguro    = $request->cFechaVencimientoSeguro;

        $cUnidad   = ($cUnidad == NULL) ? ($cUnidad  = '') : $cUnidad;
        $cFechaVencimientoSeguro         = ($cFechaVencimientoSeguro == NULL) ? ($cFechaVencimientoSeguro    = NULL)  : $cFechaVencimientoSeguro;


        $rpta = DB::select('call sp_Unidad_getListUnidades(?,?)', [$cUnidad, $cFechaVencimientoSeguro]);

        return $rpta;
    }

    public function getListadoTipoUnidades(Request $request)
    {
        $rpta = DB::select('call sp_Unidad_getListadoTipoUnidades()');

        return $rpta;
    }

    public function setRegistraUnidad(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $cUnidad                    = $request->cUnidad;
        $cOpUnidad                  = $request->cOpUnidad;
        $cMarca                     = $request->cMarca;
        $cModelo                    = $request->cModelo;
        $cValorUnidad               = $request->cValorUnidad;
        $cTipoCombustible           = $request->cTipoCombustible;
        $nIdCliente                 = $request->nIdCliente;
        $cnIdPlaca                  = $request->cnIdPlaca;
        $nIdSeguro                  = $request->nIdSeguro;
        $cNuSerie                   = $request->cNuSerie;

        $cUnidad                    = ($cUnidad == NULL) ? ($cUnidad  = '') : $cUnidad;
        $cOpUnidad                  = ($cOpUnidad == NULL) ? ($cOpUnidad  = '') : $cOpUnidad;
        $cMarca                     = ($cMarca == NULL) ? ($cMarca  = NULL) : $cMarca;
        $cModelo                    = ($cModelo == NULL) ? ($cModelo  = '') : $cModelo;
        $cValorUnidad               = ($cValorUnidad == NULL) ? ($cValorUnidad  = '') : $cValorUnidad;
        $cTipoCombustible           = ($cTipoCombustible == NULL) ? ($cTipoCombustible  = '') : $cTipoCombustible;
        $nIdCliente                 = ($nIdCliente == NULL) ? ($nIdCliente  = '') : $nIdCliente;
        $cnIdPlaca                  = ($cnIdPlaca == NULL) ? ($cnIdPlaca  = '') : $cnIdPlaca;
        $nIdSeguro                  = ($nIdSeguro == NULL) ? ($nIdSeguro  = '') : $nIdSeguro;
        $cNuSerie                   = ($cNuSerie == NULL) ? ($cNuSerie  = '') : $cNuSerie;

        $rpta = DB::select('call sp_Unidad_setRegistraUnidad(?,?,?,?,?,?,?,?,?,?)', [$cUnidad, $cOpUnidad, $cMarca, $cModelo, $cValorUnidad, $cTipoCombustible, $nIdCliente, $cnIdPlaca, $nIdSeguro, $cNuSerie]);

        return $rpta;
    }

    public function getUnidadById(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $nIdUnidad     = $request->nIdUnidad;
        $nIdUnidad     = ($nIdUnidad == NULL) ? ($nIdUnidad = 0) : $nIdUnidad;

        $rpta =  DB::select('call sp_Unidad_getUnidadById(?)', [$nIdUnidad]);

        return $rpta;
    }

    public function setEditarUnidad(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $nIdUnidad                  = $request->nIdUnidad;
        $cUnidad                    = $request->cUnidad;
        $cOpUnidad                  = $request->cOpUnidad;
        $cMarca                     = $request->cMarca;
        $cModelo                    = $request->cModelo;
        $cValorUnidad               = $request->cValorUnidad;
        $cTipoCombustible           = $request->cTipoCombustible;
        $nIdCliente                 = $request->nIdCliente;
        $cnIdPlaca                  = $request->cnIdPlaca;
        $nIdSeguro                  = $request->nIdSeguro;
        $cNuSerie                   = $request->cNuSerie;

        $nIdUnidad                  = ($nIdUnidad ==  NULL) ? ($nIdUnidad = 0) : $nIdUnidad;

        $cOpUnidad                  = ($cOpUnidad == NULL) ? ($cOpUnidad  = '') : $cOpUnidad;
        $cMarca                     = ($cMarca == NULL) ? ($cMarca  = NULL) : $cMarca;
        $cModelo                    = ($cModelo == NULL) ? ($cModelo  = '') : $cModelo;
        $cValorUnidad               = ($cValorUnidad == NULL) ? ($cValorUnidad  = '') : $cValorUnidad;
        $cTipoCombustible           = ($cTipoCombustible == NULL) ? ($cTipoCombustible  = '') : $cTipoCombustible;
        $nIdCliente                 = ($nIdCliente == NULL) ? ($nIdCliente  = '') : $nIdCliente;
        $cnIdPlaca                  = ($cnIdPlaca == NULL) ? ($cnIdPlaca  = '') : $cnIdPlaca;
        $nIdSeguro                  = ($nIdSeguro == NULL) ? ($nIdSeguro  = '') : $nIdSeguro;
        $cNuSerie                   = ($cNuSerie == NULL) ? ($cNuSerie  = '') : $cNuSerie;

        //print_r($nIdUnidad.'-'.$cUnidad.'-'.$cOpUnidad.'-'.$cMarca.'-'.$cModelo.'-'.$cValorUnidad.'-'.$cTipoCombustible.'-'.$nIdCliente.'-'.$cnIdPlaca.'-'.$nIdSeguro.'-'.$cNuSerie);
        /* print_r($nIdUnidad.'-'.$nIdSeguro); */
        $rpta = DB::select('call sp_Unidad_setEditarUnidad(?,?,?,?,?,?,?,?,?,?,?)', [$nIdUnidad, $cUnidad, $cOpUnidad, $cMarca, $cModelo, $cValorUnidad, $cTipoCombustible, $nIdCliente, $cnIdPlaca, $nIdSeguro, $cNuSerie]);
    }

    public function  getListDocumentos(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $nIdUnidad = $request->nIdUnidad;

        $nIdUnidad     = ($nIdUnidad == NULL) ? ($nIdUnidad = 0) : $nIdUnidad;

        $rpta =  DB::select('call sp_Unidad_getListDocumentos(?)', [$nIdUnidad]);

        return $rpta;
    }

    public function getListaUnidadesCatalago(Request $request)
    {
        if (!$request->ajax()) return redirect('');

        $rpta =  DB::select('call sp_Unidad_getListaUnidadesCatalago()');

        return $rpta;
    }

    public function getListaUnidadesCatalagoById(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $nIdOperacion = $request->nIdOperacion;

        $nIdOperacion     = ($nIdOperacion == NULL) ? ($nIdOperacion = 0) : $nIdOperacion;
        $rpta =  DB::select('call sp_Provision_getListaUnidadesCatalagoById(?)', [$nIdOperacion]);

        return $rpta;
    }
}
