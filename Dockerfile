FROM php:8.0-apache
WORKDIR /var/www/html
COPY src/. /var/www/html
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
RUN apt-get -y update && apt-get -y upgrade
RUN apt-get update && \
    apt-get install -y libxml2-dev
RUN docker-php-ext-install soap
EXPOSE 8080