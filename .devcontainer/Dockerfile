# Base image alpine
FROM php:8.3-cli-alpine

# Install dependency build untuk ekstensi PHP
RUN apk add --no-cache \
        bash \
        curl \
        git \
        unzip \
        icu-dev \
        oniguruma-dev \
        libzip-dev \
        libpng-dev \
        freetype-dev \
        libjpeg-turbo-dev \
        mariadb-client \
        $PHPIZE_DEPS \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        intl \
        mbstring \
        bcmath \
        zip \
        pcntl \
        gd \
        pdo_mysql \
    && apk del $PHPIZE_DEPS

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer

# Install Node.js (via apk langsung, Alpine repo biasanya versi LTS)
RUN apk add --no-cache nodejs npm
