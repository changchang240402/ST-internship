## Table of Contents

- [Setup](#setup)
    - [1. Create laravel-framework](#step-1-create-laravel-framework)
    - [2. Write DockerFile](#step-2-write-Dockerfile-and-Dockercompose)
    - [3. Execute Docker](#step-3-excute-docker)
    - [4. Run Composer](#step-4-install-composer-dependencies)

# Setup

Create a remote reposity "Example-app". Then I clone this to my local reposity

## Step 1: Create Laravel Framework

Using this command line to add Laravel Framework into my app

## Step 2: Write Dockerfile and docker-compose.yml

In `docker-compose.yml`, I define 5 services: 
- laravel
- nginx
- minio 
- redis
- mysql

In `Dockerfile` I:
- Set up user name and user uid.
- Install system dependencies (git, curl, libpng-dev, libonig-dev,... ).
- Install PHP extensions.
- Get latest composer.
- Create system user to run Composer and Artisan Commands.
- Set working directory.

In `./docker/nginx/laravel.conf` I write a configuration of nginx.

```sh
  server {
    listen 80;
    index index.php;
    root /var/www/public;

    client_max_body_size 51g;
    client_body_buffer_size 512k;
    client_body_in_file_only clean;

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_read_timeout 1800; 
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
        gzip_static on;
    }

    error_log  /var/log/nginx/error.log;
    access_log /var/log/nginx/access.log;
}
```

## Step 3: Execute Docker

Run container

  ```sh
  docker-compose up -d 
  ```

After the container has been setup, check the status of containers with

  ```sh
  docker-compose ps
  ```

## Step 4: Install Composer dependencies
Bash into your container:

  ```sh
  docker-compose exec <container-ID> bash
  ```

When I bash successfully, I install composer dependencies :

  ```sh
  composer install
  ```

and finally generate a key

  ```sh
  php artisan key:generate
  ```

# Your app should now be accessible under `localhost:8989`




