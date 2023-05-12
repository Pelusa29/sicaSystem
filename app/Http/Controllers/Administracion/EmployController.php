<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployController extends Controller
{
    public function getListEmpleados(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdEmpleado    = $request->nIdEmpleado;
        $cNombre        = $request->cNombre;
        $cNss           = $request->cNss;
        $cRfc           = $request->cRfc;
        $cEstado        = $request->cEstado;

        $nIdEmpleado    = ($nIdEmpleado == NULL) ? ($nIdEmpleado = 0) : $nIdEmpleado;
        $cNombre        = ($cNombre == NULL) ? ($cNombre      = '')  : $cNombre;
        $cNss           = ($cNss == NULL) ? ($cNss    = '')  : $cNss;
        $cRfc           = ($cRfc == NULL) ? ($cRfc      = '')  : $cRfc;
        $cEstado        = ($cEstado == NULL) ? ($cEstado      = '')  : $cEstado;

        $rpta = DB::select('call sp_Empleado_getListEmpleados(?,?,?,?,?)',[$nIdEmpleado,$cNombre,$cNss,$cRfc,$cEstado]);

        return $rpta;
    }

    public function setRegistrarEmpleado(Request $request){
        if(!$request->ajax()) return redirect('');
        $cNombre               = $request->cNombre;
        $cFechaNacimiento      = $request->cFechaNacimiento;
        $cFechaIniContrato     = $request->cFechaIniContrato;
        $cFechaFinContrato     = $request->cFechaFinContrato;
        $cNss                  = $request->cNss;
        $cRfc                  = $request->cRfc;
        $cCelular              = $request->cCelular;
        $cCalle                = $request->cCalle;
        $cCp                   = $request->cCp;
        $cColonia              = $request->cColonia;
        $cCiudad               = $request->cCiudad;
        $cPagotransferencia    = $request->cPagotransferencia;
        $cPagoefectivo         = $request->cPagoefectivo;

        $cNombre            = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cFechaNacimiento   = ($cFechaNacimiento == NULL) ? ($cFechaNacimiento = '') : $cFechaNacimiento;
        $cFechaIniContrato  = ($cFechaIniContrato == NULL) ? ($cFechaIniContrato = '') : $cFechaIniContrato;
        $cFechaFinContrato  = ($cFechaFinContrato == NULL) ? ($cFechaFinContrato = '') : $cFechaFinContrato;
        $cNss               = ($cNss == NULL) ? ($cNss = '') : $cNss;
        $cRfc               = ($cRfc == NULL) ? ($cRfc = '') : $cRfc;
        $cCelular           = ($cCelular == NULL) ? ($cCelular = '') : $cCelular;
        $cCalle             = ($cCalle == NULL) ? ($cCalle = '') : $cCalle;
        $cCp                = ($cCp == NULL) ? ($cCp = '') : $cCp;
        $cColonia           = ($cColonia == NULL) ? ($cColonia = '') : $cColonia;
        $cCiudad            = ($cCiudad == NULL) ? ($cCiudad = '') : $cCiudad;
        $cPagotransferencia = ($cPagotransferencia == NULL) ? ($cPagotransferencia = 0) : $cPagotransferencia;
        $cPagoefectivo      = ($cPagoefectivo == NULL) ? ($cPagoefectivo = 0) : $cPagoefectivo;


        $rpta = DB::select('call sp_Empleado_setRegistrarEmpleado(?,?,?,?,?,?,?,?,?,?,?,?,?)',[$cNombre,$cFechaNacimiento,$cFechaIniContrato,$cFechaFinContrato,$cNss,$cRfc,$cCelular,$cCalle,$cCp,$cColonia,$cCiudad,$cPagotransferencia,$cPagoefectivo]);

        return $rpta[0]->nExistente;
    }
}
