# 🚀 User Management & Authentication API

A RESTful API built with Laravel for managing users with authentication and filtering features.

---

## 📌 Features

* User Registration
* User Login & Logout (Sanctum Authentication)
* Get Authenticated User Profile
* Users Management (Admin only)
* Filter users by:

  * Name
  * Email
  * Role

---

## 📸 API Preview

### 🔹 Register

![Image](Docs/images/Register.png)

### 🔹 Login

![Image](Docs/images/Login.png)

### 🔹 Profail

![Image](Docs/images/Profaile.png)

### 🔹 Filter_Name

![Image](Docs/images/filter_name.png)

### 🔹 Filter_Email

![Image](Docs/images/filter_email.png)

### 🔹 Filter_Role

![Image](Docs/images/filter_role.png)

### 🔹 Filter

![Image](Docs/images/filter.png)


### 🔹 Logout_on_Token

![Image](Docs/images/Logout_no_Token.png)

### 🔹 Logout

![Image](Docs/images/Logout.png)


---

## 🛠️ Tech Stack

* Laravel
* Sanctum Authentication
* MySQL / SQLite
* REST API

---

## ⚙️ Installation

```bash
git clone https://github.com/USERNAME/user-management-api.git
cd user-management-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 🔐 Authentication

This API uses Bearer Token (Sanctum)

Add header:

```
Authorization: Bearer YOUR_TOKEN
```

---

## 📮 API Endpoints

### 🔹 Register

```
POST /api/auth/register
```

Body:

```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "role": "User"
}
```

---

### 🔹 Login

```
POST /api/auth/login
```

---

### 🔹 Logout

```
POST /api/auth/logout
```

---

### 🔹 Get Profile

```
GET /api/profile
```

---

### 🔹 Get Users (Admin only)

```
GET /api/users
```

Filters:

```
?name=John
?email=john@example.com
?role=Admin
```

---

## 📸 Example Response

```json
{
  "success": true,
  "message": "Users list",
  "data": [...]
}
```

---

## 👨‍💻 Author

Abdullh ALsharif – Backend Developer
