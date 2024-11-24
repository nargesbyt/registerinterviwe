FROM php:8.3.13-apache-bullseye

RUN docker-php-ext-configure pdo_mysql   \
    && docker-php-ext-install -j$(nproc) pdo_mysql

COPY . /var/www/html/