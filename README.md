# Laravel Product Catalog (Docker)

Simple Laravel product catalog with public listing/details and admin CRUD, designed to run with one command.

## Features

- Public product list
- Public product details page
- Admin product create/edit/delete (no authentication)
- SQLite persistence in Docker volume

## Requirements

- Docker Desktop

## Run

```bash
docker compose up --build
```

Open:

- App: http://localhost:8080
- Admin: http://localhost:8080/admin/products

## Notes

- First start installs Laravel automatically inside the app container.
- Database is SQLite at `/var/www/html/database/database.sqlite`.
- Product seed data is loaded on startup.
- Application code is generated in the Docker volume `laravel_app`.

## New Relic Demo Friendliness

This setup keeps the PHP runtime isolated in `app` container (`php:8.3-fpm`), making it straightforward to add the New Relic PHP agent in [docker/php/Dockerfile](docker/php/Dockerfile).
