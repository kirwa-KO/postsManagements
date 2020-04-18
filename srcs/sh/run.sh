#!/bin/bash
mkdir /var/www/html/phpMyAdmin/tmp
chmod 777 /var/www/html/phpMyAdmin/tmp
service php7.3-fpm restart
cd /var/www/html
composer global require laravel/installer
export PATH="$HOME/.composer/vendor/bin:$PATH"
service mysql restart
nginx -g "daemon off;"
