# Task Management System (TMS) - Demo

Progressive Web Application (PWA) for a Task Management System.

## Backend

- Using Laravel (v10) with MySQL.
- CRUD APIs (Category, Task)

## Frontend

- Using EasyPanel, Livewire and Vue.js.
- CRUD Web Pages (Category, Task)

---

## Initial Setup

```
# Primary
- Linux (Ubuntu 22.04)
- Apache
- MySQL
- PHP (8.1.2)

# Secondary
- OpenSSH
- NodeJS
- NPM

# Other
- Timezone (UTC)
```

## Installation Commands
```
# Install Laravel
composer create-project laravel/laravel /var/www/tms

# Install Laravel starter kit (Options: none, breeze, jetstream)
composer require laravel/jetstream
php artisan jetstream:install inertia

# EasyPanel (Reference: https://easypanel.netlify.app)
composer require rezaamini-ir/laravel-easypanel
php artisan panel:install

# Create new modes (Category, Task)
php artisan make:model Category
php artisan make:model Task

# Create new controllers (Category, Task)
php artisan make:controller CategoryController
php artisan make:controller TaskController

# Migration
php artisan migrate

# Create a user (admin | admin123)
INSERT INTO tms.users (id, name, email, email_verified_at, password, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, remember_token, created_at, updated_at) VALUES (1, 'Admin', 'admin@tms.com', NULL, '$2y$12$ZQjG5Y32wEeRR3CJn0ilguCzOHAidyzedEj7CxqtJsA6mm3TnFVui', NULL, NULL, NULL, NULL, '2025-02-12 20:15:54', '2025-02-12 20:15:54');
```

---

## CRUD APIs

URL: http://localhost:8000/

| Route          | Method      | Description |
| ----------- | ----------- | ----------- |
| api/categories | GET | Read All |
| api/categories | POST | Cread |
| api/categories/{category} | GET | Read Single |
| api/categories/{category} | PUT | Update |

| Route          | Method      | Description |
| ----------- | ----------- | ----------- |
| api/taks | GET | Read All |
| api/tasks | POST | Cread |
| api/tasks/{task} | GET | Read Single |
| api/tasks/{task} | PUT | Update |
| api/categories/{category} | DELETE | Delete |

## Admin Panel

URL: http://localhost:8000/admin

- User ID: admin
- Password: admin123

## CRUD Web Pages

URL: http://localhost:8000/

| Route          | Method      | Description |
| ----------- | ----------- | ----------- |
| web/categories | GET | Read All |
| web/categories | POST | Cread |
| web/categories/{category} | GET | Read Single |
| web/categories/{category} | PUT | Update |

| Route          | Method      | Description |
| ----------- | ----------- | ----------- |
| web/taks | GET | Read All |
| web/tasks | POST | Cread |
| web/tasks/{task} | GET | Read Single |
| web/tasks/{task} | PUT | Update |
| web/categories/{category} | DELETE | Delete |

---

## Other Information

- `tms.sql` : (Optional) Initial data for the database (MySQL / tms).
- `Recipe/Laravel.10/install.sh`: (Optional) Install guideline for Laravel 10.
