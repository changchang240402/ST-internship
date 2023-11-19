
# Install Laravel & MySQL & Nginx & Minio & Redis with Docker 

## Prerequisites

- Docker Engine
- Docker Compose

## Components

|Services|Version|Port|
|-----|-----|-----|
|php (Laravel)|8.2.9-fpm||
|mysql|8.1.0|3306|
|nginx|1.19.8-alpine|8080|
|minio|latest|9000 (9001)|
|redis|7.2.0-alpine|6379|

### Step 1: Check if any docker container is running
```bash
docker container ls
```
>If you found any docker container name is the same with the services in docker-compose.yml, I would highly recommend to change the service in the docker-composer and its related for better work.

### Step 2: Change the `.env.example` file to `.env` file
This will be execute automatically when running `install.sh` file if `.env` file doesn't exist.
```sh
cp .env.example .env
```
### Step 3: Change the project environment variables in your `.env`

```dotenv
DB_ROOT_PASSWORD=admin123
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=admin
DB_PASSWORD=admin123

REDIS_PASSWORD=redispassword
REDIS_PORT=6379

# Docker #
NGINX_PORT=8080
MINIO_ACCESS_KEY=minio-access-key
MINIO_SECRET_KEY=minio-secret-key
MINIO_PORT=9000
MINIO_PORT2=9001
```

### Step 4: Docker permission check

Check if your user is in the `docker` group.
```bash
groups $USER
```

If you are not in the `docker` group, add yourself the group by using below command.
```bash
sudo groupadd docker
sudo usermod -aG docker $USER
newgrp docker
```

### Step 5: Install Laravel project

Run the below command (Only tested with Arch Linux based distro)
```bash
sh ./install.sh
```

Or

```bash
docker compose up --build -d
docker exec -it -u ${UID}:${UID} app composer create-project laravel/laravel .

#The below command is optional (If you want to use current .env file for your project)
docker exec -it -u ${UID}:${UID} app cp /var/.env /var/www/.env
docker exec -it app php artisan key:generate
```

### Step 6: Run your application
Noww you can build and run your laravel application. Check the page [localhost](http://127.0.0.1:8080) to make sure it worked correctly.
```bash
docker compose up
```


