<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConductorController extends Controller
{
    public function getListConductores(Request $request){

        if(!$request->ajax()) return redirect('');
        $nIdConductor           = $request->nIdConductor;
        $cNombre                = $request->cNombre;
        $cFechaNacimiento       = $request->cFechaNacimiento;
        $cEstado                = $request->cEstado;

        $nIdConductor       = ($nIdConductor == NULL) ? ($nIdConductor = 0) : $nIdConductor;
        $cNombre            = ($cNombre == NULL) ? ($cNombre      = '')  : $cNombre;
        $cFechaNacimiento   = ($cFechaNacimiento == NULL) ? ($cFechaNacimiento    = NULL)  : $cFechaNacimiento;
        $cEstado            = ($cEstado == NULL) ? ($cEstado      = '')  : $cEstado;

        $rpta = DB::select('call sp_Conductor_getListConductores(?,?,?,?)',[$nIdConductor,$cNombre,$cFechaNacimiento,$cEstado]);

        return $rpta;

    }

    public function setRegistrarConductor(Request $request){
        if(!$request->ajax()) return redirect('');
        $cNombre               = $request->cNombre;
        $cFechaNacimiento      = $request->cFechaNacimiento;
        $cCelular              = $request->cCelular;
        $cCalle                = $request->cCalle;
        $cCp                   = $request->cCp;
        $cColonia              = $request->cColonia;
        $cCiudad               = $request->cCiudad;
        $cVencimientolicencia  = $request->cVencimientolicencia;
        $cConductorEmergencia  = $request->cConductorEmergencia;
        $cCelularEmergencia    = $request->cCelularEmergencia;

        $cNombre                = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cFechaNacimiento       = ($cFechaNacimiento == NULL) ? ($cFechaNacimiento = NULL) : $cFechaNacimiento;
        $cCelular               = ($cCelular == NULL) ? ($cCelular = '') : $cCelular;
        $cCalle                 = ($cCalle == NULL) ? ($cCalle = '') : $cCalle;
        $cCp                    = ($cCp == NULL) ? ($cCp = '') : $cCp;
        $cColonia               = ($cColonia == NULL) ? ($cColonia = '') : $cColonia;
        $cCiudad                = ($cCiudad == NULL) ? ($cCiudad = '') : $cCiudad;
        $cVencimientolicencia   = ($cVencimientolicencia == NULL) ? ($cVencimientolicencia = NULL) : $cVencimientolicencia;
        $cConductorEmergencia   = ($cConductorEmergencia == NULL) ? ($cConductorEmergencia = '') : $cConductorEmergencia;
        $cCelularEmergencia      = ($cCelularEmergencia == NULL) ? ($cCelularEmergencia = '') : $cCelularEmergencia;


        $rpta = DB::select('call sp_Conductor_setRegistrarConductor(?,?,?,?,?,?,?,?,?,?)',[
            $cNombre,
            $cFechaNacimiento,
            $cCelular,
            $cCalle,
            $cCp,
            $cColonia,
            $cCiudad,
            $cVencimientolicencia,
            $cConductorEmergencia,
            $cCelularEmergencia
        ]);

        return $rpta;
    }

    public function setCambiaEstadoConductor(Request $request){
        if(!$request->ajax()) return redirect('');

        $nIdConductor   = $request->nIdConductor;
        $cEstado      = $request->cEstado;

        $nIdConductor   = ($nIdConductor == NULL) ? ($nIdConductor = 0) : $nIdConductor;
        $cEstado      = ($cEstado == NUll) ? ($cEstado = 0): $cEstado;

        $rpta = DB::select('call sp_Conductor_setCambiaEstadoConductor(?,?)',
        [
            $nIdConductor,
            $cEstado
        ]);

    }

    public function getConductorById(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdConductor      = $request->nIdConductor;
        $nIdConductor      = ($nIdConductor == NULL) ? ($nIdConductor = 0) : $nIdConductor;

        $rpta = DB::select('call sp_Conductor_getConductorById(?)',[$nIdConductor]);

        return $rpta;
    }

    public function setEditarConductor(Request $request){
        if(!$request->ajax()) return redirect('');
        $nIdConductor          = $request->nIdConductor;
        $cNombre               = $request->cNombre;
        $cFechaNacimiento      = $request->cFechaNacimiento;
        $cCelular              = $request->cCelular;
        $cCalle                = $request->cCalle;
        $cCp                   = $request->cCp;
        $cColonia              = $request->cColonia;
        $cCiudad               = $request->cCiudad;
        $cVencimientolicencia  = $request->cVencimientolicencia;
        $cConductorEmergencia  = $request->cConductorEmergencia;
        $cCelularEmergencia    = $request->cCelularEmergencia;

        $nIdConductor          = ($nIdConductor == NULL) ? ($nIdConductor = 0) : $nIdConductor;
        $cNombre                = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cFechaNacimiento       = ($cFechaNacimiento == NULL) ? ($cFechaNacimiento = NULL) : $cFechaNacimiento;
        $cCelular               = ($cCelular == NULL) ? ($cCelular = '') : $cCelular;
        $cCalle                 = ($cCalle == NULL) ? ($cCalle = '') : $cCalle;
        $cCp                    = ($cCp == NULL) ? ($cCp = '') : $cCp;
        $cColonia               = ($cColonia == NULL) ? ($cColonia = '') : $cColonia;
        $cCiudad                = ($cCiudad == NULL) ? ($cCiudad = '') : $cCiudad;
        $cVencimientolicencia   = ($cVencimientolicencia == NULL) ? ($cVencimientolicencia = NULL) : $cVencimientolicencia;
        $cConductorEmergencia   = ($cConductorEmergencia == NULL) ? ($cConductorEmergencia = '') : $cConductorEmergencia;
        $cCelularEmergencia      = ($cCelularEmergencia == NULL) ? ($cCelularEmergencia = '') : $cCelularEmergencia;


        $rpta = DB::select('call sp_Conductor_setEditarConductor(?,?,?,?,?,?,?,?,?,?,?)',[
            $nIdConductor,
            $cNombre,
            $cFechaNacimiento,
            $cCelular,
            $cCalle,
            $cCp,
            $cColonia,
            $cCiudad,
            $cVencimientolicencia,
            $cConductorEmergencia,
            $cCelularEmergencia
        ]);

        return $rpta;
    }
}
