FROM php:8.2-apache

RUN apt update
# For debugging of files when we connect to the instance
RUN apt-get install vim -y
RUN apt-get install -y libzip-dev zip

RUN docker-php-ext-install pdo pdo_mysql sockets

WORKDIR /var/www/infinite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD bash -c "composer install && php artisan migrate:fresh --seed && chmod -R 777 /var/www/infinite/storage"
