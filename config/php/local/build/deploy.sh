#!/usr/bin/env bash
composer install
while ! mysqladmin ping -h "mysql_local" --password="root" --user="root" --silent; do
    echo "Waiting for mysql...";
    sleep 1;
done
sleep 1

cp environments/.env.local .env

php bin/yii migrate/up --interactive=0
php bin/yii config/init

php-fpm
