#!/bin/bash

set -e

echo "🚀 Iniciando entrypoint de Laravel..."

# Función para esperar a que MySQL esté listo
wait_for_mysql() {
    echo "⏳ Esperando a que la base de datos esté lista..."
    
    # Usar las variables de entorno de Laravel
    DB_HOST="${DB_HOST:-db}"
    DB_PORT="${DB_PORT:-3306}"
    DB_USERNAME="${DB_USERNAME:-techgap}"
    DB_PASSWORD="${DB_PASSWORD:-secret}"
    
    # Esperar un poco más antes de intentar la conexión
    sleep 10
    
    while ! mysql -h"${DB_HOST}" -P"${DB_PORT}" -u"${DB_USERNAME}" -p"${DB_PASSWORD}" --skip-ssl -e "SELECT 1" >/dev/null 2>&1; do
        echo "   MySQL no está listo - esperando..."
        sleep 5
    done
    
    echo "✅ MySQL está listo!"
}

# Configurar permisos
echo "🔐 Configurando permisos..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Instalar dependencias si no existen
if [ ! -d "vendor" ]; then
    echo "📦 Instalando dependencias de Composer..."
    composer install --no-dev --optimize-autoloader --no-interaction
fi

# Generar clave de aplicación si no existe
if ! grep -q "APP_KEY=base64:" /var/www/.env; then
    echo "🔑 Generando clave de aplicación..."
    php artisan key:generate --force
fi

# Esperar a la base de datos
wait_for_mysql

# Limpiar caches antes de migraciones
echo "🧹 Limpiando caches..."
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Ejecutar migraciones
echo "🗄️ Ejecutando migraciones..."
php artisan migrate --force || echo "Migraciones ya existen, continuando..."
# Ejecutar seeders si es entorno de desarrollo
if [ "${APP_ENV}" = "local" ] || [ "${APP_ENV}" = "development" ]; then
    echo "🌱 Ejecutando seeders..."
    php artisan db:seed --force || echo "Seeders fallaron, continuando sin datos de prueba..."
fi

# Optimizar para producción si no es local
if [ "${APP_ENV}" != "local" ] && [ "${APP_ENV}" != "development" ]; then
    echo "⚡ Optimizando para producción..."
    php artisan config:cache
    php artisan view:cache
    php artisan route:cache
fi

echo "🎉 Laravel está listo!"

# Iniciar Apache
exec apache2-foreground