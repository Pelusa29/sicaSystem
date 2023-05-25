<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function setRegistrarArchivo(Request $request){
        if(!$request->ajax()) return redirect('');
        $file = $request->file;
        $bandera = Str::random(10);
        $filename = $file->getClientOriginalName();
        $fileserver = $bandera .'_'. $filename;

        Storage::putFileAs('public/users',$file,$fileserver);

        $rpta = DB::select('call sp_Archivo_setRegistrarArchivo(?,?)',[
            asset('storage/users/'.$fileserver),
            $fileserver
        ]);

        return $rpta;
    }

     public function setAdjuntarDocumento(Request $request){
        if(!$request->ajax()) return redirect('');
        $file = $request->file;
        $tipoDocumento = $request->tipoDocumento;
        $nIdUnidad = $request->nIdUnidad;

        $bandera = Str::random(10);
        $filename = $file->getClientOriginalName();
        $fileserver = $bandera .'_'. $filename;

        Storage::putFileAs('public/users',$file,$fileserver);

        $rpta = DB::select('call sp_Unidad_setAdjuntarDocumento(?,?,?,?)',[
            $nIdUnidad,
            $tipoDocumento,
            asset('storage/users/'.$fileserver),
            $fileserver
        ]);

        return $rpta;
    }

    //Documentos para Contratos Generados
    public function setRegistrarcontratoArchivo(Request $request){
        if(!$request->ajax()) return redirect('');

        $file           = $request->file;
        $tipoDocumento  = $request->tipoDocumento;
        $nIdContrato    = $request->nIdContrato;


        $bandera = Str::random(10);
        $filename = $file->getClientOriginalName();
        $fileserver = $bandera .'_'. $filename;

        $rpta = DB::select('call sp_Contrato_setRegistrarcontratoArchivo(?,?,?,?,?)',[
            $nIdContrato,
            $tipoDocumento,
            asset('storage/contratotaxi/'.$fileserver),
            $fileserver,
            Auth::id()
        ]);

        if($rpta[0]->nIdFile > 0){
           Storage::putFileAs('public/contratotaxi',$file,$fileserver);
        }

        return $rpta;

    }

}
