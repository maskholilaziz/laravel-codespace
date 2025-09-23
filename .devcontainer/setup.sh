#!/usr/bin/env bash
set -e

# Pastikan .env ada
if [ ! -f .env ]; then
  cp .env.example .env
fi

# Set koneksi DB ke service "mysql" dari Compose
sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' .env
sed -i 's/^DB_HOST=.*/DB_HOST=mysql/' .env
sed -i 's/^DB_PORT=.*/DB_PORT=3306/' .env
sed -i 's/^DB_DATABASE=.*/DB_DATABASE=fresh/' .env
sed -i 's/^DB_USERNAME=.*/DB_USERNAME=root/' .env
sed -i 's/^DB_PASSWORD=.*/DB_PASSWORD=admin123/' .env

# Install dependency backend & frontend
composer install --no-interaction --prefer-dist
php artisan key:generate || true

# Tunggu MySQL ready (jaga-jaga)
until mysqladmin ping -hmysql -uroot -padmin123 --silent; do
  echo "Waiting for MySQL…"
  sleep 2
done

php artisan migrate --force || true
npm ci || npm install
