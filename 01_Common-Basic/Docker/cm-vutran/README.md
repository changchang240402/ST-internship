# First, create laravel project
[Click this if you not install composer](https://getcomposer.org/download/)
```sh
composer create-project laravel/laravel your-project-name
```


# Second, create Dockerfile in your project, this here is code in Docker file:
```sh
FROM php:8.1-fpm
# set your user name, ex: user=bernardo
ARG user=carlos
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
WORKDIR /var/www

USER $user
```


# Next, create folder nginx and create Dockerfile, nginx.conf in this folder:
## Dockerfile
```sh
FROM nginx:latest

RUN rm /etc/nginx/conf.d/default.conf

COPY nginx.conf /etc/nginx/conf.d/

```



## nginx.conf: 
```sh
#config
server {
    listen 80;
    index index.php index.html;
    root /var/www/public;
    access_log /var/log/nginx/access.log;
    error_log /var/log/nginx/error.log;
    location / {
        try_files $uri /index.php?$args;
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
}

```


# Next, in your project folder, create docker-compose.yml:
```sh

version: '3'

services:
  #build php
  app:
    build:
      context: .
      dockerfile: Dockerfile
    restart: unless-stopped
    working_dir: /var/www/
    volumes:
      - ./:/var/www/
    networks:
      - project

  #build nginx with ubuntu
  nginx-custom:
    build:
      context: ./nginx
      dockerfile: Dockerfile
    ports:
      - "${NGINX_PORT}:80"
    volumes:
      - ./:/var/www/
      - ./nginx/:/etc/nginx/conf.d/
    networks:
      - project

  #build minio, pull from docker hub
  minio:
    image: minio/minio
    container_name: minio2
    ports:
      - "${MINIO_DATA_PORT}:9000"
      - "${MINIO_ADMIN_PORT}:9001"
    volumes:
      - ./storage:/data
    environment:
      MINIO_ROOT_USER: ${MINIO_USER}
      MINIO_ROOT_PASSWORD: ${MINIO_PASSWORD}
    command: server --console-address ":9001" /data

  #build redis, pull from docker hub
  redis:
    image: redis:latest
    container_name: redis_app
    ports:
      - "${REDIS_PORT}:6379"
    networks:
      - project

  #build mysql, pull from docker hub
  db:
    image: mysql
    restart: unless-stopped
    environment:
      - MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
      - MYSQL_DATABASE: ${MYSQL_DATABASE}
      - MYSQL_USER: 
      - MYSQL_PASSWORD: ${MYSQL_PASSWORD}
    ports:
      - "${MYSQL_PORT}:3306"
    volumes:
      - ./mysql-data:/var/lib/mysql
    networks:
      - project

volumes:
  storage: {}
  mysql-data:

networks:
  project:
    driver: bridge

```


## In terminal project, type this to install:
```sh
docker-compose up -d
```
## All container after install

![All-container](<Screenshot from 2023-08-24 09-40-44.png>)


# If you want to connect laravel with mysql, redis, in env file change:
## First, you create .env from .env.example:
```sh
cp .env.example .env
```
## Then change .env like this:
```
DB_HOST=db
DB PORT=3307
DB_DATABASE=laravel
DB_PASSWORD=your-password

REDIS_HOST=redis_app
REDIS_PASSWORD=null
REDIS_PORT=6379
```



## localhost:8888 for project laravel
![Laravel](<Screenshot from 2023-08-22 16-32-22.png>)

## localhost:9001 for minio
![Minio](<Screenshot from 2023-08-22 16-32-56.png>)







