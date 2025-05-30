
# 🚀 Laravel Project Test 1 Guide

Panduan ini membantu menjalankan project Test 1 ini.

## 🧰 Prasyarat

Pastikan sudah meng-install:

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL / SQLite
- Git

## 📦 Instalasi



### 1. Install Dependency PHP
```bash
composer install
```

### 2. Install Dependency JavaScript
```bash
npm install
```

### 3. Copy File Environment
```bash
cp .env.example .env
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Konfigurasi `.env`

Atur konfigurasi database di file `.env`, misalnya:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_project
DB_USERNAME=root
DB_PASSWORD=
```




### 6. Jalankan Migrasi & Seeder
```bash
php artisan migrate --seed
```

## ▶️ Menjalankan Project

### 1. Jalankan Laravel dan Vite secara paralel:
```bash
composer dev
```

> Perintah ini akan menjalankan:
- `php artisan serve`
- `php artisan queue:listen`
- `php artisan pail`
- `npm run dev` (Vite + Tailwind)

### 2. Akses Aplikasi
Buka di browser:
```
http://localhost:8000
```
---


# TEST 2

## Client Setup

First, run :

```bash
cd client

npm install

npm run dev
```

## Database Setup

### Konfigurasi `.env`

Atur konfigurasi database di file `.env`

```env
DATABASE_URL=
```

First, run :

```bash
cd server

npm install

npm run db:generate

npm run db:migrate

npm run dev
```

