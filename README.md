## Instalasi

Sebelum instalasi pastikan sistem operasi yang digunakan sudah memenuhi [System Requirement](https://laravel.com/docs/8.x#server-requirements) Laravel, memiliki DBMS yang didukung oleh Laravel serta telah terpasang [Composer](https://laravel.com/docs/8.x#server-requirements) dan Git.

Gunakan perintah berikut untuk mengunduh kode sumber dan memasang dependensi.

```
git clone git@github.com:rochimfn/web-abmas-tematik-kauman.git
cd web-abmas-tematik-kauman
composer install
composer dump
```

Salin `.env.example` menjadi `.env`

```
cp .env.example .env //Pada sistem operasi *nix
copy .env.example .env //Pada sistem operasi Windows
```

Konfigurasi yang wajib diatur meliputi _APP_\_\* dan _DB_\*. APP_KEY dapat digenerate dengan perintah berikut.

```
php artisan key:generate
```

Konfigurasi selesai. Gunakan perintah berikut untuk memigrasi database dan melakukan seeding.

```
php artisan migrate
```
