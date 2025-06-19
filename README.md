# Divine Destinations

Divine Destinations - система для организации религиозного туризма, построенная на микросервисной архитектуре. Сервис позволяет пользователям находить святые места, планировать паломничества и управлять религиозными событиями.

## Архитектура и зависимости

1. Технологический стек
   - Backend: PHP 8.1+, Laravel 10
   - Базы данных: PostgreSQL 14+
   - Контейнеризация: Docker, Docker Compose
   - Тестирование: PHPUnit
   
2. Взаимодействие сервисов
![deepseek_mermaid_20250619_4f63d3](https://github.com/user-attachments/assets/1e331b69-df64-48ce-9e8b-053813485c8f)

3. Внешние зависимости
   - OpenStreetMap API: Геопоиск религиозных объектов (https://nominatim.openstreetmap.org/search)
   - Orthocal API: (https://orthocal.info/api/gregorian/)
   - PostgreSQL: Хранение данных пользователей, локаций и событий
  
## Запуск проекта

```bash
docker-compose up --build
```

## API документация

1. **Users Service** - аутентификация и управление пользователями
   - Порт: 8001
   - API: /api/register, /api/login

2. **Map Service** - работа с картами и локациями
   - Порт: 8002
   - API: /api/search, /api/locations
   - Ссылка: https://nominatim.openstreetmap.org/search

3. **Calendar Service** - управление событиями
   - Порт: 8003
   - API: /api/events
   - Ссылка: https://orthocal.info/api/gregorian/

## Контакты и поддержка

# Автор проекта:

Пеньков Степан - архитектор и разработчик

# Поддержка и обратная связь

   - Telegram: @PenkovSt
   - VK: @ani1s
   - Почта: penkov-stepan@bk.ru




