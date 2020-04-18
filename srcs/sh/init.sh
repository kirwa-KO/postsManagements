#!/bin/bash

service mysql start
mysql -u root -e "CREATE DATABASE wordpress;"
mysql -u root -e "CREATE USER 'kirwa'@localhost IDENTIFIED BY 'kirwa@2020';"
mysql -u root -e "GRANT ALL PRIVILEGES ON * . * TO 'kirwa'@'localhost';"
mysql -u root -e "FLUSH PRIVILEGES;"
wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/local/bin/wp
cd /var/www/html/wordpress
wp core config --dbhost=localhost --dbname=wordpress --dbuser=kirwa --dbpass=kirwa@2020 --allow-root
wp core install --url=localhost/wordpress --title="Ibn Taofail" --admin_name=admin --admin_password=root@2020 --admin_email=root@root.root --allow-root
mkdir -p /etc/nginx/ssl
