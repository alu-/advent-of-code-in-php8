FROM php:8.1.0-cli-alpine3.15

LABEL maintainer="alu@byteberry.net"

COPY --from=composer:2.4.4 /usr/bin/composer /usr/bin/composer
COPY composer.* /var/www/html/

WORKDIR /var/www/html

RUN apk add --no-cache --virtual deps autoconf gcc g++ make && \
    pecl install xdebug && \
    apk del deps && \
    docker-php-ext-enable xdebug

ENTRYPOINT ["php"]
CMD ["-a"]
