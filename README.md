## Horse Racing Simulator

#### Requirements:

* Docker
* Docker Compose
* PHP 7.2

```$xslt
# run docker to create db (check http://127.0.0.1:8080) 
docker-compose up

# Install dependencies
composer install

# dump env file
composer dump-env local

# create database
php bin/console doctrine:migrations:migrate

# database access
# http://127.0.0.1:8080
# user: allan password: dev

# Tests
php bin/phpunit

# access the application 
# http://127.0.0.1:8000
php bin/console server:run
```
