# Panduan Setup Lengkap - LMS Pusat Pembelajaran Digital

Dokumentasi lengkap untuk setup dan konfigurasi LMS dengan Laravel Herd, DBngin, dan DataGrip.

## Daftar Isi

1. [Setup dengan Laravel Herd](#setup-dengan-laravel-herd)
2. [Setup Database dengan DBngin](#setup-database-dengan-dbngin)
3. [Koneksi Database dengan DataGrip](#koneksi-database-dengan-datagrip)
4. [Konfigurasi Lanjutan](#konfigurasi-lanjutan)
5. [Tips & Tricks](#tips--tricks)

---

## Setup dengan Laravel Herd

Laravel Herd adalah PHP development environment yang paling mudah untuk macOS dan Windows. Herd otomatis mengatur PHP, Nginx, dan DNS untuk development Laravel.

### Langkah-langkah Instalasi

#### 1. Download & Install Laravel Herd

**Untuk macOS:**
1. Buka [https://herd.laravel.com](https://herd.laravel.com)
2. Download versi untuk Mac
3. Buka file `.dmg` yang didownload
4. Drag Herd ke folder Applications
5. Buka Herd dari Applications

**Untuk Windows:**
1. Buka [https://herd.laravel.com](https://herd.laravel.com)
2. Download versi untuk Windows
3. Jalankan installer
4. Ikuti wizard instalasi
5. Buka Herd dari Start Menu

#### 2. Konfigurasi Herd

1. **Buka Herd** - Klik icon Herd di menu bar/system tray
2. **Settings** - Klik icon gear/settings
3. **General Settings**:
   - PHP Version: Pilih 8.3 atau lebih tinggi
   - Default: Pastikan "Serve sites automatically" dicentang

#### 3. Tambahkan Project ke Herd

**Cara 1: Via GUI**
1. Buka Herd
2. Klik "Sites"
3. Klik "Add Site"
4. Browse dan pilih folder `LMSprojectku`
5. Klik "Add"

**Cara 2: Via Folder Otomatis**
1. Buka Herd Settings
2. Lihat "Sites Path" (biasanya `~/Herd`)
3. Pindahkan/clone project ke folder tersebut
4. Project otomatis terdeteksi

#### 4. Akses Project

Setelah ditambahkan, project akan tersedia di:
```
http://lmsprojectku.test
```

Admin panel:
```
http://lmsprojectku.test/admin
```

### Fitur Herd yang Berguna

#### PHP Version Switching

Herd memungkinkan switch PHP version per-site:

1. Klik kanan pada site di Herd
2. Pilih "PHP Version"
3. Pilih versi yang diinginkan

#### View Logs

1. Buka Herd
2. Klik pada site
3. Klik "View Logs"
4. Pilih PHP error log atau Nginx log

#### Restart Services

Jika ada masalah:
1. Buka Herd
2. Klik "Services"
3. Klik "Restart All"

---

## Setup Database dengan DBngin

DBngin adalah tool untuk menjalankan dan mengelola database server (MySQL, PostgreSQL, Redis) di Mac dan Windows dengan mudah.

### Langkah-langkah Instalasi

#### 1. Download & Install DBngin

1. Buka [https://dbngin.com](https://dbngin.com)
2. Download sesuai OS Anda
3. Install aplikasi
4. Buka DBngin

#### 2. Create MySQL Service

1. **Klik tombol "+"** di DBngin
2. **Pilih "MySQL"**
3. **Konfigurasi**:
   - Version: Pilih latest (8.x)
   - Name: `LMS MySQL`
   - Port: `3306` (default)
4. **Klik "Create"**

#### 3. Start MySQL Service

1. Pilih service `LMS MySQL`
2. Klik tombol **Play/Start**
3. Tunggu hingga status menjadi "Running" (hijau)

#### 4. Create Database

**Via Terminal:**
```bash
# Connect ke MySQL
mysql -u root

# Create database
CREATE DATABASE lms_project;

# Verify
SHOW DATABASES;

# Exit
EXIT;
```

**Via Adminer (built-in DBngin):**
1. Klik service yang aktif
2. Klik "Open Adminer"
3. Login:
   - Server: 127.0.0.1
   - Username: root
   - Password: (kosong)
4. Klik "Create database"
5. Nama: `lms_project`
6. Collation: `utf8mb4_unicode_ci`

#### 5. Update Laravel .env

Edit file `.env` di project:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_project
DB_USERNAME=root
DB_PASSWORD=
```

#### 6. Run Migrations

```bash
cd /path/to/LMSprojectku
php artisan migrate
php artisan db:seed
```

### Tips DBngin

- **Auto-start**: Centang "Start on login" untuk auto-start MySQL saat booting
- **Multiple services**: Bisa run MySQL, PostgreSQL, Redis bersamaan dengan port berbeda
- **Quick access**: Klik kanan service untuk quick actions (start, stop, restart)

---

## Koneksi Database dengan DataGrip

DataGrip adalah database IDE profesional dari JetBrains yang powerful untuk database management.

### Langkah-langkah Setup

#### 1. Download & Install DataGrip

1. Buka [https://www.jetbrains.com/datagrip/](https://www.jetbrains.com/datagrip/)
2. Download sesuai OS
3. Install aplikasi
4. Buka DataGrip

**Note:** DataGrip adalah paid software. Ada trial 30 hari atau bisa pakai lisensi student/education gratis.

#### 2. Create Data Source - SQLite (Development)

1. **Buka DataGrip**
2. **Klik "+" atau Cmd/Ctrl+N**
3. **Pilih "Data Source" → "SQLite"**
4. **Konfigurasi**:
   - Name: `LMS SQLite`
   - File: Browse ke `path/to/LMSprojectku/database/database.sqlite`
5. **Test Connection**
6. **Apply → OK**

#### 3. Create Data Source - MySQL (Production)

1. **Klik "+" atau Cmd/Ctrl+N**
2. **Pilih "Data Source" → "MySQL"**
3. **Konfigurasi**:
   - Name: `LMS MySQL`
   - Host: `127.0.0.1`
   - Port: `3306`
   - Database: `lms_project`
   - User: `root`
   - Password: (sesuai DBngin, default kosong)
4. **Download Driver** jika diminta
5. **Test Connection** - harus sukses
6. **Apply → OK**

### Fitur DataGrip yang Berguna

#### 1. Database Explorer

- **View Tables**: Lihat semua tabel dengan struktur
- **View Data**: Double-click tabel untuk lihat data
- **Edit Data**: Click cell untuk edit langsung
- **Export Data**: Right-click → Export Data

#### 2. SQL Console

Execute SQL queries:
```sql
-- Lihat semua materials
SELECT * FROM materials;

-- Join dengan category
SELECT m.title, c.name as category
FROM materials m
JOIN categories c ON m.category_id = c.id;

-- Update rating
UPDATE materials SET rating = 5 WHERE id = 1;
```

#### 3. ER Diagram

Visualisasi relasi antar tabel:
1. Right-click database
2. Pilih "Diagrams" → "Show Diagram"
3. Pilih tables yang mau ditampilkan
4. View relasi FK (Foreign Keys)

#### 4. Data Editor

- **Filter**: Cmd/Ctrl+F untuk filter rows
- **Sort**: Click column header
- **Add Row**: Cmd/Ctrl+N
- **Delete Row**: Cmd/Ctrl+Delete
- **Submit**: Cmd/Ctrl+Enter untuk save changes

#### 5. Import/Export

**Export Data:**
1. Right-click table
2. "Export Data"
3. Pilih format (SQL, CSV, JSON, etc.)
4. Save

**Import Data:**
1. Right-click table
2. "Import Data"
3. Pilih file
4. Map columns
5. Import

#### 6. SQL Scripts

Buat dan save SQL scripts:
1. Cmd/Ctrl+N → SQL File
2. Tulis query
3. Execute: Cmd/Ctrl+Enter
4. Save untuk reuse

### Tips DataGrip

- **Multiple Consoles**: Bisa buka multiple SQL consoles untuk testing queries
- **Auto-completion**: DataGrip punya intelligent auto-complete untuk SQL
- **Refactoring**: Rename table/column dengan safe refactoring
- **Compare**: Compare database structures atau data
- **Version Control**: Integrate dengan Git untuk track schema changes

---

## Konfigurasi Lanjutan

### 1. Multiple Environments

Setup multiple .env files:

```bash
# Development
.env

# Testing
.env.testing

# Production
.env.production
```

Switch environment saat deploy atau testing.

### 2. Queue Workers

Untuk background jobs:

```bash
# Start queue worker
php artisan queue:work

# In production (dengan supervisor)
sudo apt-get install supervisor
```

### 3. Task Scheduling

Laravel's task scheduler untuk automated tasks:

```bash
# Add to crontab
* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
```

### 4. Cache Configuration

Untuk performance:

```bash
# Cache config
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Clear all cache
php artisan cache:clear
```

---

## Tips & Tricks

### Development Tips

1. **Gunakan Tinker** untuk quick testing:
   ```bash
   php artisan tinker
   >>> App\Models\Material::count()
   >>> User::first()
   ```

2. **Debug dengan dd()** dan dump():
   ```php
   dd($variable); // Dump and die
   dump($variable); // Dump and continue
   ```

3. **Watch files** untuk auto-reload CSS/JS:
   ```bash
   npm run dev
   ```

### Database Tips

1. **Backup Database** regular:
   ```bash
   # SQLite
   cp database/database.sqlite database/backup.sqlite
   
   # MySQL
   mysqldump -u root lms_project > backup.sql
   ```

2. **Fresh migrations** untuk reset:
   ```bash
   php artisan migrate:fresh --seed
   ```

3. **Database seeding** untuk test data:
   ```bash
   php artisan db:seed --class=CategorySeeder
   ```

### Performance Tips

1. **Optimize autoloader**:
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

2. **Use eager loading** untuk avoid N+1 queries:
   ```php
   Material::with('category')->get();
   ```

3. **Index database** untuk faster queries (sudah dihandle di migrations)

---

## Troubleshooting Common Issues

### Issue: "Connection refused" saat akses project

**Solusi:**
1. Check Herd running: `herd status`
2. Restart Herd services
3. Check .test domain di browser

### Issue: "Access denied" untuk MySQL

**Solusi:**
1. Check DBngin MySQL is running
2. Verify credentials di .env
3. Try connect via terminal: `mysql -u root`

### Issue: DataGrip cannot connect

**Solusi:**
1. Test connection di DataGrip
2. Download missing drivers
3. Check firewall settings
4. Verify database service is running

### Issue: Assets tidak load

**Solusi:**
```bash
npm run build
php artisan storage:link
php artisan cache:clear
```

---

## Referensi

- Laravel Docs: [https://laravel.com/docs](https://laravel.com/docs)
- Filament Docs: [https://filamentphp.com/docs](https://filamentphp.com/docs)
- Laravel Herd: [https://herd.laravel.com/docs](https://herd.laravel.com/docs)
- DBngin: [https://dbngin.com](https://dbngin.com)
- DataGrip: [https://www.jetbrains.com/datagrip/](https://www.jetbrains.com/datagrip/)

---

**Semoga panduan ini membantu! 🚀**
