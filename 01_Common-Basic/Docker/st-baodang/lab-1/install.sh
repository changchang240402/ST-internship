#!/bin/bash

YLW='\033[1;33m'
RED='\033[0;31m'
GRN='\033[1;32m'
NC='\033[0m' # No Color

if [ ! -d "src" ]; then
    mkdir src
fi
if [ ! -f ".env" ]; then
    cp .env.example .env
fi

if [ -x $(command -v docker-compose) > /dev/null ]; then
    docker-compose up --build -d
else
    docker compose up --build -d
fi
wait
docker exec -it -u ${UID}:${UID} app composer create-project laravel/laravel .
docker exec -it -u ${UID}:${UID} app cp /var/.env /var/www/.env
docker exec -it app php artisan key:generate
wait
sleep 5
echo -e "${GRN}Setup successfully! Now you can build your laravel app inside ${YLW}/src${GRN} folder"
while true 
do
    read -p "Do you want to stop all the container? [y/N] : " resp
    case "$resp" in
        [yY][eE][sS]|[yY]) 
            docker-compose down -v
            break
            ;;
        [nN][oO]|[nN])
            break
            ;;
    esac
done