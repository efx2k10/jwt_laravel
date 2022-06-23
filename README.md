# Выполнить
docker-compose up -d

docker-compose exec app composer instal

docker-compose exec app php artisan key:generate

docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed

docker-compose exec app php artisan jwt:secret

npm i


# env

DB_CONNECTION=mysql

DB_HOST=db

DB_PORT=3306

DB_DATABASE=docker_base

DB_USERNAME=root

DB_PASSWORD=root

