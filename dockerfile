# Usar imagen base con PHP 8.2
FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# --- NUEVO: AUMENTAR LÍMITE DE SUBIDA A 50MB ---
RUN echo "upload_max_filesize = 50M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini
# -----------------------------------------------

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar Node.js 18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de configuración
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Instalar dependencias de PHP
RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader

# Instalar dependencias de Node
RUN npm ci --only=production

# Copiar código
COPY . .

# Build de assets
RUN npm install --save-dev && npm run build

# Permisos
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Limpiar npm
RUN npm cache clean --force \
    && rm -rf node_modules

# Puerto
EXPOSE 10000

# Comando de inicio (incluye limpieza de caché)
CMD echo "🚀 Iniciando servidor..." && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear && \
    php artisan migrate --force && \
    php artisan storage:link || true && \
    php artisan serve --host=0.0.0.0 --port=10000