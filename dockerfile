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

# Crear directorios necesarios y establecer permisos
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Limpiar cache de npm para reducir tamaño
RUN npm cache clean --force \
    && rm -rf node_modules

# Exponer puerto 10000 (Render usa este puerto)
EXPOSE 10000

# Script de inicio integrado en el CMD
CMD echo "🚀 Iniciando aplicación Laravel..." && \
    echo "⏳ Esperando base de datos..." && \
    sleep 10 && \
    echo "🔧 Limpiando cache..." && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    echo "📦 Ejecutando migraciones..." && \
    php artisan migrate --force && \
    echo "🔗 Creando storage link..." && \
    php artisan storage:link || true && \
    echo "✅ Iniciando servidor en puerto 10000..." && \
    php artisan serve --host=0.0.0.0 --port=10000