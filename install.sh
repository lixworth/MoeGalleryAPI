#!/usr/bin/env bash
chmod -R 777 storage
# composer install
# edit .env
# php artisan migrate
composer update
composer dump-autoload --optimize

