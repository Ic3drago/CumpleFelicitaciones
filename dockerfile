# Usa la imagen base con PHP 8.2 y FPM
FROM php:8.2-fpm

# Instalar dependencias del sistema (incluyendo Nginx)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nginx \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar Node.js 18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de configuración de dependencias primero (para cache)
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Instalar dependencias de PHP (sin dev)
RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader

# Instalar dependencias de Node
RUN npm ci --only=production

# Copiar todo el código de la aplicación
COPY . .

# Instalar dependencias de desarrollo de npm solo para el build
RUN npm install --save-dev && npm run build

# Limpiar cache de npm para reducir tamaño
RUN npm cache clean --force \
    && rm -rf node_modules

# Copiar configuraciones personalizadas (Paso 2)
COPY ./docker-config/nginx.conf /etc/nginx/sites-available/default
COPY ./docker-config/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./docker-config/start.sh /usr/local/bin/start.sh

# Crear directorios necesarios y establecer permisos
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chmod +x /usr/local/bin/start.sh \
    && chown -R www-data:www-data /var/www/html

# Exponer puerto 80 (Nginx)
EXPOSE 80

# Comando de inicio
CMD ["/usr/local/bin/start.sh"]