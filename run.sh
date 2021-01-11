#!/usr/bin/env bash

composer install --no-dev
composer dump -o --no-dev

php -S 127.0.0.1:8001 -t public