<?php

use Illuminate\Database\Seeder;
use App\Tipoprovision;
class TipoProvisionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoprovision::create([
            'tipoProvision' =>'U',
            'descripcion'=> 'Por Unidad'
        ]);
        Tipoprovision::create([
            'tipoProvision' =>'S',
            'descripcion'=> 'Sucursal'
        ]);
        Tipoprovision::create([
            'tipoProvision' =>'C',
            'descripcion'=> 'Por Colaborador'
        ]);
        Tipoprovision::create([
            'tipoProvision' =>'P',
            'descripcion'=> 'Por tipo de placa'
        ]);
        Tipoprovision::create([
            'tipoProvision' =>'L',
            'descripcion'=> 'Por Local'
        ]);
        Tipoprovision::create([
            'tipoProvision' =>'N',
            'descripcion'=> 'Otro Gasto'
        ]);
    }
}
