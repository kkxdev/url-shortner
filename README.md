# 🚀 URL Shortener Service (Laravel)

[![PHP Version](https://img.shields.io/badge/PHP-8.1-blue)](https://www.php.net/)
[![Laravel Version](https://img.shields.io/badge/Laravel-10.x-red)](https://laravel.com)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

A simple, fast, and modern URL shortening service built with Laravel. Perfect for sharing links on social media, emails, or anywhere else you need concise URLs.

---

## 🌟 Features

- **URL Shortening**: Turn long URLs into short, shareable links
- **Instant Redirects**: Blazing-fast redirection to original URLs
- **Visit Tracking**: Monitor how many times your links are accessed
- **Clean Design**: Responsive interface that works on all devices
- **Developer-Friendly**: RESTful API available for programmatic access

---

## 📸 Screenshots

![Web Interface](https://via.placeholder.com/800x400.png?text=URL+Shortener+Interface)

---

## 🛠️ Installation

### Requirements
- PHP 8.1+
- MySQL/PostgreSQL
- Composer
- [BCMath/GMP PHP Extension](https://www.php.net/manual/en/book.bc.php)

### Quick Start
```bash
# Clone the repository
git clone https://github.com/kkxdev/url-shortner.git
cd url-shortener

# Install dependencies
composer install

# Create .env file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Start local server
php artisan serve
