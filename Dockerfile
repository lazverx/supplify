# Stage builder
FROM php:8.4-fpm AS builder

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpq-dev libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql bcmath zip intl opcache \
    && pecl install redis \
    && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy all files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Stage production
FROM php:8.4-fpm AS production
WORKDIR /var/www

COPY --from=builder /var/www /var/www

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
