# Setup a web application with laravel, nginx, minio, redis, mysql using docker
If you want to have a docker project with the necessary software, then I will show you how to set up those environments in docker for your project.
## Web application 
### 1. Environment
- Laravel: latest
- PHP: 8.2.9
- Nginx : Latest
- MySQL: 8.0
- Minio: latest
- Redis: 4.0
### 2. Ports
Ports used in the project:

| Software | Port |
|-------------- | -------------- |
| **nginx** | 8080 |
| **mysql** | 3399 |
| **php** | 9000 |
| **minio** | 9001 |
| **redis** | 6379 |
## Use
### 1. Set up
- __Install:__
   - docker engine version 24.0.5

     __Install link:__ https://docs.docker.com/engine/install/ubuntu/
   - docker-compose 

     __Install link:__ https://docs.docker.com/compose/install/

- __Clone this project:__

    ```bash
   git clone <link git project>
   ```
- __Set up laravel for your project:__

    ```bash
   docker run -u ${UID}:${UID} --rm -v $(pwd):/app -w /app composer composer create-project laravel/laravel laravel
   ```
- __Run the application:__

You can run 1 of the following 2 commands

__Option 1__: <br>
```bash
docker compose up -d
```
__Option 2__: <br>
```bash
docker compose up --build
```
#### Note: Fix error when same port
```bash
sudo kill $(sudo lsof -t -i:port)
```
 Turn off that port and continue to run the application.

### 2. Update `.env` file
Open your `docker-compose.yml` file and use the related value. 

Suppose your `docker-compose.yml` settings:
```yaml
  #MySQL
  db:
    image: mysql:8.0
    container_name: docker_project_db
    restart: unless-stopped
    ports:
      - "3306:3306"
    environment:
      MYSQL_DATABASE: laravel
      MYSQL_ROOT_PASSWORD: admin123
      MYSQL_PASSWORD: admin123
      MYSQL_USER: admin
      SERVICE_TAGS: dev 
      SERVICE_NAME: mysql
    volumes:
      - ./mysql/dbdata:/var/lib/mysql
      - ./mysql/sql_scripts:/docker-entrypoint-initdb.d
    networks:
      - dockerproject
```

In your `.env` file you have to update the following value:

The `DB_HOST` should be the `container_name` of your `#MySQL Container`. <br>
The `DB_DATABASE` should be same as `MYSQL_DATABASE`. <br>
The `DB_PORT` should be same as `3306`. <br>
The `DB_PASSWORD` should be same as `MYSQL_ROOT_PASSWORD`. <br>

See the [advanced usages](#database) section for more options.

**EXAMPLE**

BEFORE UPDATE:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

AFTER UPDATE:

```dotenv
DB_CONNECTION=mysql
DB_HOST=docker_project_db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME= admin
DB_PASSWORD= admin123
```
### 3.Connecting via SSH

When your container up and running. You can SSH into your container by using the following command:
__Option 1__: <br>
```bash
docker exec -it CONTAINER_NAME bash
```
__Option 2__: <br>
```bash
docker exec -it CONTAINER_NAME sh
```
### 4.Running `php artisan` command

There are two options to execute your `php artisan` command.

__Option 1__: <br>
Run the following command from your project root directory.
```bash
docker-compose exec app php artisan
```
**n.b:** `app` is name of your PHP container.

__Option 2__: [SSH](#connecting-via-ssh) into your PHP container then run `php artisan`
## Deployment
After completing all the steps as above, you can run the following paths to check
   - Nginx: 
      http://localhost:8080/
   - Minio: 
      http://localhost:9001/login
## Special Cases

To Down and remove the volumes we use the next command:

```sh
docker compose down -v
```

Update Composer:

```sh
docker compose run --rm composer update
```

Run compiler (Webpack.mix.js) or Show the view compiler in node:

```sh
docker compose run --rm npm run dev
```

Run all migrations:

```sh
docker compose run --rm artisan migrate
```
## Documentation
- https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04
- https://github.com/vivasoft-ltd/laravel-docker/blob/master/README.md
## Drafters
Dao Thuy Trang