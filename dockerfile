# Etapa base: PHP con extensiones necesarias
FROM php:8.2-fpm

# Instalar dependencias del sistema (las mismas)
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto
COPY . .

# 1. Instalar dependencias PHP (sin las de desarrollo)
RUN composer install --no-dev --optimize-autoloader

# 2. Instalar dependencias JS
RUN npm install

# 3. Compilar los assets de frontend (usamos '|| true' para evitar que falle el build si 'npm run build' no es estrictamente necesario o tiene errores menores)
RUN npm run build || true

# 4. Generar clave de aplicación (si no está definida en ENV)
RUN php artisan key:generate || true

# 5. Cachear configuración y rutas
RUN php artisan config:cache && php artisan route:cache || true

# Asignar permisos a storage y bootstrap
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto
EXPOSE 10000

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000