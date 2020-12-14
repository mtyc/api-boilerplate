# REST API Boilerplate

## Description

Project created to start writing simple but extendable REST API with Symfony framework, Doctrine ORM and simple CQRS.

## Requirements

* Docker Compose

or setup by yourself with

* PHP 7.4
* Composer 2
* nginx
* Swagger UI
* MySQL/MariaDB
* mailcatcher

## Build

### Start Docker containers

```bash
# start project containers
$ docker-compose up -d
```

### Install dependencies

```bash
# enter php container
$ docker exec -it -u $(id -u):$(id -g) api-boilerplate-php-fpm bash

# run composer
$ composer install
```

### Setup JWT

Read the documentation of [Lexik JWT Authentication Bundle](https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md#generate-the-ssl-keys)

# Have fun!!!