#!/usr/bin/env bash

if [! '.env']
then
    composer install;
    npm install;
    cp .env.example .env;
    php artisan key:generate;
fi

rm public/*.jpg
php artisan migrate:refresh --seed;