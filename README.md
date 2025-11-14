# E-Katalog UMKM Payum Iwag

Aplikasi e-katalog untuk Kelompok Usaha Perempuan Nelayan Payum yang memproduksi produk perawatan kulit alami berkualitas tinggi dari bahan-bahan laut Indonesia.

## 📋 Deskripsi

Payum Iwag adalah aplikasi web berbasis Laravel yang dikembangkan untuk mendukung pemasaran dan manajemen produk dari Kelompok Usaha Perempuan Nelayan di Pantai Payum, Kabupaten Merauke. Aplikasi ini menyediakan katalog produk online, sistem pemesanan, manajemen produksi, dan panel admin yang lengkap.

## ✨ Fitur Utama

### Frontend (Website Publik)
- 🏠 **Halaman Beranda** - Menampilkan informasi tentang Payum Iwag dan produk unggulan
- 📦 **Katalog Produk** - Menampilkan semua produk dengan filter berdasarkan kategori
- 🔍 **Pencarian Produk** - Fitur pencarian untuk menemukan produk dengan mudah
- 📱 **Detail Produk** - Halaman detail lengkap untuk setiap produk
- 🛒 **Keranjang Belanja** - Sistem keranjang untuk mengelola produk yang akan dipesan
- 📞 **Pemesanan via WhatsApp** - Integrasi dengan WhatsApp untuk proses pemesanan
- ⭐ **Review & Testimoni** - Sistem review untuk produk
- 📸 **Galeri Produk** - Galeri foto untuk setiap produk

### Backend (Admin Panel)
- 👤 **Manajemen User & Role** - Sistem autentikasi dengan role-based access control
- 📦 **Manajemen Produk** - CRUD lengkap untuk produk
- 🏷️ **Manajemen Kategori** - Pengelolaan kategori produk
- 📊 **Manajemen Order** - Tracking dan manajemen pesanan
- 🏭 **Manajemen Produksi** - Tracking tahapan produksi
- 📝 **Manajemen Bahan Baku** - Pengelolaan bahan baku produk
- ⭐ **Manajemen Review** - Moderasi review produk
- ⚙️ **Pengaturan Website** - Konfigurasi pengaturan website
- 📸 **Manajemen Galeri** - Upload dan kelola foto produk

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 11** - PHP Framework
- **Filament 3** - Admin Panel Builder
- **Spatie Laravel Permission** - Role & Permission Management
- **PHP 8.2+** - Programming Language

### Frontend
- **Tailwind CSS** - Utility-first CSS Framework
- **Alpine.js** - Lightweight JavaScript Framework
- **Vite** - Build Tool & Dev Server
- **Font Awesome** - Icon Library

### Database
- **MySQL/PostgreSQL/SQLite** - Database (dapat dikonfigurasi)

## 📦 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js >= 18.x dan NPM
- Database (MySQL/PostgreSQL/SQLite)
- Web Server (Apache/Nginx) atau PHP Built-in Server

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/appPayumIwag.git
cd appPayumIwag
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Konfigurasi Environment

```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 4. Setup Database

```bash
# Jalankan migration
php artisan migrate

# Jalankan seeder (opsional)
php artisan db:seed
```

### 5. Setup Storage Link

```bash
php artisan storage:link
```

### 6. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 7. Jalankan Aplikasi

```bash
# Development server
php artisan serve

# Atau gunakan composer script untuk menjalankan server, queue, dan vite secara bersamaan
composer dev
```

Aplikasi akan berjalan di `http://localhost:8000`

## 👤 Akses Admin Panel

Setelah menjalankan seeder, Anda dapat login ke admin panel:

- **URL**: `http://localhost:8000/admin`
- **Email**: (sesuaikan dengan data seeder)
- **Password**: (sesuaikan dengan data seeder)

## 📁 Struktur Proyek

```
appPayumIwag/
├── app/
│   ├── Filament/          # Admin panel resources
│   ├── Http/
│   │   └── Controllers/   # Controller aplikasi
│   ├── Models/            # Eloquent models
│   └── ...
├── config/                # Konfigurasi aplikasi
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── public/                # Public assets
├── resources/
│   ├── views/             # Blade templates
│   ├── css/               # CSS files
│   └── js/                 # JavaScript files
├── routes/                # Route definitions
└── storage/               # Storage files
```

## 🗄️ Model Database

### Model Utama
- **User** - Pengguna sistem
- **Produk** - Produk yang dijual
- **KategoriProduk** - Kategori produk
- **Order** - Pesanan pelanggan
- **OrderItem** - Item dalam pesanan
- **OrderProduction** - Tracking produksi pesanan
- **ProductionStage** - Tahapan produksi
- **BahanBaku** - Bahan baku produk
- **ProdukBahanBaku** - Relasi produk dan bahan baku
- **Review** - Review produk
- **Galeri** - Galeri foto produk
- **PengaturanWebsite** - Pengaturan website

## 🔐 Sistem Autentikasi & Authorization

Aplikasi menggunakan **Spatie Laravel Permission** untuk manajemen role dan permission:

- **Super Admin** - Akses penuh ke semua fitur
- **Admin** - Akses terbatas sesuai permission
- **User** - Akses frontend saja

## 📝 Penggunaan

### Menambahkan Produk Baru

1. Login ke admin panel
2. Navigasi ke **Produk** > **Tambah Produk**
3. Isi informasi produk (nama, deskripsi, harga, kategori, dll)
4. Upload gambar produk
5. Simpan produk

### Mengelola Pesanan

1. Navigasi ke **Orders** di admin panel
2. Lihat daftar pesanan yang masuk
3. Update status pesanan sesuai tahapan produksi
4. Track produksi melalui **Order Production**

### Frontend - Pemesanan

1. Pelanggan memilih produk di katalog
2. Menambahkan produk ke keranjang
3. Melihat detail keranjang
4. Mengirim pesan via WhatsApp dengan detail pesanan

## 🧪 Testing

```bash
# Jalankan semua test
php artisan test

# Jalankan test dengan coverage
php artisan test --coverage
```

## 📦 Deployment

### Persiapan Production

1. Set `APP_ENV=production` di `.env`
2. Set `APP_DEBUG=false` di `.env`
3. Optimize aplikasi:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

4. Build assets untuk production:

```bash
npm run build
```

### Server Requirements

- PHP 8.2 atau lebih tinggi
- Extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
- Web server dengan mod_rewrite (Apache) atau konfigurasi Nginx yang sesuai

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan:

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT License](LICENSE).

## 📞 Kontak & Support

- **Email**: payumiwag@gmail.com
- **Telepon**: +62 822-4811-1790
- **Alamat**: Pantai Payum, Kabupaten Merauke

## 🙏 Terima Kasih

Terima kasih telah menggunakan aplikasi E-Katalog UMKM Payum Iwag. Semoga aplikasi ini dapat membantu meningkatkan pemasaran produk dari Kelompok Usaha Perempuan Nelayan Payum.

---

**Dibuat dengan ❤️ untuk Kelompok Usaha Perempuan Nelayan Payum**
