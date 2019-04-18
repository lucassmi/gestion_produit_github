FROM php:5.6-apache

COPY ./www/ /var/www/html/

RUN docker-php-ext-install mysqli
RUN apt-get update -y
RUN apt-get install git -y
RUN apt-get install nano -y
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN php composer.phar require aws/aws-sdk-php
RUN apt-get install openssl libssl-dev libcurl4-openssl-dev -y
RUN pecl install mongo
RUN echo "extension=mongo.so" > /usr/local/etc/php/conf.d/mongo.ini

EXPOSE 80
