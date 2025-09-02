# Gunakan PHP image + ekstensi yang dibutuhkan Laravel
FROM php:8.4-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies sistem
RUN apt-get update && apt-get install -y \
    unzip git curl libpq-dev libpng-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy semua file Laravel
COPY . .

# Install dependencies PHP (composer)
RUN composer install --no-dev --optimize-autoloader

# Copy environment example jadi .env kalau belum ada
RUN cp .env.example .env || true

# Generate key Laravel
RUN php artisan key:generate || true

# Expose port
EXPOSE 8080

# Jalankan Laravel pakai artisan serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
