FROM php:7.2-apache

RUN apt-get update && apt-get upgrade -y \
  && apt-get autoremove -y \
  && echo "America/Chicago" > /etc/timezone \
  && dpkg-reconfigure -f noninteractive tzdata \
  && docker-php-ext-install pdo pdo_mysql mysqli

COPY /src /var/www/html

EXPOSE 80