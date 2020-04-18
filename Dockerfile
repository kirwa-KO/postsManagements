FROM debian:buster
EXPOSE 80 443 3306 8000
RUN apt-get update
RUN apt-get install -y	nginx mariadb-server	\
						php7.3-fpm php7.3-mysql	\
						sendmail php-mbstring	\
						vim sudo unzip wget		\
						php-common php-curl		\
						php-json php-mbstring	\
						php-mysql php-xml		\
						php-zip php-gd
RUN service nginx start
RUN service php7.3-fpm start
RUN rm -rf /var/www/html/*
COPY srcs/nginx/default /etc/nginx/sites-enabled
COPY srcs/wordpress.zip /var/www/html/
COPY srcs/php/config.inc.php /var/www/html/phpMyAdmin/
COPY srcs/php/php.ini /etc/php/7.3/fpm/
COPY srcs/php/composer.json /
RUN unzip /var/www/html/wordpress.zip -d /var/www/html/
COPY srcs/phpMyAdmin.zip /var/www/html/
COPY srcs/ssl/nginx.key /etc/nginx/ssl/
COPY srcs/sh/init.sh /root/
COPY srcs/ssl/nginx.crt /etc/nginx/ssl/
COPY srcs/sh/run.sh /root/
COPY srcs/sh/phpSpreadSheet.sh /root/
RUN unzip /var/www/html/phpMyAdmin.zip -d /var/www/html/
RUN /bin/bash /root/init.sh
RUN /bin/bash /root/phpSpreadSheet.sh
RUN rm -rf	/var/www/html/phpMyAdmin.zip	\
			/var/www/html/wordpress.zip		\
			rm -rf /root/phpSpreadSheet.sh	\
			/root/init.sh
WORKDIR /var/www/html/
CMD sh /root/run.sh
