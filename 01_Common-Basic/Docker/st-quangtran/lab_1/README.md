# Docker Laravel MySQL Nginx Redis Minio


Project Starter For Web Application Development with Laravel, MySQL, Nginx, Redis, Minio and Docker.


## Getting started 

### Requirements
You must [download and install Docker](https://docs.docker.com/get-docker/) if you don't already have it.

### Installing the Project

This template can be installed.

Using Clone the Laravel Project:

```sh
git clone https://github.com/especializati/setup-docker-laravel.git
```

Using composer: 

```sh
composer create-project --prefer-dist laravel/laravel my-laravel-app
```

Change into an existing project folder

```sh
cd docker_laravel/
```

### Setup Docker

If there is no .env file insde project directory, then make a new copy using:

```sh
cp .env.example .env
```
Update ```.env``` file environment variables:

```shell
APP_NAME="Docker-Laravel"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### Run application

Starting the environment is prette straight forward.

```bash
$ docker-compose up -d
```

This will have a working environment available at [http://localhost:8000](http://localhost:8000)


### Removing the environment

To stop the environment and remove volume data and container network (eg. for starting over):

```bash
$ docker-compose down 
```
