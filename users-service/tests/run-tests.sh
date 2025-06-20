#!/bin/bash

# Параметры
DB_NAME="divine_users_test"
DB_USER="postgres"
DB_PASSWORD="user_password"

# Создаем тестовую БД
sudo -u postgres psql -c "DROP DATABASE IF EXISTS $DB_NAME;"
sudo -u postgres psql -c "CREATE DATABASE $DB_NAME;"
sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE $DB_NAME TO $DB_USER;"

# Устанавливаем переменные окружения
export APP_ENV=testing
export DB_CONNECTION=pgsql
export DB_DATABASE=$DB_NAME
export DB_USERNAME=$DB_USER
export DB_PASSWORD=$DB_PASSWORD

# Запускаем миграции
php artisan migrate:refresh --seed

# Запускаем тесты
php artisan test