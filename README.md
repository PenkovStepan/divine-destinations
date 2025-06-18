# Divine Destinations

Микросервисная система для религиозного туризма

## Сервисы

1. **Users Service** - аутентификация и управление пользователями
   - Порт: 8001
   - API: /api/register, /api/login

2. **Map Service** - работа с картами и локациями
   - Порт: 8002
   - API: /api/search, /api/locations

3. **Calendar Service** - управление событиями
   - Порт: 8003
   - API: /api/events

## Запуск проекта

```bash
docker-compose up --build
