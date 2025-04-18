# ⚽ Soccer Club Website

This is a full-stack web application for a fictional Soccer Club, built using Laravel. It serves as my first complete Laravel-based project, where I practiced both frontend and backend development, database design with relationships, and MVC architecture.

## 📌 Features

- Products Management (Create, Read, Update, Delete)
- Team Listings
- Admin Dashboard
- Responsive Frontend using Blade & Bootstrap 5.3
- Authentication (Login/Register)
- Proper Eloquent Relationships (Products, Cart, Wishlists, etc.)

## 🛠️ Built With

- Laravel 10
- Blade Templating
- Bootstrap 5.3
- MySQL
- Eloquent ORM
- Laravel UI Authentication

## 🧠 What I Learned

- Laravel Routing, Middleware, and Controllers
- CRUD Operations using Eloquent
- Database Relationships (One-to-Many, Many-to-Many)
- MVC Architecture
- Laravel Migrations and Seeders
- Blade templating and Layouts
- Form validation and security best practices

## What I might add in future

- Blog Section (Dynamical Posts)
- Newsletter Subscriptions
- Payment Gateway Integration
- News Section (Dynamical News)
- Dynamic HomePage Banners
- User Dashboard for Order Management
- Notifications

## 📷 Screenshots

<img src="public\public\SS\Screenshot 2025-04-18 120622.png" width="100%">
<img src="public\public\SS\Screenshot 2025-04-18 120659.png" width="100%">
<img src="public\public\SS\Screenshot 2025-04-18 120542.png" width="100%">

## 🚀 Getting Started

To run this project locally:

```bash
git clone https://github.com/dopescripts/soccer-club-laravel.git
cd soccer-club-laravel
composer install
cp .env.example .env
php artisan key:generate
# Set up DB credentials in .env
php artisan migrate --seed
npm run dev
php artisan serve
```
## To Add Laravel UI Authentication
Follow this github guide: https://github.com/laravel/ui
