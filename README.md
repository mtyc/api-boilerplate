# REST API Boilerplate

## Description

Project created to start writing simple but extendable REST API with Symfony framework, Doctrine ORM and simple CQRS.

## Requirements

* Docker Compose

or setup by yourself with

* PHP 8.2
* Composer 2
* nginx
* Swagger UI
* MySQL/MariaDB
* mailcatcher

## Build

### Start Docker containers

```bash
# start project containers
$ make up
```

### Install dependencies

```bash
# install required vendors
$ make vendor

# run migrations
$ make dmm

# run data fixtures
$ make dfl
```

### Setup JWT

Read the documentation of [Lexik JWT Authentication Bundle](https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md#generate-the-ssl-keys)

# Have fun!!!