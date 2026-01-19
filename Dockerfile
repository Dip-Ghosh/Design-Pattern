FROM php:8.2-cli

WORKDIR /app

RUN docker-php-ext-install pdo pdo_mysql

COPY . /app

# Show PHP version (useful for debugging)
RUN php -v

# Default command
CMD ["php", "run-tests.php"]
