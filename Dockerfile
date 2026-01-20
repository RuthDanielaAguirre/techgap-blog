FROM php:apache

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
    libicu-dev \
    nodejs \
    npm \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar Apache
RUN a2enmod rewrite

# Directorio de trabajo
WORKDIR /var/www

# Copiar archivos de configuración de Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Copiar archivos de dependencias primero (para aprovechar caché de Docker)
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Instalar TODAS las dependencias Node (incluyendo devDependencies para el build)
RUN npm ci

# Copiar el resto del código
COPY . /var/www

# Construir assets
RUN npm run build

# Ejecutar scripts post-install de Composer
RUN composer dump-autoload --optimize

# Crear directorios Laravel necesarios y configurar permisos
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache \
    && chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Limpiar node_modules para reducir tamaño de imagen (ya no los necesitas después del build)
RUN rm -rf node_modules

# Copiar y hacer ejecutable el script de entrada
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]