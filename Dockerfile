# Usar una imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones de PHP necesarias
RUN docker-php-ext-install mysqli

# Copiar los archivos del proyecto al contenedor
COPY ./BackEnd /var/www/html/CRUDPHP/BackEnd/
COPY ./FrontEnd /var/www/html/CRUDPHP/FrontEnd/

# Establecer permisos adecuados para los archivos copiados
RUN chown -R www-data:www-data /var/www/html/CRUDPHP && \
    chmod -R 755 /var/www/html/CRUDPHP

# Crear un archivo de configuración para Apache
RUN printf '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/CRUDPHP\n\
    <Directory /var/www/html/CRUDPHP>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>\n' > /etc/apache2/sites-available/000-default.conf

# Habilitar módulos necesarios para Apache
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80