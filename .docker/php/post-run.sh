#!/bin/sh

rm -rf app/bootstrap/cache/*
composer install
php artisan migrate:fresh --seed