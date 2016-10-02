#!/usr/bin/env bash
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

brew update

brew install mariadb
brew install redis
brew install homebrew/php/php71
brew install composer

brew services start mariadb
brew services start redis

composer global update
composer global require laravel/valet

valet install

cd application
valet link api.mjp
composer install
php artisan install --seed
