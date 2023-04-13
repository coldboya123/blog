<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

1. Clone project run terminal:

   `git clone https://github.com/coldboya123/blog.git`

   then run:`composer install`
2. Run terminal create file .env:

   `cp .env.example .env`
3. Create database name "blogs"
4. Edit file .env to config db:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=blog
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Run terminal to migrate database:

   `php artisan migrate`
6. Run terminal to seed data:

   `php artisan db:seed`

   Data include:

   - admin account: admin@gmail.com - pwd: 123123
   - user account: user1@gmail.com - pwd: 123123
   - 3 posts of user1
7. Start server run:

   `php artisan serve`
