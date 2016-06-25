FROM php:5.6-apache

RUN usermod -u 1000 www-data
# RUN mkdir /var/www/html
RUN chmod -R 777 /var/www/html
RUN a2enmod rewrite
RUN service apache2 restart
