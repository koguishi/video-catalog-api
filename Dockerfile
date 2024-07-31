FROM php:8.1.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

RUN usermod -u 1000 www-data

WORKDIR /var/www
    
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer