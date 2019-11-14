
<p  align="center"><img  src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg"  width="400"></p>

## Setup
  

- Membuat file `.env`

- Setting database pada file `.env`
- Run `composer install` untuk menginstall *Dependencies*
```bash
~$ composer install
```
- Run `php artisan key:generate` & `php artisan migrate`
```bash
~$ php artisan key:generate
Application key set successfully.
~$ php artisan migrate
Migrate successfully.
```
- Run `php artisan serve`
- Voila! You can access `http://localhost:8000/`

Author: Diva Andika
Thanks To **Google**