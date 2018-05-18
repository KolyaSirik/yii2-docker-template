#!/usr/bin/env bash
composer install
while ! mysqladmin ping -h "mysql_prod" --password="root" --user="root" --silent; do
    echo "Waiting for mysql...";
    sleep 1;
done
sleep 5

cp environments/.env.prod .env

php bin/yii migrate/up --interactive=0
php bin/yii config/init

php-fpm
