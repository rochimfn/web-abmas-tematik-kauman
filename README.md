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

Konfigurasi yang wajib diatur meliputi _APP_\_\* dan _DB_\_\*.
Contoh konfigurasi bagian _APP_ :

```
APP_NAME="Portal Kauman"
APP_ENV=local
APP_KEY=<redacted>
APP_DEBUG=true
APP_URL=http://localhost
```

Contoh konfigurasi bagian _DB_ :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=abmas
DB_USERNAME=root
DB_PASSWORD=
```

APP_KEY dapat digenerate dengan perintah berikut.
```
php artisan key:generate
```

Konfigurasi selesai. Gunakan perintah berikut untuk memigrasi database dan melakukan seeding.

```
php artisan migrate
```


## Update 10 November 2020

### Database
Perubahan dilakukan pada model database. Gunakan perintah dibawah untuk memigrasi ULANG database dan melakukan insert mock(dummy) data.

```
php artisan migrate:fresh --seed
```

### Rute
Secara bawaan pengguna admin akan dialihkan ke rute `home` sedangkan pengguna warga akan diarahkan ke rute `beranda`.

### Akses masuk
Pengguna Warga
**usernama:** 1050241708900001
**password:** {password}

Pengguna Admin
**usernama:** admin
**password:** {password_1}