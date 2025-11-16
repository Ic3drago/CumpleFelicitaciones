<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Congratulation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Crear el usuario principal leyendo las credenciales de las variables de entorno
        User::factory()->create([
            'name' => env('ADMIN_NAME', 'Icedrago'), // Usa un valor por defecto si no está definido
            'email' => env('ADMIN_EMAIL', 'avilagarciabenjamin@gmail,com'),  // Usa la variable de entorno para el correo
            'password' => bcrypt(env('ADMIN_PASSWORD', 'Omega@mode666')), // Usa la variable de entorno para la contraseña
        ]);
        
        // 2. Ejecutar los factories para datos de prueba
        //Congratulation::factory(5)->create();
    }
}