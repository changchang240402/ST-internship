FROM php:8.2.9-fpm

COPY .env /var/

# Install requirement packages
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    vim

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

# Install Composer
RUN curl -sS RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change ownership to www
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www \
    && chown -R www:www /var/www

# Using /var/www as working directory
WORKDIR /var/www

# Interact as user www
USER www