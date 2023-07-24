<?php

namespace App\Http\Controllers\Operacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\ProvisionDetalle;

class ProvisionController extends Controller
{
    public function getListGastoOperacion(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $cNombreOperacion       = $request->cNombreOperacion;
        $cAnioOperacion         = $request->cAnioOperacion;
        $cEstado                = $request->cEstado;

        $cNombreOperacion       = ($cNombreOperacion == NULL) ? ($cNombreOperacion = '') : $cNombreOperacion;
        $cAnioOperacion         = ($cAnioOperacion == NULL) ? ($cAnioOperacion = '') : $cAnioOperacion;
        $cEstado                = ($cEstado == NULL) ? ($cEstado = '') : $cEstado;

        $rpta = DB::select('call sp_Provision_getListGastoOperacion(?,?,?)', [$cNombreOperacion, $cAnioOperacion, $cEstado]);

        return $rpta;
    }

    #Getting Catalago tipos de Provisiones
    public function getListCatProvisiones(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $rpta = DB::select('call sp_Provision_getListCatProvisiones()');

        return $rpta;
    }

    public function getInfoProvisionDataById(Request $request)
    {
        if (!$request->ajax()) return redirect('');

        $nIdProvision = $request->nIdProvision;

        $nIdProvision     = ($nIdProvision == NULL) ? ($nIdProvision = 0) : $nIdProvision;

        $rpta =  DB::select('call sp_Provision_getInfoProvisionDataById(?)', [$nIdProvision]);

        return $rpta;
    }

    public function setRegistraOperacion(Request $request)
    {
        if (!$request->ajax()) return redirect('');

        $cNombreProv            = $request->cNombreProv;
        $cAnioOperacion         = $request->cAnioOperacion;
        $cTipoProvision         = $request->cTipoProvision;
        $cUnidadesTotales       = $request->cUnidadesTotales;
        $unidadSeleccionadas    = $request->unidadSeleccionadas;
        $cEstimacionOperacion   = $request->cEstimacionOperacion;
        $cDescripcion           = $request->cDescripcion;

        //
        $cNombreProv            = ($cNombreProv == NULL) ? ($cNombreProv = '') : $cNombreProv;
        $cAnioOperacion         = ($cAnioOperacion == NULL) ? ($cAnioOperacion = '') : $cAnioOperacion;
        $cTipoProvision         = ($cTipoProvision == NULL) ? ($cTipoProvision = 0) : $cTipoProvision;
        $cUnidadesTotales       = ($cUnidadesTotales == false) ? ($cUnidadesTotales = 0) : $cUnidadesTotales;
        $cEstimacionOperacion   = ($cEstimacionOperacion == NULL) ? ($cEstimacionOperacion = 0) : $cEstimacionOperacion;
        $cDescripcion           = ($cDescripcion == NULL) ? ($cDescripcion = '') : $cDescripcion;



        //transaction
        try {
            DB::beginTransaction();
            $operacion = DB::select('call sp_Provision_RegistroProvision(?,?,?,?,?,?)', [$cNombreProv, $cAnioOperacion, $cTipoProvision, $cUnidadesTotales, $cEstimacionOperacion, $cDescripcion]);

            $unidadSeleccionadas    = ($unidadSeleccionadas == NULL) ? ($unidadSeleccionadas = []) : $unidadSeleccionadas;
            $listaUnidades          = sizeof($unidadSeleccionadas);

            if ($listaUnidades > 0) {
                foreach ($unidadSeleccionadas as $key => $value) {
                    /* var_dump($value); */
                    if ($value) {
                        DB::select(
                            'call sp_Provision_setRegistraProvisionDetalle(?,?)',
                            [
                                $operacion[0]->nIdOperacion,
                                $value
                            ]
                        );
                    } else {
                        DB::rollBack();
                        return false;
                    }
                }
            }

            //Commit
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function setCambiarEstadoOperacion(Request $request)
    {
        if (!$request->ajax()) return redirect('');

        $nIdOperacion       = $request->nIdOperacion;
        $cEstado            = $request->cEstado;

        $nIdOperacion       = ($nIdOperacion == NULL) ? ($nIdOperacion = 0) : $nIdOperacion;
        $cEstado            = ($cEstado == NUll) ? ($cEstado = 0) : $cEstado;


        $rpta = DB::select('call sp_Provision_setCambiarEstadoOperacion(?,?)', [$nIdOperacion, $cEstado]);
    }

    public function getObtenerOperacionById(Request $request)
    {
        if (!$request->ajax()) return redirect('');

        $nIdOperacion       = $request->nIdOperacion;

        $rpta = DB::select('call sp_Provision_getObtenerOperacionById(?)', [$nIdOperacion]);

        return $rpta;
    }

    public function setEditarOperacion(Request $request)
    {
        if (!$request->ajax()) return redirect('');
        $nIdProvision           = $request->nIdProvision;
        $cNombreProv            = $request->cNombreProv;
        $cAnioOperacion         = $request->cAnioOperacion;
        $cTipoProvision         = $request->cTipoProvision;
        $cUnidadesTotales       = $request->cUnidadesTotales;
        $unidadSeleccionadas    = $request->unidadesAceptadas;
        $cEstimacionOperacion   = $request->cEstimacionOperacion;
        $cDescripcion           = $request->cDescripcion;

        $cNombreProv            = ($cNombreProv == NULL) ? ($cNombreProv = '') : $cNombreProv;
        $cAnioOperacion         = ($cAnioOperacion == NULL) ? ($cAnioOperacion = '') : $cAnioOperacion;
        $cTipoProvision         = ($cTipoProvision == NULL) ? ($cTipoProvision = 0) : $cTipoProvision;
        $cUnidadesTotales       = ($cUnidadesTotales == false) ? ($cUnidadesTotales = 0) : $cUnidadesTotales;
        $cEstimacionOperacion   = ($cEstimacionOperacion == NULL) ? ($cEstimacionOperacion = 0) : $cEstimacionOperacion;
        $cDescripcion           = ($cDescripcion == NULL) ? ($cDescripcion = '') : $cDescripcion;

        /* Transacctions */
        //transaction
        try {
            DB::beginTransaction();
            $operacion = DB::select('call sp_Provision_setEditarOperacion(?,?,?,?,?,?,?)', [$nIdProvision, $cNombreProv, $cAnioOperacion, $cTipoProvision, $cUnidadesTotales, $cEstimacionOperacion, $cDescripcion]);

            $unidadSeleccionadas    = ($unidadSeleccionadas == NULL) ? ($unidadSeleccionadas = []) : $unidadSeleccionadas;
            $listaUnidades          = sizeof($unidadSeleccionadas);

            if ($listaUnidades > 0) {

                ProvisionDetalle::where('catprovicion_id', $nIdProvision)->delete();

                foreach ($unidadSeleccionadas as $key => $value) {
                    if ($value) {
                        DB::select(
                            'call sp_Provision_setEditaProvisionDetalle(?,?)',
                            [
                                $request->nIdProvision,
                                $value["id"]
                            ]
                        );
                    } else {
                        DB::rollBack();
                        return false;
                    }
                }
            }

            //Commit
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
}
