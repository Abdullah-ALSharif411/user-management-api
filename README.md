# User Management & Authentication API

A production-style RESTful API built with Laravel that provides secure authentication and role-based authorization using token authentication.

This project demonstrates clean architecture, testing, error handling and API documentation similar to real SaaS backends.

---

## ✨ Features

### Authentication
- User Registration
- User Login
- Secure Logout
- Token-based authentication using Laravel Sanctum
- Protected routes

### Authorization
- Role-based access (User / Admin)
- Admin-only endpoints

### User Management
- Users listing
- Search & filtering
- Pagination

### System Quality
- Centralized Exception Handling
- Logging system
- Standardized API responses
- Feature Tests (Auth & Protected routes)
- Swagger API Documentation

---

## 🧰 Tech Stack

- Laravel 12
- PHP 8+
- MySQL
- Laravel Sanctum
- Swagger (OpenAPI)
- PHPUnit Testing

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/project-name.git
cd project-name

composer install
cp .env.example .env
php artisan key:generate
