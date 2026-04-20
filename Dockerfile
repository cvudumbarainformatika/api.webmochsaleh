FROM php:8.1-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    libxml2-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    $PHPIZE_DEPS

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
    gd \
    pdo_mysql \
    mysqli \
    mbstring \
    exif \
    pcntl \
    bcmath \
    xml \
    zip \
    intl \
    opcache

# Set working directory
WORKDIR /var/www/html

# Clean up
RUN apk del $PHPIZE_DEPS \
    && rm -rf /tmp/* /var/cache/apk/*

# Copy existing application directory permissions
COPY . /var/www/html

# Ensure storage and bootstrap/cache are writable
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
