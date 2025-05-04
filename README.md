
# Laravel Blog Importer & Search

Проект позволяет загружать посты и комментарии с внешнего API и сохранять их в базу данных, а также произвести поиск постов по подстроке среди содержимого комментариев.

## ⚙️ Возможности

- Загрузка постов и комментариев с https://jsonplaceholder.typicode.com
- Хранение данных в базе (MySQL / PostgreSQL / SQLite)
- Поиск постов по содержанию комментариев (минимум 3 символа)
- UI с Bootstrap 5
- Единая команда для запуска Laravel и Vite

## 🚀 Установка и запуск

### 1. Клонируйте репозиторий

```bash
git clone https://github.com/BrazhenkoOleg/LaravelBlogAPI.git
cd LaravelBlogAPI
```

### 2. Установите зависимости

```bash
composer install
npm install
```

### 3. Настройте `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Задайте параметры подключения к базе данных в `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Запустите миграции

```bash
php artisan migrate
```

### 5. Импортируйте данные

```bash
php artisan import:blog-data
```

После успешного импорта вы увидите сообщение:
```
Загружено 100 записей и 500 комментариев
```

### 6. Запустите приложение

В `package.json` уже настроен скрипт, объединяющий Laravel и Vite:

```json
"scripts": {
  "dev": "concurrently "php artisan serve" "vite""
}
```

Запуск:

```bash
npm run dev
```

Приложение будет доступно по адресу: [http://localhost:8000](http://localhost:8000)

## 🔍 Поиск

На главной странице отображается форма поиска по комментариям. Введите от 3 символов — и вы получите список постов, в комментариях к которым встречается эта подстрока.

## 🧱 Стек технологий

- [Laravel](https://laravel.com/)
- [Guzzle HTTP Client](https://docs.guzzlephp.org/)
- [Bootstrap 5](https://getbootstrap.com/)
- [Vite](https://vitejs.dev/)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
