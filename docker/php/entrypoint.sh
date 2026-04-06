#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

if [ ! -f artisan ]; then
  echo "[setup] Installing new Laravel project..."
  composer create-project laravel/laravel . --no-interaction
fi

if [ ! -f .env ]; then
  cp .env.example .env
fi

mkdir -p database
if [ ! -f database/database.sqlite ]; then
  touch database/database.sqlite
fi

php -r '$env = file_exists(".env") ? file_get_contents(".env") : ""; $replacements = ["DB_CONNECTION=mysql" => "DB_CONNECTION=sqlite", "# DB_DATABASE=laravel" => "DB_DATABASE=/var/www/html/database/database.sqlite", "DB_HOST=127.0.0.1" => "# DB_HOST=127.0.0.1", "DB_PORT=3306" => "# DB_PORT=3306", "DB_DATABASE=laravel" => "DB_DATABASE=/var/www/html/database/database.sqlite", "DB_USERNAME=root" => "# DB_USERNAME=root", "DB_PASSWORD=" => "# DB_PASSWORD=", "APP_URL=http://localhost" => "APP_URL=http://localhost:8080"]; foreach ($replacements as $from => $to) { $env = str_replace($from, $to, $env); } file_put_contents(".env", $env);'

cp -f /opt/stubs/routes/web.php routes/web.php
cp -f /opt/stubs/app/Models/Product.php app/Models/Product.php
cp -f /opt/stubs/app/Http/Controllers/ProductController.php app/Http/Controllers/ProductController.php
cp -f /opt/stubs/app/Http/Controllers/AdminProductController.php app/Http/Controllers/AdminProductController.php
cp -f /opt/stubs/database/migrations/2026_01_01_000000_create_products_table.php database/migrations/2026_01_01_000000_create_products_table.php
cp -f /opt/stubs/database/seeders/ProductSeeder.php database/seeders/ProductSeeder.php
cp -f /opt/stubs/database/seeders/DatabaseSeeder.php database/seeders/DatabaseSeeder.php
cp -f /opt/stubs/resources/views/layouts/app.blade.php resources/views/layouts/app.blade.php
cp -f /opt/stubs/resources/views/products/index.blade.php resources/views/products/index.blade.php
cp -f /opt/stubs/resources/views/products/show.blade.php resources/views/products/show.blade.php
cp -f /opt/stubs/resources/views/admin/products/index.blade.php resources/views/admin/products/index.blade.php
cp -f /opt/stubs/resources/views/admin/products/create.blade.php resources/views/admin/products/create.blade.php
cp -f /opt/stubs/resources/views/admin/products/edit.blade.php resources/views/admin/products/edit.blade.php
mkdir -p resources/views/admin/products/partials
cp -f /opt/stubs/resources/views/admin/products/partials/form.blade.php resources/views/admin/products/partials/form.blade.php

php artisan key:generate --force
php artisan migrate --force
php artisan db:seed --force

exec php-fpm
