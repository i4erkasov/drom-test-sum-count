FROM php:7.4-cli

ENV APP_ENV local

ARG UID
ARG GID

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet
ENV COMPOSER_ALLOW_SUPERUSER 1

COPY ./ ./

RUN usermod -u $UID www-data \
    && groupmod -g $GID www-data

USER www-data