#!/bin/sh
composer install
cp .env.example .env
php artisan migrate
php artisan horizon:publish
php artisan horizon
