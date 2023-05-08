<?php

use Illuminate\Database\Seeder;
use App\Tipogiro;
class TipogiroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipogiro::create([
            'descripcion_giro'=> 'Taxi'
        ]);
        Tipogiro::create([
            'descripcion_giro'=> 'Renta Comercial'
        ]);
        Tipogiro::create([
            'descripcion_giro'=> 'Renta Diaria'
        ]);
    }
}
