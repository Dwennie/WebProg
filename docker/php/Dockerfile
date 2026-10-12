# run this first in wsl terminal: docker pull php:8.5-fpm

FROM php:8.5-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        bcmath \
        gd \
        zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Sync the container's www-data user with your local WSL user (UID 1000)
# This prevents the "Permission denied" errors on your storage and cache folders
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www

CMD ["php-fpm"]