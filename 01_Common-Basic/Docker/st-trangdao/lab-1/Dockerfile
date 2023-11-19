FROM php:8.2.9-fpm 
# Set working directory
WORKDIR /var/www
# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    locales \
    libpng-dev \
    libzip-dev \
    zip \
    vim \
    git \
    curl \
    unzip 
# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql 
RUN docker-php-ext-enable pdo_mysql
# mysqli mbstring zip exif pcntl
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Create system user to run Composer and Artisan Commands
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www \
    && chown -R www:www /var/www
# Change current user to www
USER www
