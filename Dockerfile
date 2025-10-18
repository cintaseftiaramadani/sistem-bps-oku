# 1. Base image PHP 8.2 + Apache
FROM php:8.2-apache

# 2. Set working directory
WORKDIR /var/www/html

# 3. Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring bcmath xml opcache \
    && a2enmod rewrite

# 4. Copy project files
COPY . /var/www/html

# 5. Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 6. Install Composer dependencies
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-interaction --prefer-dist --optimize-autoloader

# 7. Install Node dependencies & build frontend
RUN npm install --force
RUN npm run build || npm run prod || echo 'No frontend build'

# 8. Expose port 80
EXPOSE 80

# 9. Run Laravel migrations & serve
CMD php artisan migrate --force && apache2-foreground
