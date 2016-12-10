FROM php:5.6-apache

RUN a2enmod rewrite expires

RUN apt-get update && apt-get install -y libpng12-dev libjpeg-dev && rm -rf /var/lib/apt/lists/* \
	&& docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
	&& docker-php-ext-install gd opcache pdo pdo_mysql


WORKDIR /var/www/html
# RUN apt-get update
# RUN apt-get -f install -y
# RUN apt-get install -y wget
# RUN apt-get update && apt-get install -y \
#     libmcrypt-dev \
#     libfreetype6-dev \
#     libjpeg62-turbo-dev \
#     libmcrypt-dev \
#     libpng12-dev \
#     php-apc
# RUN docker-php-ext-install mbstring mysql mcrypt pdo_mysql zip
# RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
# RUN docker-php-ext-configure pdo --with-pdo-mysql --with-mysql-sock=/var/mysql/mysql.sock
# RUN docker-php-ext-install pdo
#
#

RUN usermod -u 1000 www-data
RUN chmod -R 777 /var/www/html


# RUN php5enmod mcrypt && service apache2 restart

RUN service apache2 restart
