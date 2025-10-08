<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDocumentoSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipos_documento')->insert([
            ['nombre'=>'Cédula de ciudadanía'],
            ['nombre'=>'Tarjeta de identidad'],
        ]);
    }
}

