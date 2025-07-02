# 🎯 Laravel Event Microservice

A lightweight Laravel-based microservice to collect and export user events — fully dockerized and scalable.

---

## 🚀 Features

- Store events with custom payload
- Export events with pagination & filtering
- Queue-based asynchronous event saving
- Dockerized with MySQL (no Redis needed)
- Clean architecture + Postman collection + ready for production

---

## 🛠 Requirements

- Docker & Docker Compose
- PHP 8.3+ (inside Docker)
- Composer (inside Docker)

---

## 📦 Setup (with Docker)

### 1. Clone the repository

```bash
https://github.com/majid-gholamheidari/sample-microservice
cd event-service
```

### 2. Start the Docker Containers
```bash
docker-compose up -d --build
```

#### This will spin up:
- laravel-app (PHP + Laravel)
- laravel-mysql (MySQL 8)
- laravel-nginx (serving the app on port 8000)

### 3. Enter the App Container
```bash
docker exec -it laravel-app bash
```

### 4. Set Up Laravel
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

### 5. Start Laravel server via Nginx
http://localhost:8000/api/v1/events

### 6. Run the worker inside the container
```bash
php artisan queue:work
```


