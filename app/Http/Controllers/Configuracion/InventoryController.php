<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function getListInventario(Request $request){
        if(!$request->ajax()) return redirect('');
        $cDescripcion         = $request->cDescripcion;

        $cDescripcion         = ($cDescripcion == NULL) ? ($cDescripcion = '') : $cDescripcion;

        $rpta = DB::select('call sp_Inventario_getListInventario(?)',[$cDescripcion]);

        return $rpta;
    }

    public function getTipoInventario(Request $request){
        $rpta = DB::select('call sp_Inventario_getTipoInventario()');

        return $rpta;
    }

    public function setRegistraInventario(Request $request){
        if(!$request->ajax()) return redirect('');

        $cDescripcion   = $request->cDescripcion;
        $cTipoinv       = $request->cTipoinv;
        $cInvmaximo     = $request->cInvmaximo;
        $cInvminimo     = $request->cInvminimo;
        $cPreciocosto   = $request->cPreciocosto;

        $cDescripcion   = ($cDescripcion == NULL) ? ($cDescripcion = '') : $cDescripcion;
        $cTipoinv       = ($cTipoinv == NULL) ? ($cTipoinv = 0) : $cTipoinv;
        $cInvmaximo     = ($cInvmaximo == NULL) ? ($cInvmaximo = 0) : $cInvmaximo;
        $cInvminimo     = ($cInvminimo == NULL) ? ($cInvminimo = '') : $cInvminimo;
        $cPreciocosto   = ($cPreciocosto == NULL) ? ($cPreciocosto = '') : $cPreciocosto;

        DB::select('call sp_Inventario_setRegistraInventario(?,?,?,?,?)',[$cDescripcion,$cTipoinv,$cInvmaximo,$cInvminimo,$cPreciocosto]);

    }
}
