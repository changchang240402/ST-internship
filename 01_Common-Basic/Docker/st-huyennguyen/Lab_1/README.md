# A basic web application with Laravel, Nginx, MinIO, Redis, Mysql using Docker

## 1. Requirements

- Docker
  
- Docker compose

    Note: OS recommendation - Linux Ubuntu based.

## 2. Components
  
| Services | Port |
|-----|-----|
|**PHP: 8.1-fpm**|9000|
|**Laravel: 10.10**|9000|
|**Nginx: 1.25.2-alpine**|80|
|**MySQL: latest**|3306|
|**Redis: 7.2.0-alpine**|6379|
|**minIO: latest**|(9000) 9001|


## 3. Setting up Docker and docker-compose

If your computer installed docker and docker-compose, you can skip this step and go to the next part. 

1. For installing docker please follow step mentioned on pages [install docker on Linux Ubuntu](https://docs.docker.com/install/linux/docker-ce/ubuntu/) or [install docker on others OS](https://docs.docker.com/engine/install/).


2. For installing docker-compose please follow step mentioned on page [install docker-compose on Linux Ubuntu](https://docs.docker.com/compose/install/standalone/) if you are using Linux OS.

    Note: Please run next cmd after above step 2 if you are using Linux OS: 


    ```bash
    sudo usermod -aG docker $USER
    ```
 

## 4. Get started

1. Create the `.env` file from `.env.example` file
   
    In the `laravel` folder, copy `.env` file with following command:

    ```bash
    cp .env.example .env
    ```
   
    > ## Remember
    >Update the project environment variables in your `.env` and `docker-compose.yml` file.
    >
    > The configuration of the database must be the same on both sides.
    
    ```dotenv
    # docker-compose.yml
    MYSQL_DATABASE: laravel
    MYSQL_USER: admin
    MYSQL_PASSWORD: admin123
    MYSQL_ROOT_PASSWORD: admin123
    ```

    ```dotenv
    # .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME= admin
    DB_PASSWORD= admin123
    ```


2. Build and start docker container from your terminal:

    ```bash
    docker compose up --build
    ```

    or

    ```bash
    docker-compose up --build
    ```


3. In order to view this application, please open in your browser next urls:
   
   - http://localhost
  
   - http://localhost:80
  
   - http://127.0.0.1:9001 (MinIO)
  
    Note: With MySQL and Redis services, to connect to databse, please use CLI or unified visual tools for databases. eg: [MySQLWorkbench](https://www.mysql.com/products/workbench/).

4. In order to stop and remove docker container, please use next make command:
   
   ```bash
   docker compose down -v
   ``` 
   or

   ```bash
   docker-compose down -v
   ``` 

## 5. Helping commands

There's been added some containers that can interact directly with the environment to utilize Composer and Artisan within the docker network.

Examples:

```bash
$ docker compose run artisan migrate:refresh
$ docker compose run artisan queue:work --once
$ docker compose run composer require laravel/sanctum
$ docker compose run composer dump
```

