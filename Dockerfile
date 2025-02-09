FROM php:8.1-fpm

ENV ACCEPT_EULA=Y

# Set working directory
WORKDIR /var/www

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other dependencies
RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    build-essential \
    apt-utils \
    nginx \
    supervisor \
    libxml2-dev \
    gnupg \
    apt-transport-https \
    zlib1g-dev \
    libicu-dev \
    g++ \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libpq-dev \
    curl \
    git \
    libsodium-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    libfreetype6-dev \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install PostgreSQL support (pdo_pgsql)
RUN docker-php-ext-install pdo_pgsql

# Install the GD extension and other required extensions
RUN apt-get update \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install intl sodium pdo zip exif pcntl bcmath

# Get the latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add user for Laravel application
RUN groupadd -g 1001 www
RUN useradd -u 1001 -ms /bin/bash -g www www

# Copy the Laravel project to the container
COPY --chown=www-data:www-data . /var/www

# Create the storage folder and set permissions
RUN mkdir -p /var/www/storage/temp/ \
    && chmod -R ug+w /var/www/storage \
    && chown www:www-data -R /var/www/ \
    && chmod 774 -R /var/www/

# Deployment steps
RUN composer update && composer install --optimize-autoloader --no-dev

# Expose port 80
EXPOSE 80

# Set the default command to run PHP-FPM
CMD ["php-fpm"]
