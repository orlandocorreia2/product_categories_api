#!/bin/bash

service apache2 restart

cp .env.example .env

composer install

php artisan migrate

chmod -R 777 .

tail -f /dev/null
