#!/bin/bash

export COMPOSER_ALLOW_SUPERUSER=1

a2enmod rewrite
service apache2 reload

composer install
php artisan migrate:fresh --seed
