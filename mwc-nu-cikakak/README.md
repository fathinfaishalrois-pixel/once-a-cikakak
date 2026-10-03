# MWC NU Cikakak
Website profil organisasi + CMS admin untuk MWC NU Cikakak, Desa Cikakak, Kecamatan Wangon, Kabupaten Banyumas.

## Stack
- Laravel 13.x
- PHP 8.3+
- SQLite/MySQL sesuai konfigurasi `.env`
- Vite untuk asset development/build

## Instalasi
1. Salin package ini ke ROOT project Laravel.
2. Siapkan `.env` dan konfigurasi database.
3. Jalankan `composer install` jika folder `vendor` belum ada.
4. Jalankan `php artisan migrate`.
5. Jalankan `php artisan db:seed` untuk data prototype dan akun admin.
6. Jalankan `php artisan storage:link`.
7. Jalankan `npm install` lalu `npm run build`.
8. Jalankan `php artisan serve`.

## Admin CMS
URL: `/admin/login`
Email: `admin@mwc-nu-cikakak.test`
Password: `password`

Admin dapat mengelola tanpa coding:
- Pengurus dan struktur
- Berita
- Kegiatan
- Agenda
- Dokumentasi/Galeri
- Lembaga & Banom
- Warga NU
- Infak & Koin NU

Data yang disimpan melalui panel admin otomatis menjadi data yang dipakai website publik.

## Fitur publik
- Responsive desktop/tablet/mobile
- Organization chart interaktif
- Modal biodata pengurus
- Carousel berita dan kegiatan
- Modal detail berita, kegiatan, dan galeri
- Galeri responsive
- Animasi scroll/reveal dan micro-interaction
- Sound toggle
- Reduced-motion support
- Halaman detail SEO-friendly
- Error/empty states

## Catatan
Semua konten awal adalah data prototype/fiktif. Ganti sebelum digunakan sebagai website resmi. Jangan menggunakan password demo di production.
