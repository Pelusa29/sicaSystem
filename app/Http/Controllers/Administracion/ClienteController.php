<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

     public function getListClientes(Request $request){

        if(!$request->ajax()) return redirect('');
        $cNombre                = $request->cNombre;
        $cFechaNacimiento       = $request->cFechaNacimiento;
        $cEstado                = $request->cEstado;


        $cNombre            = ($cNombre == NULL) ? ($cNombre      = '')  : $cNombre;
        $cFechaNacimiento   = ($cFechaNacimiento == NULL) ? ($cFechaNacimiento    = NULL)  : $cFechaNacimiento;
        $cEstado            = ($cEstado == NULL) ? ($cEstado      = '')  : $cEstado;

        $rpta = DB::select('call sp_Cliente_getListClientes(?,?,?)',[$cNombre,$cFechaNacimiento,$cEstado]);

        return $rpta;

    }


    //RegistroCliente
     public function setRegistrarCliente(Request $request){
        if(!$request->ajax()) return redirect('');
        $cNombre                = $request->cNombre;
        $cFechaNacimiento       = $request->cFechaNacimiento;
        $cCelular               = $request->cCelular;
        $cCalle                 = $request->cCalle;
        $cCp                    = $request->cCp;
        $cColonia               = $request->cColonia;
        $cCiudad                = $request->cCiudad;
        $cVencimientolicencia   = $request->cVencimientolicencia;
        $cClienteEmergencia   = $request->cClienteEmergencia;
        $cCelularEmergencia     = $request->cCelularEmergencia;

        $cEmail                 = $request->cEmail;
        $cRfc                   = $request->cRfc;
        $cRef1                  = $request->cRef1;
        $cRef2                  = $request->cRef2;
        $cRef3                  = $request->cRef3;
        $cTelRef1               = $request->cTelRef1;
        $cTelRef2               = $request->cTelRef2;
        $cTelRef3               = $request->cTelRef;

        $cNombre                = ($cNombre == NULL) ? ($cNombre = '') : $cNombre;
        $cFechaNacimiento       = ($cFechaNacimiento == NULL) ? ($cFechaNacimiento = NULL) : $cFechaNacimiento;
        $cCelular               = ($cCelular == NULL) ? ($cCelular = '') : $cCelular;
        $cCalle                 = ($cCalle == NULL) ? ($cCalle = '') : $cCalle;
        $cCp                    = ($cCp == NULL) ? ($cCp = '') : $cCp;
        $cColonia               = ($cColonia == NULL) ? ($cColonia = '') : $cColonia;
        $cCiudad                = ($cCiudad == NULL) ? ($cCiudad = '') : $cCiudad;
        $cVencimientolicencia   = ($cVencimientolicencia == NULL) ? ($cVencimientolicencia = NULL) : $cVencimientolicencia;
        $cClienteEmergencia     = ($cClienteEmergencia == NULL) ? ($cClienteEmergencia = '') : $cClienteEmergencia;
        $cCelularEmergencia     = ($cCelularEmergencia == NULL) ? ($cCelularEmergencia = '') : $cCelularEmergencia;

        $cEmail                 = ($cEmail == NULL) ? ($cEmail = NULL) : $cEmail;
        $cRfc                   = ($cRfc == NULL) ? ($cRfc = NULL) : $cRfc;
        $cRef1                  = ($cRef1 == NULL) ? ($cRef1 = NULL) : $cRef1;
        $cRef2                  = ($cRef2 == NULL) ? ($cRef2 = NULL) : $cRef2;
        $cRef3                  = ($cRef3 == NULL) ? ($cRef3 = NULL) : $cRef3;
        $cTelRef1               = ($cTelRef1 == NULL) ? ($cTelRef1 = NULL) : $cTelRef1;
        $cTelRef2               = ($cTelRef2 == NULL) ? ($cTelRef2 = NULL) : $cTelRef2;
        $cTelRef3               = ($cTelRef3 == NULL) ? ($cTelRef3 = NULL) : $cTelRef3;


        $rpta = DB::select('call sp_Cliente_setRegistrarCliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
            $cNombre,
            $cFechaNacimiento,
            $cCelular,
            $cCalle,
            $cCp,
            $cColonia,
            $cCiudad,
            $cVencimientolicencia,
            $cClienteEmergencia,
            $cCelularEmergencia,
            $cEmail,
            $cRfc,
            $cRef1,
            $cRef2,
            $cRef3,
            $cTelRef1,
            $cTelRef2,
            $cTelRef3
        ]);

        return $rpta;
    }

    public function setCambiaEstadoCliente(Request $request){
        if(!$request->ajax()) return redirect('');

        $nIdCliente   = $request->nIdCliente;
        $cEstado      = $request->cEstado;

        $nIdCliente   = ($nIdCliente == NULL) ? ($nIdCliente = 0) : $nIdCliente;
        $cEstado      = ($cEstado == NUll) ? ($cEstado = 0): $cEstado;

        $rpta = DB::select('call sp_Cliente_setCambiaEstadoCliente(?,?)',
        [
            $nIdCliente,
            $cEstado
        ]);

    }

    /* public function getListadoConductores(Request $request){
        if(!$request->ajax()) return redirect('');

         $rpta = DB::select('call sp_Cliente_getListadoConductores()');

         return $rpta;
    } */

    public function getListadoClientestotal(Request $request){
        if(!$request->ajax()) return redirect('');

         $rpta = DB::select('call sp_Cliente_getListadoClientestotal()');

         return $rpta;
    }


}
