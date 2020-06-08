FROM php:7.2.1-apache

RUN a2enmod rewrite

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html/

RUN service apache2 restart
#EXPOSE 80