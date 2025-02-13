# Use the official PHP image with Apache
FROM php:8.1-apache

# Install required extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy all project files into the container
COPY . /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
