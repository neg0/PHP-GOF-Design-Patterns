FROM php:7.2-stretch

LABEL licence = "MIT"
LABEL maintainer = "Hadi Tajallaei"

RUN apt-get update -y && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    gcc-6-base \
    libc6 \
    libgcc1 \
    libbz2-dev \
    && docker-php-ext-install bz2 \
    && docker-php-ext-install opcache \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip

RUN pecl update-channels \
    && pecl install apcu-5.1.9 \
    && echo "extension=apcu.so" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini \
    && pecl install xdebug-2.6.0

COPY docker/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version

RUN mkdir +p /usr/local/patterns

WORKDIR /usr/local/patterns