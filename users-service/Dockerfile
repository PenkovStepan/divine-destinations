FROM php:8.2-cli

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    netcat-openbsd \
    postgresql-client

# Установка расширений PHP
RUN docker-php-ext-install pdo pdo_pgsql zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем исходный код
COPY . /var/www/html

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Установка зависимостей PHP
RUN composer install --no-dev --optimize-autoloader

# Настройка прав
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Копируем скрипт инициализации
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Команда запуска
ENTRYPOINT ["entrypoint.sh"]