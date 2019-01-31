#!/usr/bin/env bash

if [[ ! -f "/.env" ]]
then
    composer install;
    npm install;
    cp .env.example .env;
    php artisan key:generate;
fi

if [[ ! -f "/public/*.jpg" ]]
then
    rm public/*.jpg
fi

