# Laravel Project with MySQL, Nginx, Redis and Minio 

This project provides a complete setup for developing a Laravel web application using Docker containers. It includes configurations for MySQL, Nginx, and Minio. Docker Compose is used to orchestrate these containers.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [Usage](#usage)
- [Folder Structure](#folder-structure)
- [Environment Configuration](#environment-configuration)
- [Services](#services)
- [Accessing Services](#accessing-services)
- [Managing Databases](#managing-databases)
- [Managing Minio](#managing-minio)
- [Customization](#customization)

## Prerequisites

Before you begin, ensure you have the following installed:

- Docker: https://www.docker.com/get-started
- Docker Compose: https://docs.docker.com/compose/install/

## Getting Started

1. Clone this repository to your local machine:

   ```bash
   git clone https://github.com/yourusername/project-name
2. Navigate to the project directory:
   ```bash
   cd project-name
3. Copy the .env.example file and rename it to .env:
    ```bash
    cp .env.example .env
4. Customize the .env file according to your preferences.

## Usage
To start the application, run the following command:

    docker-compose up -d

To stop the application, run:

    docker-compose down
## Folder Structure
    project-name/
    │
    ├── .docker/
    │   ├── mysql/
    │   │   └── my.cnf
    │   ├── nginx/
    │   │   └── default.conf
    │   ├── php/
    │   │   └── php.ini
    │   └── Dockerfile
    │
    ├── db/  
    │
    ├── src/
    │   ├── ... # Laravel application files
    │
    └── docker-compose.yaml

- `.docker/`: This directory contains all the containers related configuration such as PHP, Nginx, MySQL and Docerfile
  - `mysql/`: Contains MySQL configuration files.
  - `nginx/`: Contains Nginx configuration files.
  - `php/`: Contains PHP configuration files.
  - `Dockerfile`: Specifies how to build your custom Docker image 
- `db/`: Directory mapping with the MySQL container
- `src/`: This directory contains your Laravel application files.
- `docker-compose.yaml`: Defines your Docker services and their configurations.


Make sure to organize your project's files and directories according to this structure.
## Environment Configuration

Before running the Laravel application, make sure you configure the `.src/env` file to match the Docker Compose services' settings. Here's how you can set up the important environment variables:

#### MySQL Configuration

```dotenv
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=lara_db
DB_USERNAME=lara_user
DB_PASSWORD=lara_password
```
- DB_HOST should match the name of the MySQL service defined in Docker Compose (db).
- DB_PORT should match the MySQL port configured in Docker Compose (3306).
#### Redis Configuration
```dotenv
REDIS_HOST=redis
REDIS_PORT=6379
```
- REDIS_HOST should match the name of the Redis service defined in Docker Compose (redis).
- REDIS_PORT should match the Redis port configured in Docker Compose (6379).

Ensure you replace the values with the corresponding configuration from your Docker Compose setup.
#### Note: 
If you make changes to the .env file, you may need to rebuild the application container using docker-compose up -d --build app to apply the new environment settings.
## Fixing Permissions

In some cases, you might encounter permission issues with the `storage` directory of your Laravel application when running Docker containers. To resolve this, you can execute the following command inside your project directory:

```bash
sudo docker exec -it --user=root laravelapp-app chmod -R 777 /var/www/storage
```
## Service
This project includes the following services:

- Laravel Application (app)
- MySQL Database (db)
- Nginx Web Server (nginx)
- Redis Cache (redis)
- Minio Object Storage (minio)
## Accessing Services
- Laravel Application: http://localhost:8008
- MySQL Database: 
    + Host: localhost
    + Port: 3306
    + Username: lara_user
    + Password: lara_password
    + Database: lara_db
- Nginx Web Server: http://localhost:8008
- Redis Cache: Accessed internally by Laravel application
- Minio Object Storage: http://localhost:9001

## Managing Databases
You can use phpMyAdmin to manage the MySQL database:
- phpMyAdmin: http://localhost:8080
    + Server: 'db'
    + Username: 'root'
    + Password: 'root'
## Managing Minio
Minio provides a web-based interface to manage object storage. You can access it at:
- Minio Console: http://localhost:9001
## Customization
- Adjust the configurations in the .src/.env file to suit your project needs.
- Modify the Dockerfiles, Nginx configurations, and Laravel application as needed.