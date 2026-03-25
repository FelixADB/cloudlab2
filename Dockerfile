# usamos una imagen de php base
FROM php:8.1-apache

#instalar las dependencias --> postgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# se copia el contenido de tu aplicacion al contenedor
COPY . /var/www/html/

# exponemos el puerto 80
EXPOSE 80