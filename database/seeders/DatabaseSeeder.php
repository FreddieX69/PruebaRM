<?php

namespace Database\Seeders;

use App\Models\Estado;
use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $roles = ['administrador','operador','solicitante'];
        foreach ($roles as $rol) {
            Rol::create([
                'nombre_rol' => $rol,
            ]);
        }

        $estados = ['rechazado','aceptado','pendiente'];
        foreach ($estados as $estado) {
            Estado::create([
                'nombre_estado' => $estado,
            ]);
        }
        
        Usuario::create([
            'primer_nombre' => 'Fredy',
            'segundo_nombre' => 'Alexander',
            'primer_apellido' => 'Xalin',
            'segundo_apellido' => 'Aguin',
            'fecha_nacimiento' => '2001/07/05',
            'num_dpi' => '3078386250403',
            'salario'=>5500.00,
            'profesion'=>'Desarrollador',
            'anios_laborando'=>5,
            'salario'=>10000,
            'email'=>'alexanderxalinfredy@gmail.com',
            'contrasenia'=>Hash::make('123456789'),
            'rol_id'=>1,
            'estado_id'=>2
        ]);

        Usuario::factory(15)->create();
    }
    
}
