FROM php:8.4-fpm

# System dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install \
    pdo_pgsql \
    zip \
    intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy dependency files first (IMPORTANT FOR CACHE)
COPY composer.json composer.lock ./

# Install dependencies (production safe)
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

# Copy full project AFTER composer install
COPY . .

# Permissions (Laravel wajib)
RUN chmod -R 775 storage bootstrap/cache

# Optimize Laravel (optional tapi recommended)
RUN php artisan config:cache || true
RUN php artisan route:cache || true

CMD ["php-fpm"]