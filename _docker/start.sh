#!/bin/bash

service apache2 restart

cp .env.example .env

composer install

php artisan migrate

tail -f /dev/null
