<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    public function run()
    {
        DB::table('paciente')->insert([
            [
              'tipo_documento_id'=>1,'numero_documento'=>'1001','nombre1'=>'Juan','nombre2'=>'Carlos',
              'apellido1'=>'Pérez','apellido2'=>'Gómez','genero_id'=>1,'departamento_id'=>1,'municipio_id'=>1,'correo'=>'juan@example.com'
            ],
            [
              'tipo_documento_id'=>2,'numero_documento'=>'1002','nombre1'=>'María','nombre2'=>'Luisa',
              'apellido1'=>'López','apellido2'=>'Martínez','genero_id'=>2,'departamento_id'=>2,'municipio_id'=>3,'correo'=>'maria@example.com'
            ],
            [
              'tipo_documento_id'=>1,'numero_documento'=>'1003','nombre1'=>'Andrés','nombre2'=>'Felipe',
              'apellido1'=>'Rojas','apellido2'=>'Salazar','genero_id'=>1,'departamento_id'=>3,'municipio_id'=>5,'correo'=>'andres@example.com'
            ],
            [
              'tipo_documento_id'=>2,'numero_documento'=>'1004','nombre1'=>'Laura','nombre2'=>'Sofía',
              'apellido1'=>'Torres','apellido2'=>'Pineda','genero_id'=>2,'departamento_id'=>4,'municipio_id'=>7,'correo'=>'laura@example.com'
            ],
            [
              'tipo_documento_id'=>1,'numero_documento'=>'1005','nombre1'=>'Carlos','nombre2'=>'Eduardo',
              'apellido1'=>'Mora','apellido2'=>'Velásquez','genero_id'=>1,'departamento_id'=>5,'municipio_id'=>9,'correo'=>'carlos@example.com'
            ],
        ]);
    }
}

