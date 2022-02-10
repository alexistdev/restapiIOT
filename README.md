<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installasi Rest API

Untuk dapat menggunakan rest api dari App Tani Cerdas maka ikuti langkah berikut ini:

- git clone 
- Buat database kosong di phpmyadmin dengan nama tanicerdas (atau bebas)
- Buat file .env copas dari .env-example di root directory project apitanicerdas
- Lakukan pengaturan nama database, username dan password. Untuk nama database sesuai dengan langkah nomor 2.
- buka terminal dan jalankan perintah: php artisan key:generate
- jalankan: php artisan migrate:fresh --seed
- jalankan: php artisan serve
- User example:  user@gmail.com dan password: user


