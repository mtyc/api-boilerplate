FROM php:8.2-fpm-alpine
WORKDIR "/application"

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions
RUN install-php-extensions pcov bcmath pdo_mysql sockets zip pcntl intl soap imagick xdebug-3.2.0 @composer-2 gd

RUN mkdir -p /usr/share/man/man1/
RUN mkdir -p /usr/share/man/man7/

RUN mkdir -p /usr/local/bin/
