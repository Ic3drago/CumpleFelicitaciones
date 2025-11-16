#!/bin/bash

# Este script se ejecuta cada vez que el contenedor arranca

echo "🚀 Iniciando script de producción..."

# Ejecutar migraciones y optimizaciones de Laravel
echo "🔧 Ejecutando migraciones y optimizando..."
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Crear el storage link (si no existe)
if [ ! -L "/var/www/html/public/storage" ]; then
    echo "🔗 Creando storage link..."
    php artisan storage:link
fi

# Iniciar PHP-FPM en segundo plano
echo "✅ Iniciando PHP-FPM..."
php-fpm -D

# Iniciar Nginx en primer plano (esto mantiene el contenedor vivo)
echo "✅ Iniciando Nginx..."
nginx -g "daemon off;"
