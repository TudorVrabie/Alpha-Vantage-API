FROM php:8.1-fpm-alpine

# Set working directory
WORKDIR /var/www

RUN apk update && apk add --no-cache \
    build-base \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    oniguruma-dev \
    curl \
    sqlite \
    nginx \
    supervisor \
    libxml2-dev \
    php-soap \
    openssh-keygen \
    openssh-client \
    mysql-client \
    mariadb-connector-c

# Install required extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql opcache mbstring zip exif pcntl gd \
    && docker-php-ext-enable pdo_mysql

# Install Redis Extension
RUN apk add autoconf && pecl install -o -f redis \
    &&  docker-php-ext-enable redis && apk del autoconf
# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
