# Student Management System
A simple Laravel-based Student Management System with full CRUD operations.

---

## Requirements
- PHP 8.1 or higher (XAMPP recommended)
- Composer (PHP dependency manager)
- XAMPP (MySQL database)
- Git (optional, for cloning the project)

---

## Setup Instructions

### Step 1 — Clone the Repository
git clone <your-repository-url>
cd student-management

---

### Step 2 — Install Dependencies
composer install

---

### Step 3 — Create Environment File
cp .env.example .env
php artisan key:generate

---

### Step 4 — Start XAMPP
1. Open XAMPP Control Panel
2. Start Apache
3. Start MySQL

---

### Step 5 — Create the Database
1. Go to: http://localhost/phpmyadmin
2. Click "New"
3. Create database: student_db

---

### Step 6 — Configure .env File

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_db
DB_USERNAME=root
DB_PASSWORD=

---

### Step 7 — Run Migrations
php artisan migrate

---

### Step 8 — Start Server
php artisan serve

Open:
http://127.0.0.1:8000

---

## Environment Configuration Checklist

- DB_CONNECTION = mysql
- DB_HOST = 127.0.0.1
- DB_PORT = 3306
- DB_DATABASE = student_db
- DB_USERNAME = root
- DB_PASSWORD = (leave blank for XAMPP)

---

## Features
- View all students
- Add new students
- Edit student records
- Delete students
- Validation (email unique, age required)
- Flash messages
- Full CRUD using Laravel Resource Controller