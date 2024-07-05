# Guests
Микросервис реализует API для CRUD операций над гостем. То есть принимает данные для создания, изменения, получения, удаления записей гостей хранящихся в выбранной базе данных.

# Backend
## Стек и зависимости
- PHP (v8.2) - Язык программирования
- Laravel (v11.10.0) - Backend фреймворк
- Docker Engine (v25.0.3) - Контейнерная платформа
- MySql (v8.3) - СУБД

# Проект

## Алиасы
В корне проекта есть файл Makefile, в котором содержатся алиасы для часто используемых команд
![изображение](https://github.com/Yondu715/pastebin/assets/116293533/9f506c3e-96c5-433b-9030-3993d1460469)

Для их вызова необходимо выполнить
```sh
make {название_команды}
```

## Установка

### Docker
```sh
docker-compose up --build -d
```

### Laravel
Необходимо зайти в контейнер app
```sh
docker-compose exec app bash
```
Сгенерировать ключ
```sh
php artisan key:generate
```

И установить зависимости
```sh
composer install
```

Далее создаем файл .env и описываем окружение по примеру .env.example

Главное указать следующие параметры:

База данных
```sh
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=123
```

Поднимаем миграции
```sh
php artisan migrate
```

Запускаем сиды
```sh
php artisan db:seed
```

# Swagger
Документация к api находится в файле swagger.yaml