# Use the lightweight PHP image with FPM
FROM php:8.2-fpm-alpine AS build

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory to the root
WORKDIR /var/www/html

# Copy all PHP files into the container
COPY . .

# Set permissions (if needed)
RUN chown -R www-data:www-data /var/www/html

# Install Nginx
RUN apk add --no-cache nginx

# Copy the nginx configuration from conf/nginx/nginx-site.conf to the correct location
COPY conf/nginx/nginx-site.conf /etc/nginx/conf.d/default.conf

# Expose port 80
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "nginx && php-fpm"]
