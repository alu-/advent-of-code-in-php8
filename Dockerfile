FROM php:8.5.0-cli-alpine

LABEL maintainer="alu@byteberry.net"

COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer
COPY composer.* /var/www/html/

WORKDIR /var/www/html

RUN apk add --no-cache --virtual deps autoconf gcc g++ make linux-headers && \
    pecl install xdebug && \
    apk del deps && \
    docker-php-ext-enable xdebug

ENTRYPOINT ["php"]
CMD ["-a"]
