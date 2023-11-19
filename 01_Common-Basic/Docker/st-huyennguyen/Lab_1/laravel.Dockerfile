FROM php:8.1-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    zip unzip \
    vim \
    curl \
    git 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www \
    && chown -R www:www /var/www
USER www


