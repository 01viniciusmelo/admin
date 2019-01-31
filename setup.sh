#!/usr/bin/env bash

if [! '.env']
then
    composer install;
    cp .env.example .env;
    php artisan key:generate;
    npm install;
fi

rm public/*.jpg
php artisan migrate:refresh --seed;
composer update;