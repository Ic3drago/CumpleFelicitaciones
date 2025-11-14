<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Importa la fachada URL

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // === SOLUCIÓN PARA CONTENIDO MIXTO EN RENDER ===
        // Fuerza a Laravel a generar todas las URL con HTTPS
        // cuando la aplicación está en el entorno de producción (Render).
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Si usas Paginator, su llamada iría aquí, por ejemplo:
        // Paginator::useBootstrapFive(); 
    }
}