# Use the official PHP FPM image as the base image
FROM php:8.3-fpm

# Install system dependencies and PHP extensions required for Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    libxml2-dev \
    libicu-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql xml intl \
    && apt-get upgrade -y  # Upgrade all packages to their latest versions

# Set the working directory inside the container
WORKDIR /var/www

# Copy the application files into the container
COPY . .

# Install Composer (for managing PHP dependencies)
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Update Composer to the latest version
RUN composer self-update

# Install the PHP dependencies with Composer
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Update all Composer dependencies to their latest versions
RUN composer update --no-dev --optimize-autoloader --prefer-dist

# Generate application key (if not already done in the app)
RUN php artisan key:generate

# Run migrations and seeders if needed
RUN php artisan migrate --force --seed

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Command to start the PHP-FPM server
CMD ["php-fpm"]
