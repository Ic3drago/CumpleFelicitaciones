# Usa una imagen base con PHP, Nginx y fpm optimizada para desarrollo/producción
FROM php:8.2-fpm-alpine

# Instalar dependencias del sistema operativo (nginx, curl, git, etc.)
RUN apk update && apk add \
    git \
    curl \
    nginx \
    build-base \
    imagemagick \
    libxml2-dev \
    libzip-dev \
    postgresql-dev \
    mysql-client \
    && rm -rf /var/cache/apk/*

# Instalar extensiones de PHP necesarias para Laravel
# PDO, Zip, GD, y la extensión MySQL (pdo_mysql)
RUN docker-php-ext-install pdo pdo_mysql zip gd

# Descargar e instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configuración del directorio de la aplicación
WORKDIR /var/www/html

# Copia los archivos de la aplicación (excluyendo lo del .gitignore)
COPY . .

# Instalar dependencias de Composer (esto lo hace en el build)
RUN composer install --no-dev --optimize-autoloader

# Configurar permisos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Copiar la configuración Nginx por defecto y ajustarla
COPY .docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Exponer el puerto
EXPOSE 8000

# Comando para iniciar Nginx y PHP-FPM
CMD sh -c "php artisan migrate --force && nginx && php-fpm"
