# Install Laravel & MySQL & Nginx & Minio & Redis with Docker
## Prerequisites
- Docker
- Docker compose
- Composer

## Installation process

### Step 1: Create base laravel project

```sh
composer create-project laravel/laravel .
```
### Step 2: Change environment variables in `.env`
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```
### Step 3: Setup Docker

Create and config docker-compose.yml
```sh
touch docker-compose.yml
```
- Open docker-compose.yml and paste below script in it
```sh
version: '3.7'

networks:
  backend:
    driver: bridge

services:
  nginx:  
    build:
      context: .
      dockerfile: ./docker/nginx/Dockerfile  # Use the Dockerfile you created
    container_name: laravel_nginx
    restart: unless-stopped
    ports:
      - "8080:80"
    volumes:
      - ".:/var/www/html"
      - "./docker/nginx/nginx.conf:/etc/nginx/conf.d/default.conf"
    networks:
      - backend
    depends_on:
      - php

  mysql:
    image: mysql:5.7
    container_name: laravel_mysql
    ports:
      - "3386:3306"
    volumes:
      - "mysql-vol:/var/lib/mysql"
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: ${DB_DATABASE}
      MYSQL_ROOT_PASSWORD: ${DB_PASSWORD}
      MYSQL_PASSWORD: ${DB_PASSWORD}
    networks:
      - backend

  php:
    build:
      context: .
      dockerfile: ./docker/php/Dockerfile
    container_name: laravel_php
    restart: unless-stopped
    ports:
      - "9000:9000"
    volumes:
      - ./:/var/www/html
    networks:
      - backend
    environment:
      - MINIO_SERVER_ACCESS_KEY=minio-access-key
      - MINIO_SERVER_SECRET_KEY=minio-secret-key

  # redis
  redis:
    image: redis:latest
    restart: always
    volumes:
      - ./docker/redis:/var/log/redis
    ports:
      - "6379:6379"
    networks:
      - backend

  #minio
  minio:
    image: 'bitnami/minio:latest'
    ports:
      - '9001:9001'
    environment:
      - MINIO_ROOT_USER=minio-root-user
      - MINIO_ROOT_PASSWORD=minio-root-password
    networks:
      - backend 
    volumes:
      - ./docker/minio:/data

volumes:
  mysql-vol:
```
Create directory for mounting to container
```sh
mkdir docker
cd docker
mkdir php nginx redis mysql minio
```

Config Dockerfile for php
```sh
cd php
touch Dockerfile
nano Dockerfile
```
- Open Dockerfile and paste below script in it
```sh
FROM php:8.1-fpm
# set your user name, ex: user=bernardo
ARG user=noo
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www/html

USER $user
```
Config Dockerfile and nginx.conf for nginx
```sh
cd nginx
touch Dockerfile
touch nginx.conf
```
- Open Dockerfile and paste below script in it
```sh
# Use the official Nginx image as the base image
FROM nginx:stable-alpine

# Remove the default Nginx configuration
RUN rm /etc/nginx/conf.d/default.conf

# Copy your custom Nginx configuration to the container
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/
```
 - Open nginx.conf and paste below script in it
```sh
server {
    listen 80;
    listen [::]:80;
    server_name localhost;
    root /var/www/html/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;
 
    location / {
	try_files $uri $uri/ /index.php?$query_string;
    }
 
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
 
    error_page 404 /index.php;
 
    location ~ \.php$ {
	fastcgi_pass php:9000;
	fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
	include fastcgi_params;
    }
 
    location ~ /\.(?!well-known).* {
	deny all;
    }
}
```
Change mod of docker/minio
```sh
sudo chown -R 1001:1001 docker/minio
```
### Step 4: Run application
```sh
docker-compose.yml
```
Now you can access `localhost:8080` to see interesting things

