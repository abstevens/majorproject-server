#!/usr/bin/env bash
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

brew upgrade

brew update

brew install mariadb

brew install redis

brew install homebrew/php/php71

brew install composer

composer global update

composer global require laravel/valet

composer install

valet install

valet link api.mjp

php artisan install --seed