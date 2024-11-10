<p align="center"><a href="https://www.unkhair.ac.id" target="_blank"><img src="public/backend/assets/img/logo-unkhair.png" width="200" alt="Logo Unkhair CMS"></a></p> <p align="center"> <a href="#"><img src="https://img.shields.io/badge/build-passing-brightgreen" alt="Status Build"></a> <a href="#"><img src="https://img.shields.io/badge/coverage-90%25-brightgreen" alt="Status Cakupan"></a> <a href="#"><img src="https://img.shields.io/badge/version-1.0-blue" alt="Versi"></a> <a href="#"><img src="https://img.shields.io/badge/license-MIT-green" alt="Lisensi"></a> </p>
---

# Unkhair CMS

Selamat datang di proyek **Unkhair CMS**, sebuah Sistem Manajemen Konten (CMS) khusus yang dikembangkan untuk Universitas Khairun. CMS ini dirancang untuk memudahkan pengelolaan konten digital kampus, seperti berita, pengumuman, manajemen pengguna, dan berbagai kebutuhan lainnya yang berhubungan dengan komunikasi dan informasi universitas.

## Deskripsi

**Unkhair CMS** bertujuan untuk meningkatkan efisiensi dalam mengelola dan menyampaikan informasi di lingkungan Universitas Khairun. Dengan antarmuka yang intuitif dan fitur-fitur yang disesuaikan dengan kebutuhan kampus, sistem ini mendukung komunikasi internal dan eksternal secara efektif.

## Fitur Utama

- **Manajemen Pengguna dan Hak Akses**: Mengatur peran dan hak akses untuk administrator, dosen, dan pengguna lainnya.
- **Pengelolaan Konten**: Tambah, edit, dan kelola berita, pengumuman, dan halaman statis kampus.
- **Manajemen Media**: Unggah dan kelola berkas gambar, dokumen, dan video.
- **Pengumuman dan Agenda Acara**: Publikasi berita dan acara universitas secara cepat dan terstruktur.
- **Desain Responsif**: Antarmuka yang dapat diakses dengan nyaman di perangkat desktop maupun mobile.
- **SEO Friendly**: Mendukung pengoptimalan konten agar lebih mudah ditemukan.
- **Dukungan Bahasa**: Dukungan untuk bahasa Indonesia dan opsi multibahasa (jika diperlukan).

## Teknologi yang Digunakan

- **Framework Backend**: PHP (Laravel)
- **Frontend**: HTML, CSS, JavaScript (menggunakan Bootstrap)
- **Database**: MySQL
- **Manajer Paket**: Composer untuk PHP, npm untuk pengelolaan frontend

## Instalasi

### Prasyarat

- PHP >= 8.1
- Composer
- Node.js dan npm
- Database (MySQL)

### Langkah Instalasi

1. Kloning repositori proyek:
    ```bash
    git@github.com:wahyuumaternate/CMS_UNKHAIR_11.git
    cd CMS_UNKHAIR_11
    ```
2. Instal dependensi PHP:
    ```bash
    composer install
    ```
3. Salin file `.env.example` ke `.env` dan buat kunci aplikasi:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. Sesuaikan konfigurasi database di file `.env`.
5. Jalankan migrasi dan seeder untuk mengisi basis data awal:
    ```bash
    php artisan migrate --seed
    ```
6. Instal dependensi frontend:
    ```bash
    npm install
    npm run dev
    ```
7. Jalankan server lokal:
    ```bash
    php artisan serve
    ```

## Penggunaan

- Akses sistem di `http://localhost:8000` atau domain server yang telah dikonfigurasi.
- Masuk menggunakan kredensial admin yang telah dibuat saat proses instalasi.
- Kelola konten melalui dashboard untuk membuat berita, mengunggah media, mengatur pengumuman, dan lainnya.

## Konfigurasi

- **File `.env`**: Sesuaikan pengaturan seperti koneksi database, konfigurasi email, dan pengaturan umum lainnya.
- **Hak Akses Pengguna**: Atur hak akses dan peran pengguna Admin, Author.

## Kontribusi

Pengembangan **Unkhair CMS** adalah proyek internal Universitas Khairun. Untuk kontribusi, harap ikuti langkah-langkah berikut:

1. Pastikan Anda memiliki izin untuk mengakses dan mengubah repositori.
2. Buat cabang baru untuk fitur atau perbaikan: `git checkout -b fitur/fitur-baru`.
3. Lakukan commit atas perubahan Anda: `git commit -m 'Tambah fitur baru'`.
4. Push perubahan ke cabang: `git push origin fitur/fitur-baru`.
5. Ajukan Pull Request untuk ditinjau.

## Kode Etik

Dalam rangka menciptakan lingkungan kerja yang inklusif dan produktif, harap ikuti pedoman [Kode Etik](#).

## Keamanan

Jika Anda menemukan celah keamanan atau masalah lainnya, segera laporkan ke tim pengembangan melalui email internal.

## Lisensi

Proyek ini adalah perangkat lunak internal dan dilisensikan di bawah [Lisensi MIT](https://opensource.org/licenses/MIT).

---

CMS ini dikembangkan untuk memenuhi kebutuhan pengelolaan informasi Universitas Khairun. Harap jaga kerahasiaan dan keamanan sistem ini dalam penggunaannya.
