# Etapa base: PHP con extensiones necesarias
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar Node.js 18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de dependencias primero (para aprovechar cache)
COPY composer.json composer.lock package.json package-lock.json ./

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Instalar dependencias JS
RUN npm ci --production=false

# Copiar el resto de los archivos
COPY . .

# Compilar assets
RUN npm run build

# Crear directorios necesarios y dar permisos
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Generar clave si no existe (esto debería estar en .env)
RUN php artisan key:generate --force || true

# Cachear configuración
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Exponer el puerto
EXPOSE 10000

# Comando para iniciar Laravel
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000