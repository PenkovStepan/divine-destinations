#!/bin/sh

# Генерация ключа приложения
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Принудительная генерация ключа
echo "Generating APP_KEY..."
php artisan key:generate --force

# Ожидание запуска PostgreSQL
echo "Waiting for PostgreSQL to start..."
until pg_isready -h users-db -p 5432 -U divine_user -d divine_users -t 1; do
    echo "PostgreSQL is unavailable - sleeping"
    sleep 1
done
echo "PostgreSQL is ready!"

# Запуск миграций
php artisan migrate --force

# Запуск сервера
exec "$@"