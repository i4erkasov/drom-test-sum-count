FROM php:7.4-cli

ENV APP_ENV local

RUN apt-get update \
    && apt-get install -y \
        && docker-php-ext-install -j$(nproc) bcmath

ARG UID
ARG GID

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

COPY ./ ./

RUN usermod -u $UID www-data \
    && groupmod -g $GID www-data

USER www-data