<?php

use Illuminate\Database\Seeder;
use App\Tipoinventory;

class TipoInventarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoinventory::create([
            'descripcion'=> 'Refacción'
        ]);
        Tipoinventory::create([
            'descripcion'=> 'Herramienta'
        ]);
    }
}
