FROM php:8.2-fpm

WORKDIR /app

# Installer dépendances système + outils requis par Composer
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le projet
COPY . .

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Permissions Laravel
RUN chmod -R 775 storage bootstrap/cache

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000