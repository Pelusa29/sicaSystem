<?php

namespace App\Http\Controllers\Operacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pdf;

class ContratoController extends Controller
{
    public function getListContratostaxi(Request $request){
        if(!$request->ajax()) return redirect('');
        $cConductor                 = $request->cConductor;
        $cFechaInicioContrato       = $request->cFechaInicioContrato;

        $cConductor                = ($cConductor == NULL) ? ($cConductor = '') : $cConductor;
        $cFechaInicioContrato      = ($cFechaInicioContrato == NULL) ? ($cFechaInicioContrato = NULL) : $cFechaInicioContrato;

        $rpta = DB::select('call sp_Contrato_getListContratostaxi(?,?)',[$cConductor,$cFechaInicioContrato]);

        return $rpta;
    }

    public function setRegistraContratotaxi(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdCliente             = $request->nIdCliente;
        $cUnidad                = $request->cUnidad;
        $cDireccion             = $request->cDireccion;
        $cFechaInicioContrato   = $request->cFechaInicioContrato;
        $cImporteRenta          = $request->cImporteRenta;
        $cImporteDeposito       = $request->cImporteDeposito;
        $cNombreFiador          = $request->cNombreFiador;
        $cCalleFiador           = $request->cCalleFiador;
        $cColonia               = $request->cColonia;
        $cCiudadFiador          = $request->cCiudadFiador;
        $cCp                    = $request->cCp;
        $cNombreTestigo         = $request->cNombreTestigo;


        $nIdCliente                 = ($nIdCliente == NULL) ? ($nIdCliente = 0) : $nIdCliente;
        $cUnidad                    = ($cUnidad == NULL) ? ($cUnidad = '') : $cUnidad;
        $cDireccion                 = ($cDireccion == NULL) ? ($cDireccion = '') : $cDireccion;
        $cFechaInicioContrato       = ($cFechaInicioContrato == NULL) ? ($cFechaInicioContrato = NULL) : $cFechaInicioContrato;
        $cImporteRenta              = ($cImporteRenta == NULL) ? ($cImporteRenta = '') : $cImporteRenta;
        $cImporteDeposito           = ($cImporteDeposito == NULL) ? ($cImporteDeposito = '') : $cImporteDeposito;
        $cNombreFiador              = ($cNombreFiador == NULL) ? ($cNombreFiador = '') : $cNombreFiador;
        $cCalleFiador               = ($cCalleFiador == NULL) ? ($cCalleFiador = '') : $cCalleFiador;
        $cColonia                   = ($cColonia == NULL) ? ($cColonia = '') : $cColonia;
        $cCiudadFiador              = ($cCiudadFiador == NULL) ? ($cCiudadFiador = '') : $cCiudadFiador;
        $cCp                        = ($cCp == NULL) ? ($cCp = '') : $cCp;
        $cNombreTestigo             = ($cNombreTestigo == NULL) ? ($cNombreTestigo = '') : $cNombreTestigo;

        DB::select('call sp_Contrato_setRegistraContrato(?,?,?,?,?,?,?,?,?,?,?,?)',[$nIdCliente,$cUnidad,$cDireccion,$cFechaInicioContrato,$cImporteRenta,$cImporteDeposito,$cNombreFiador,$cCalleFiador,$cColonia,$cCiudadFiador,$cCp,$cNombreTestigo]);

    }

    public function setBuscarDataContrato(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdContrato             = $request->nIdContrato;

        $rpta = DB::select('call sp_Contrato_setBuscarDataContrato(?)',[$nIdContrato]);

        return $rpta;
    }

    public function setEditarContratotaxi(REquest $request){
        if(!$request->ajax()) return redirect('');
        $nIdContrato            = $request->nIdContrato;
        $cUnidad                = $request->cUnidad;
        $cDireccion             = $request->cDireccion;
        $cFechaInicioContrato   = $request->cFechaInicioContrato;
        $cImporteRenta          = $request->cImporteRenta;
        $cImporteDeposito       = $request->cImporteDeposito;
        $cNombreFiador          = $request->cNombreFiador;
        $cCalleFiador           = $request->cCalleFiador;
        $cColonia               = $request->cColonia;
        $cCiudadFiador          = $request->cCiudadFiador;
        $cCp                    = $request->cCp;
        $cNombreTestigo         = $request->cNombreTestigo;


        $nIdContrato                = ($nIdContrato == NULL) ? ($nIdContrato = 0) : $nIdContrato;
        $cUnidad                    = ($cUnidad == NULL) ? ($cUnidad = '') : $cUnidad;
        $cDireccion                 = ($cDireccion == NULL) ? ($cDireccion = '') : $cDireccion;
        $cFechaInicioContrato       = ($cFechaInicioContrato == NULL) ? ($cFechaInicioContrato = NULL) : $cFechaInicioContrato;
        $cImporteRenta              = ($cImporteRenta == NULL) ? ($cImporteRenta = '') : $cImporteRenta;
        $cImporteDeposito           = ($cImporteDeposito == NULL) ? ($cImporteDeposito = '') : $cImporteDeposito;
        $cNombreFiador              = ($cNombreFiador == NULL) ? ($cNombreFiador = '') : $cNombreFiador;
        $cCalleFiador               = ($cCalleFiador == NULL) ? ($cCalleFiador = '') : $cCalleFiador;
        $cColonia                   = ($cColonia == NULL) ? ($cColonia = '') : $cColonia;
        $cCiudadFiador              = ($cCiudadFiador == NULL) ? ($cCiudadFiador = '') : $cCiudadFiador;
        $cCp                        = ($cCp == NULL) ? ($cCp = '') : $cCp;
        $cNombreTestigo             = ($cNombreTestigo == NULL) ? ($cNombreTestigo = '') : $cNombreTestigo;

        DB::select('call sp_Contrato_setEditarContratotaxi(?,?,?,?,?,?,?,?,?,?,?,?)',[$nIdContrato,$cUnidad,$cDireccion,$cFechaInicioContrato,$cImporteRenta,$cImporteDeposito,$cNombreFiador,$cCalleFiador,$cColonia,$cCiudadFiador,$cCp,$cNombreTestigo]);
    }

    public function setGenerardocumento(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdContrato            = $request->nIdContrato;

        $rpta = DB::select('call sp_Contrato_setBuscarDataContrato(?)',[$nIdContrato]);


        $pdf = Pdf::loadView('reportes.contratos.pdf.ver',[
            'reporte'=> $rpta
        ]);
        return $pdf->download('invoice.pdf');
    }
}
