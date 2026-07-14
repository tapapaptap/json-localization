FROM php:8.4-fpm-alpine

# Системные пакеты
RUN apk add --no-cache \
    bash \
    curl \
    unzip \
    zip \
    libzip-dev \
    icu-dev \
    oniguruma-dev

# PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    zip \
    intl

# Redis
RUN apk add --no-cache --virtual .build-deps \
    autoconf \
    g++ \
    make \
    linux-headers \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del .build-deps

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Пользователь
RUN chown -R www-data:www-data /var/www/html

CMD ["php-fpm"]