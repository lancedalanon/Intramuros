# Use the lightweight PHP image with FPM
FROM php:8.2-fpm-alpine AS build

# Install necessary extensions
RUN apk add --no-cache libpng-dev libjpeg-turbo-dev libwebp-dev libxpm-dev \
    && docker-php-ext-configure gd --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install gd pdo pdo_mysql

# Set the working directory to the root
WORKDIR /var/www/html

# Copy all PHP files into the container
COPY . .

# Set permissions (if needed)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start PHP-FPM
CMD ["php-fpm"]
