# Dockerfile para la aplicación PHP con Apache
FROM php:7.4-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar los archivos de la aplicación al contenedor
COPY ./ /var/www/html/

# Copiar configuración de Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Dar permisos a la carpeta de la aplicación
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Habilitar módulos necesarios de Apache
RUN a2enmod rewrite

# Exponer el puerto de Apache
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]

