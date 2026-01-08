#!/bin/bash

# Esperar a que MySQL esté listo
echo "Esperando a que la base de datos esté lista..."
while ! mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
    echo "MySQL no está listo - esperando..."
    sleep 2
done

echo "MySQL está listo!"

# Ejecutar migraciones
php artisan migrate --force

# Ejecutar seeders si es entorno de desarrollo
if [ "$APP_ENV" = "local" ]; then
    php artisan db:seed --force
fi

# Limpiar caché
php artisan config:cache
php artisan view:cache

# Iniciar Apache
exec apache2-foreground