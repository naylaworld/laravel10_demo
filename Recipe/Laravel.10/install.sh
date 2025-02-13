#!/bin/bash

# Install required packages
apt update && apt install -y

# Install composer (PHP Dependency Manager)
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Install Laravel
cd /var/www
composer create-project "laravel/laravel:^10.0" tms
cd /var/www/tms

# Configure Laravel's .env
if [ -f /root/Recipe/Laravel.10/.env ]; then
	mv /root/Recipe/Laravel.10/.env /var/www/tms/.env
fi

# MySQL - Create new user
if [ -f /root/Recipe/Laravel.10/mysql.create.user.sql ]; then
	mysql -u root < /root/Recipe/Laravel.10/mysql.sql

	# Delete the file after it has been executed
	rm -f /root/Recipe/Laravel.10/mysql.sql
fi

# NVM for nodejs and npm (Remove old version first)
apt remove -y nodejs npm
curl -fsSL https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.4/install.sh | bash
source ~/.bashrc
nvm install 20
nvm use 20
npm install && npm run build

# Laravel starter kit (Options: none, breeze, jetstream)
composer require laravel/jetstream
php artisan jetstream:install inertia

# Run migrations
php artisan migrate

# EasyPanel
# Reference: https://easypanel.netlify.app
composer require rezaamini-ir/laravel-easypanel
php artisan panel:install

# Clear cache and un-necessary files
rm -rf /var/lib/apt/lists/*

# Run Laravel
php artisan serve --host=0.0.0.0 --port=8000
