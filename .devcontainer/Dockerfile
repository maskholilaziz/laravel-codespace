# Base devcontainer PHP 8.3 (Debian/Bookworm) dari Microsoft
FROM mcr.microsoft.com/devcontainers/php:8.3

# Install ekstensi PHP yang lazim untuk Laravel
# Image devcontainer sudah include helper "install-php-extensions"
RUN install-php-extensions bcmath gd intl mbstring pdo_mysql zip exif pcntl

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Node.js (untuk Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs mysql-client \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
