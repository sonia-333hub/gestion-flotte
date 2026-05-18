FROM php:8.2-fpm

WORKDIR /app

# ======================
# Dépendances système
# ======================
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev

# ======================
# Extensions PHP
# ======================
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd

# ======================
# NODE JS (OBLIGATOIRE POUR VITE)
# ======================
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# ======================
# COMPOSER
# ======================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ======================
# APP COPY
# ======================
COPY . .

# ======================
# BACKEND INSTALL
# ======================
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# ======================
# FRONTEND BUILD (IMPORTANT)
# ======================
RUN npm install
RUN npm run build

# ======================
# PERMISSIONS
# ======================
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000