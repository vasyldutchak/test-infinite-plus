FROM php:8.2-apache

COPY . /var/www/infinite
RUN chmod -R 777 /var/www/infinite/storage

WORKDIR /var/www/infinite

RUN a2enmod rewrite

RUN apt update
# For debugging of files when we connect to the instance
RUN apt-get install vim -y
RUN apt-get install -y libzip-dev zip

RUN docker-php-ext-install pdo pdo_mysql sockets

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install --optimize-autoloader

RUN php artisan cache:clear && php artisan route:cache
