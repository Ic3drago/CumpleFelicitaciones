# Etapa base: PHP con extensiones necesarias
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias PHP (sin las de desarrollo)
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias JS y compilar si usas Vite o Tailwind
RUN npm install && npm run build || echo "No frontend build step"

# Generar clave de aplicación (no falla si ya existe)
RUN php artisan key:generate || true

# Cachear configuración y rutas para mejor rendimiento
RUN php artisan config:cache && php artisan route:cache || true

# Asignar permisos a storage y bootstrap
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto dinámico que Render usa
EXPOSE 10000

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
