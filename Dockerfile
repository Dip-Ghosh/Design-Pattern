FROM php:8.2-cli

# Set working directory
WORKDIR /app

# Copy source code
COPY . /app

# Show PHP version (useful for debugging)
RUN php -v

# Default command
CMD ["php", "run-tests.php"]
