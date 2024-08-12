FROM php:8.1.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

RUN usermod -u 1000 www-data

WORKDIR /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala o Xdebug via PECL
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Configurações adicionais do PHP e do Xdebug
COPY ./php.ini /usr/local/etc/php/php.ini