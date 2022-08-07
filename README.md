## Cara Instalasi Laravel
clone project
- masuk ke file htdoc(xampp) atau www(laragon) dengan menggunakan terminal
- jika di menggunakan laragon "C:\laragon\www\bpnt" jika menggunakan Xampp "C:\Xampp\htdoc\bpnt"
- tulis di terminal, "git clone https://github.com/BenedPangestu/bpnt.git"
- jika sudah selesai clone, tulis di terminal "composer install"

setting database
- buat nama database "db_bpnt"
- import database dengan file "db_bpnt.sql"
- masuk ke file project menggunakan code editor
- ubah setting (.env.example)
- ganti database="db_bpnt"
- ganti nama file menjadi .env

jalankan server
- masuk ke file project menggunakan terminal.
- tulis di terminal, "php artisan serve"
- lalu, masuk ke browser dengan localhost:8000 

login
sebagai admin
email = ajipangestu4211@gmail.com
password = 12345678
sebagai rw
email = ajipang22@gmail.com
password = 12345678

Task yang belum :
1. tambah status calon ✔
2. alur pending = nambah button ✔
3. tambah aksi approve di ui musdes ✔
4. tandai pernah musdes & lolos Musdes ✔
5. validasi data belum di input ✔
6. semua table nik dan no_kk di depan ✔
7. urutan data yang terbaru ✔

Task Tambahan:
1. membuat alur history pada setiap status ✔

task finishing :
1. unique pada nik ✔
2. tanggal pada history ✔
3. input form salah langsung masukin yang lama ✔
4. detail data tambahin semua data nya, untuk luas bangunan pakai meter ✔
5. data rw yang di input tidak bisa login ✔
6. cetak data, perlu di finishing ✔

Task finishing :
1. jumlah pada Dashboard ✔
2. label pada form data masyarakat ✔
3. hapus forgot password ✔

Task 30 juli :
1. dashboard tolak ganti ✔
2. data pending action view belum nampil ✔
3. data approve judul sebenernya ✔
4. profile di navbar
5. data calon judulnya ✔
6. data calon admin buat filter per rw
7. dashboard admin tolak ubah menjadi data rw ✔
8. di dashboard sediakan fitur filter per rt
9. notifikasi jadikan peserta benerin "pending data succes"  ✔
10. data rw action cetak data belum berfungsi ✔
11. form no telp di rw ✔
12. close di form data rw ✔
13. data yang notif nya belum terisi jangan dulu masuk db ✔
14. watermark di bawah hapus aja ✔

task 5 agustus :
1. alamat old form data rw ✔
2. back form data rw langsung data rw ✔
3. ganti password baru di data rw ✔
4. judul data history ✔
5. hapus profile ✔
6. logo atas admin ✔
7. filter data dengan parameter rt dan rw dipake di daftar calon, data approve dan 
    data realisasi, ketika di rw data rt hungkul
8. notifikasi konfirmasi hapus data ✔ 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
