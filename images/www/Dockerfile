FROM php:5.6-apache

RUN apt-get update
RUN apt-get -f install -y
RUN apt-get install -y wget
RUN apt-get update && apt-get install -y \
    libmcrypt-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng12-dev \
    php-apc
RUN docker-php-ext-install mbstring mysql mcrypt pdo pdo_mysql zip
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/


RUN a2enmod rewrite

RUN usermod -u 1000 www-data
RUN chmod -R 777 /var/www/html
# RUN mkdir /var/www/html
# RUN echo "mysql.default_socket = /path/to/mysql.sock" > /usr/local/etc/php
# ADD ext-mysqli.ini /usr/local/etc/php/conf.d/ext-mysqli.ini
RUN php5enmod mcrypt && service apache2 restart
