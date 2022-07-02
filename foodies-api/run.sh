#!/bin/bash

echo Uploading Application Container
docker-compose up --build -d

echo Install Dependencies
docker run --rm --interactive --tty -v $PWD/lumen:/app composer install

echo Make migrations
docker exec -it php php /var/www/html/artisan migrate

echo Information of new containers
docker ps -a


