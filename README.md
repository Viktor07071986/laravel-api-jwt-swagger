## Аутентификация REST API на фрейворке Laravel 10 с помощью JWT

Этот проект предназначен для создания REST API на фрейворке Laravel 10 с аутентификацией по JWT (JSON Web Token). Он предоставляет конечные точки для входа пользователя в систему, получения информации о пользователе, обновления токенов и выхода из системы. И также к данному проекту созданна Swagger документация по ссылке http://laravel-api-jwt-swagger/api/documentation.

## Содержание

- [Установка](#установка)
- [Точки входа](#точки-входа)

## Установка

1. Клонирование репозитория:
   ```bash
   git clone https://github.com/Viktor07071986/laravel-api-jwt-swagger.git
    ```
2. Переходим в корневую директорию проекта:
    ```bash
    cd laravel-api-jwt-swagger
    ```
3. устанавливаем все необходимые зависмости с помощью composer:
   ```bash
   composer install
    ```
4. Запускаем миграции:
    ```bash
    php artisan migrate
    ```
   
## Точки входа

| Метод   |      Точка входа      |  Описание                                             |
|-----------|--------------------|--------------------------------------------------|
| POST     | /api/auth/register         | Регистрация пользователя                                  |
| POST     | /api/auth/login         | Вход пользователя и генерация токена          |
| GET       | /api/auth/user-profile            | Получение текущей информации о пользователе  |
| POST     | /api/auth/refresh       | Обновление токена доступа                     |
| POST     | /api/auth/logout	    | Сброс текущего токена и выход |

#### Регистрация пользователя

Данный url предназначен для регистрации нового пользователя для последующего создания токена доступа при аутентификации. Укажите адрес электронной почты, email, пароль и подтвержение пароля пользователя в теле запроса. При успешной регистрации вернется сообщение о успешной регистрации и данные о зарегистрированном пользователе.

##### Тело запроса:

```http
POST /api/auth/register HTTP/1.1
Host: http://laravel-api-jwt-swagger
Content-Type: application/json
{
    "name": "test",
    "email": "test@test.test",
    "password": "testtest"
    "password_confirmation": "testtest"
}
```

##### Ответ:

```json
{
    "message": "User successfully registered",
    "user": {
        "name": "test",
        "email": "test@test.test",
        "email_verified_at": "2023-07-24T05:10:20.000000Z",
        "created_at": "2023-07-24T05:10:20.000000Z",
        "updated_at": "2023-07-24T05:10:20.000000Z"
    }
}
```

#### Аутентификация пользователя

Данный url предназначен для аутентификации пользователя и создания токена доступа. Укажите адрес электронной почты и пароль пользователя в теле запроса. Если учетные данные действительны, API ответит информацией пользователя вместе с токеном доступа, который можно использовать для последующих запросов.

##### Тело запроса:

```http
POST /api/auth/login HTTP/1.1
Host: http://laravel-api-jwt-swagger
Content-Type: application/json
{
    "email": "test@test.test",
    "password": "testtest"
}
```

##### Ответ:

```json
{
    "access_token": "{{ token }}",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 1,
        "name": "test",
        "email": "test@test.test",
        "email_verified_at": null,
        "created_at": "2023-07-24T05:10:20.000000Z",
        "updated_at": "2023-07-24T05:10:20.000000Z"
    }
}
```

#### Получение информацию о текущем аутентифицированном пользователе

Данный url предназначен для получения информации о текущем аутентифицированном пользователе. Включите токен доступа в заголовки запроса. API ответит данными пользователя.

##### Тело запроса:

```http
GET /api/auth/user-profile HTTP/1.1
Host: http://laravel-api-jwt-swagger
Content-Type: application/json
Authorization: Bearer <token>
```

##### Ответ:

```json
{
    "id": 1,
    "name": "test",
    "email": "test@test.test",
    "email_verified_at": "2023-07-24T05:10:20.000000Z",
    "created_at": "2023-07-24T05:10:20.000000Z",
    "updated_at": "2023-07-24T05:10:20.000000Z"
}
```

#### Генерация нового токена

Данный url предназначен для обновления токена доступа с истекшим сроком действия. Включите текущий токен доступа в заголовки запроса. API ответит новым токеном доступа, который можно использовать для аутентификации. Обновление токена полезно для поддержания сеанса пользователя без необходимости частого входа в систему.

##### Тело запроса:

```http
POST /api/auth/refresh HTTP/1.1
Host: http://laravel-api-jwt-swagger
Content-Type: application/json
Authorization: Bearer <token>
```

##### Ответ:

```json
{
    "access_token": "{{ token }}",
    "token_type": "bearer",
    "expires_in": 3600
    "user": {
        "id": 1,
        "name": "test",
        "email": "test@test.test",
        "email_verified_at": "2023-07-24T05:10:20.000000Z",
        "created_at": "2023-07-24T05:10:20.000000Z",
        "updated_at": "2023-07-24T05:10:20.000000Z"
    }
}
```

#### Выход

Данный url предназначен, чтобы сделать недействительным текущий токен доступа и выход пользователя из системы. Включите токен доступа в заголовки запроса. После выхода из системы токен больше не будет действителен для выполнения аутентифицированных запросов.

##### Тело запроса:

```http
POST /api/auth/logout HTTP/1.1
Host: http://laravel-api-jwt-swagger
Content-Type: application/json
Authorization: Bearer <token>
```

##### Ответ:

```json
{
    "message": "User successfully signed out"
}
```
