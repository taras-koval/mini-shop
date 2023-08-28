<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Mini-Shop
Implemented on the Laravel v10 framework.

## Requirements

Make sure you have the following software installed on your machine:

- PHP (8.1+)
- Composer
- Node.js and npm
- MySQL

## Installation

Steps to install the project:

1. Clone this repository: `git clone https://github.com/taras-koval/mini-shop.git`
2. Navigate to the project folder: `cd mini-shop`
3. Copy the `.env.example` file and rename it to `.env`
4. Configure the `.env` file with appropriate database settings for your environment
5. Install PHP dependencies: `composer install`
7. Generate a key using the command: `php artisan key:generate`
8. Run migrations to create the database tables: `php artisan migrate`
9. Run seeders to fill the database with data `php artisan db:seed`
10. Start the local server: `php artisan serve`

Project is now running at http://localhost:8000
