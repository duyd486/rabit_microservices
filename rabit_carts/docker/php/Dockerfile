FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libzip-dev libpng-dev \
    libonig-dev libsqlite3-dev libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/rabit_carts

COPY composer.json composer.lock ./

# composer
RUN composer install --dev --optimize-autoloader --no-interaction --no-scripts

COPY . /var/www/rabit_carts

RUN composer dump-autoload --optimize && \
php artisan package:discover --ansi

RUN chown -R www-data:www-data /var/www/rabit_carts \
&& chmod -R 775 storage bootstrap/cache

CMD [ ! -f .env ] && cp .env.example .env || true && php-fpm
