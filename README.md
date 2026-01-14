# REST API на Yii2

Проект содержит REST-сервис (модуль `v1`) работающий в докер-контейнере.
Реализует базовые CRUD-операции с использованием Bearer-авторизации.
Для тестирования используется Postman.

## 0. Подготовка
Находясь в папке, в которую Вы хотите скачать проект, клонируем репозиторий с помощью команды:

```git clone git@github.com:Longin89/YiiRest.git```

После этого, переходим в папку проекта:

```cd YiiRest-main```

## 1. Сборка и запуск контейнеров
В терминале вводим:
```
docker compose build
docker compose up -d
```

## 2. Установка зависимостей проекта
В терминале вводим:
```
docker exec -it yii_php bash
```
после перехода в консоль контейнера вводим:
```
cd yii-project
```
и устанавливаем зависимости:
```
composer install
```

## 3. Миграции:
В `console/migrations` есть миграции, создающие таблицы c тестовыми данными и пользователем: добавляется пользователь `admin` с токеном `uz8x6wtKM-ukoHEUnwVZovqQ6Gam0-89` (пароль `admin123`).

После выполнения команды:

```
php yii migrate/up
```
эти данные будут записаны в таблицу.

## 4. Эндпоинты API
Базовый путь API: `http://admin.localhost/v1`

- Посты:
    - GET `/v1/posts` — список всех постов
    - GET `/v1/posts/{id}` — просмотр конкретного поста
    - POST `/v1/posts` — создать пост (требуется Bearer-токен)
    - PATCH `/v1/posts/{id}` — обновить конкретный пост (требуется Bearer-токен; доступ только владельцу)
    - DELETE `/v1/posts/{id}` — удалить конкретный пост (требуется Bearer-токен; доступ только владельцу)

- Комментарии:
    - GET `/v1/comments/{post_id}` — комментарии по конкретному посту
    - GET `/v1/posts/{post_id}?expand=comments` - вывод конкретного поста и всех комментариев к нему
    - GET `/v1/posts/{post_id}?expand=createdBy` - вывод конкретного поста и всей информации об авторе (можно комбинировать)
    - POST `/v1/comments` — создать комментарий (указать поле `post_id` + Bearer-токен)


## 5. Примеры запросов постов в Postman

- Получить список постов
    - Method: `GET`
    - URL: `http://admin.localhost/v1/posts`

- Получить список постов со связанными комментариями
    - Method: `GET`
    - URL: `http://admin.localhost/v1/posts/{post_id}?expand=comments`

- Получить пост по id
    - Method: `GET`
    - URL: `http://admin.localhost/v1/posts/1`

- Создать пост
    - Method: `POST`
    - URL: `http://admin.localhost/v1/posts`
    - Headers:
        - `Content-Type: application/json`
        - `Authorization: Bearer uz8x6wtKM-ukoHEUnwVZovqQ6Gam0-89`
    - Body (JSON):

```
{
    "title": "Новый пост",
    "body": "Текст поста"
}
```

- Обновить пост
    - Method: `PATCH`
    - URL: `http://admin.localhost/v1/posts/1`
    - Headers:
        - `Content-Type: application/json`
        - `Authorization: Bearer uz8x6wtKM-ukoHEUnwVZovqQ6Gam0-89`
    - Body (JSON):

```
{
    "title": "Обновлённый заголовок",
    "body": "Обновлённый текст"
}
```

- Удалить пост
    - Method: `DELETE`
    - URL: `http://admin.localhost/v1/posts/1`
    - Headers: `Authorization: Bearer uz8x6wtKM-ukoHEUnwVZovqQ6Gam0-89`

## 6. Примеры запросов комментариев в Postman

- Получить конкретный комментарий
    - Method: `GET`
    - URL: `http://admin.localhost/v1/comments/{id}`

- Создать комментарий
    - Method: `POST`
    - URL: `http://admin.localhost/v1/comments`
    - Headers: `Content-Type: application/json`, `Authorization: Bearer ...`
    - Body (JSON):

```
{
    "post_id": 1,
    "title": "Комментарий",
    "body": "Текст комментария"
}
```

## 7. Доступы в браузере (при необходимости):

- Frontend: http://localhost (login: `admin`, password: `admin123`)
- Backend: http://admin.localhost
- PHPMyAdmin: http://localhost:8080 (user: `yii`, password: `yii`)

При ошибке 404 - дайте полные права на папку с проектом
