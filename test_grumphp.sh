#!/bin/sh
echo "Running Pint:"
php ./vendor/bin/pint

echo "Running Security Check:"
php artisan security-check:now
