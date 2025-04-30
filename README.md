# Clean Architecture - User Management System (Laravel 11)

This is a simple User Management System built with Laravel 11 following professional best practices, including:

- Clean architecture (Controller → Service → Repository → Model)
- Full CRUD operations (Create, Read, Update, Delete Users)
- Unit and Feature Testing using PHPUnit
- Simple Blade frontend pages
- Database separation for production and testing
- Dependency Injection for services and repositories



## 🛠️ Tech Stack

- PHP 8.2+
- Laravel 11
- MySQL
- PHPUnit (Testing)



## 📂 Project Structure 
```bash
app/
 ├── Http/
 │    └── Controllers/
 │         └── UserController.php
 ├── Services/
 │    └── UserService.php
 ├── Repositories/
 │    ├── UserRepositoryInterface.php
 │    └── UserRepository.php
 ├── Models/
 │    └── User.php
routes/
 └── web.php
resources/
 └── views/
      └── users/
```


## 📚 Concepts  

- MVC Architecture

- Service Layer Pattern

- Repository Pattern

- Dependency Injection

- Form Validation

- CSRF Protection

- PHPUnit Testing (Unit & Feature)


## 📦 Installation Guide

### 1. Clone this repo:

```bash
git clone https://github.com/your-username/laravel-user-management.git
cd laravel-user-management
```

### 2. Install dependencies:

```bash
composer install
```

### 3. Create ```bash.env``` file:

```bash
cp .env.example .env
```
Edit ```bash.env``` with your database details:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_management
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Generate App Key:

```bash
php artisan key:generate
```

### 5. Run Migrations:

```bash
php artisan migrate
```

### 6. Running the App:

```bash
php artisan serve
```
Visit http://localhost:8000 in your browser!

### 7. Running Tests:

```bash
php artisan test
```



