#!/bin/bash
# Download Composer installer
echo "Downloading Composer..."
curl -sS https://getcomposer.org/installer | php

# Check if Composer was installed
echo "Composer installed: $(which php) composer.phar"

# Run Composer install
echo "Running Composer install..."
php composer.phar install --no-dev --optimize-autoloader
