# Panduan Admin Panel Filament - LMS Pusat Pembelajaran Digital

Dokumentasi lengkap penggunaan Filament Admin Panel untuk mengelola konten LMS.

## Daftar Isi

1. [Akses Admin Panel](#akses-admin-panel)
2. [Dashboard Overview](#dashboard-overview)
3. [Mengelola Kategori](#mengelola-kategori)
4. [Mengelola Materi](#mengelola-materi)
5. [Mengelola FAQ](#mengelola-faq)
6. [Tips & Best Practices](#tips--best-practices)

---

## Akses Admin Panel

### Login ke Admin Panel

1. **URL Admin Panel**: 
   - Development: `http://localhost:8000/admin`
   - Laravel Herd: `http://lmsprojectku.test/admin`
   - Production: `https://yourdomain.com/admin`

2. **Kredensial Default**:
   - **Email**: admin@lms.com
   - **Password**: password

3. **Login**:
   - Masukkan email dan password
   - Klik "Sign in"
   - Anda akan diarahkan ke Dashboard

⚠️ **PENTING**: Ganti password default setelah login pertama kali!

### Mengganti Password

1. Klik icon profile di pojok kanan atas
2. Pilih "Profile" atau "Settings"
3. Masukkan password baru
4. Confirm password
5. Save

---

## Dashboard Overview

Dashboard adalah halaman utama setelah login yang menampilkan ringkasan sistem.

### Navigasi Sidebar

Menu utama di sebelah kiri:

- **Dashboard** 📊 - Overview dan statistik
- **Kategori** 📁 - Manajemen kategori materi
- **Materi** 📄 - Manajemen materi pembelajaran
- **FAQ** ❓ - Manajemen pertanyaan dan jawaban

### Fitur Umum Filament

Setiap halaman resource memiliki fitur:

- **Search** 🔍 - Cari data dengan keyword
- **Filters** 🔽 - Filter data berdasarkan kriteria
- **Actions** ⚡ - View, Edit, Delete
- **Bulk Actions** ✓ - Operasi multiple records
- **Pagination** ⏮⏭ - Navigasi halaman data

---

## Mengelola Kategori

Kategori adalah pengelompokan untuk materi pembelajaran (Impor, Ekspor, Cukai, dll).

### Melihat Daftar Kategori

1. Klik **"Kategori"** di sidebar
2. Lihat tabel dengan kolom:
   - Gambar
   - Nama
   - Jumlah Materi
   - Status (Aktif/Tidak aktif)
   - Urutan
   - Tanggal dibuat

### Menambah Kategori Baru

1. **Klik tombol "New"** di pojok kanan atas
2. **Isi Form**:

   **Tab: Informasi Dasar**
   - **Nama Kategori*** (required)
     - Contoh: "Impor", "Ekspor", "Cukai"
     - Akan auto-generate slug saat blur
   
   - **Slug*** (required)
     - Auto-generate dari nama
     - URL-friendly (lowercase, dash)
     - Unique per kategori
     - Contoh: "impor", "ekspor", "cukai"
   
   - **Deskripsi** (optional)
     - Deskripsi singkat tentang kategori
     - Tampil di halaman kategori
   
   - **Gambar Kategori** (optional)
     - Upload gambar representasi kategori
     - Format: JPG, PNG
     - Ukuran rekomendasi: 800x600px
     - Max size: 2MB
   
   - **Urutan** (default: 0)
     - Urutan tampilan di frontend
     - Angka kecil = tampil lebih dulu
   
   - **Aktif** (default: Yes)
     - Toggle on/off status kategori
     - Kategori tidak aktif tidak tampil di frontend

3. **Klik "Create"** untuk simpan

### Mengedit Kategori

1. Di tabel kategori, klik icon **pencil (Edit)** pada row yang ingin diedit
2. Update field yang perlu diubah
3. Klik **"Save"** untuk simpan perubahan

### Menghapus Kategori

⚠️ **PERHATIAN**: Menghapus kategori akan menghapus semua materi di kategori tersebut!

**Single Delete:**
1. Klik icon **trash (Delete)** pada row
2. Confirm dialog akan muncul
3. Klik "Delete" untuk confirm

**Bulk Delete:**
1. Centang checkbox kategori yang ingin dihapus
2. Klik "Delete selected" di atas tabel
3. Confirm deletion

### Filter Kategori

- **Status Aktif**: Filter hanya kategori aktif/tidak aktif
  - Klik icon filter
  - Pilih "Hanya aktif" atau "Hanya tidak aktif"

### Tips Kategori

- Gunakan nama yang jelas dan deskriptif
- Upload gambar berkualitas tinggi
- Set urutan yang logis (misal: berdasarkan popularitas)
- Review dan update deskripsi berkala
- Pastikan minimal 1 kategori selalu aktif

---

## Mengelola Materi

Materi adalah konten pembelajaran utama yang akan ditampilkan ke user.

### Melihat Daftar Materi

1. Klik **"Materi"** di sidebar
2. Tabel menampilkan:
   - Thumbnail
   - Judul
   - Kategori
   - Rating (bintang)
   - Views
   - Status
   - Tanggal dibuat

### Menambah Materi Baru

1. **Klik "New"** di pojok kanan atas
2. **Isi Form** (divided into sections):

   **Section 1: Informasi Materi**
   
   - **Judul Materi*** (required)
     - Judul yang menarik dan deskriptif
     - Contoh: "Panduan Lengkap Impor Barang"
     - Max 255 karakter
   
   - **Slug*** (required)
     - Auto-generate dari judul
     - URL-friendly
     - Unique per materi
   
   - **Kategori*** (required)
     - Dropdown pilih kategori
     - Searchable
     - Bisa create new kategori langsung dari sini
   
   - **Deskripsi Singkat*** (required)
     - Ringkasan materi (2-3 kalimat)
     - Tampil di card preview
     - 3 rows textarea
   
   - **Konten Lengkap** (optional)
     - Rich editor untuk konten detail
     - Support formatting: **bold**, *italic*, heading, list
     - Support link dan image
     - Tampil di halaman detail materi
   
   - **Aktif** (default: Yes)
     - Status publikasi materi
   
   - **Rating** (default: 5)
     - Rating 1-5 bintang
     - Tampil di card dan detail

   **Section 2: Media & File**
   
   - **Thumbnail** (optional)
     - Gambar utama materi
     - Format: JPG, PNG
     - Ukuran rekomendasi: 1200x800px
     - Tampil di card dan detail
   
   - **File PDF** (optional)
     - Upload dokumen PDF
     - Max 10MB
     - Bisa didownload user
   
   - **File PowerPoint** (optional)
     - Upload file PPT/PPTX
     - Max 10MB
     - Bisa didownload user
   
   - **File Word** (optional)
     - Upload file DOC/DOCX
     - Max 10MB
     - Bisa didownload user
   
   - **File Video** (optional)
     - Upload video pembelajaran
     - Format: MP4, AVI, MOV
     - Max 50MB
     - Bisa diplay/download user

3. **Klik "Create"** untuk publikasi

### Mengedit Materi

1. Klik icon **pencil (Edit)** pada materi
2. Update informasi atau upload file baru
3. **Tips**: Bisa replace file dengan upload baru
4. Klik **"Save"**

### Menghapus Materi

**Single Delete:**
1. Klik icon **trash (Delete)**
2. Confirm deletion
3. File yang ter-attach akan otomatis terhapus

**Bulk Delete:**
1. Centang checkbox materi
2. Klik "Delete selected"
3. Confirm

### View Detail Materi

1. Klik icon **eye (View)** untuk preview
2. Lihat semua informasi dan file
3. Test download links
4. Close modal setelah selesai

### Filter Materi

1. **Filter by Kategori**:
   - Dropdown kategori
   - Multi-select supported
   
2. **Filter by Status**:
   - Aktif / Tidak Aktif

### Sort Materi

Klik column header untuk sort:
- Judul (A-Z atau Z-A)
- Kategori
- Rating (tinggi ke rendah)
- Views (populer dulu)
- Tanggal (terbaru/terlama)

### Tips Materi

**Content Creation:**
- Judul: Gunakan keyword yang sering dicari
- Deskripsi: Jelas, singkat, menarik (ideal 150-200 karakter)
- Konten: Struktur dengan heading, paragraph, list
- Gunakan formatting untuk readability

**Media:**
- Thumbnail: Gunakan gambar berkualitas, relevant
- PDF: Compress untuk ukuran optimal
- Video: Edit dan compress sebelum upload
- Nama file: Gunakan nama deskriptif

**Optimization:**
- Cek preview sebelum publish
- Test semua download links
- Update konten berkala
- Monitor views dan adjust content

---

## Mengelola FAQ

FAQ (Frequently Asked Questions) membantu user menemukan jawaban cepat.

### Melihat Daftar FAQ

1. Klik **"FAQ"** di sidebar
2. Tabel menampilkan:
   - Pertanyaan
   - Jawaban (preview)
   - Status
   - Urutan
   - Tanggal dibuat

### Menambah FAQ Baru

1. **Klik "New"**
2. **Isi Form**:

   - **Pertanyaan*** (required)
     - Pertanyaan lengkap dan jelas
     - Contoh: "Apa itu Impor?"
     - Max 255 karakter
   
   - **Jawaban*** (required)
     - Jawaban lengkap dengan detail
     - Rich editor dengan formatting
     - Support paragraph, list, bold, italic
     - Bisa panjang, tapi usahakan concise
   
   - **Urutan** (default: 0)
     - Urutan tampilan di halaman FAQ
     - FAQ penting = urutan kecil
   
   - **Aktif** (default: Yes)
     - Status publikasi FAQ

3. **Klik "Create"**

### Mengedit FAQ

1. Klik icon **Edit** pada FAQ
2. Update pertanyaan atau jawaban
3. Adjust urutan jika perlu
4. **Save**

### Menghapus FAQ

1. Single atau bulk delete
2. Confirm deletion

### Tips FAQ

**Best Practices:**
- Pertanyaan: Gunakan bahasa natural seperti user bertanya
- Jawaban: 
  - Jelas dan to the point
  - Struktur dengan paragraph atau bullet points
  - Tambahkan link ke materi terkait jika ada
  - Gunakan contoh konkrit jika perlu

**Organization:**
- Group related questions dengan urutan berdekatan
- FAQ populer = urutan kecil (tampil di atas)
- Update jawaban jika ada perubahan regulasi

**Writing Style:**
- Tone: Friendly tapi professional
- Length: Ideal 100-300 kata per jawaban
- Format: Break long answers dengan subheading
- Links: Link ke materi detail jika ada

---

## Tips & Best Practices

### Content Management

1. **Konsistensi**:
   - Gunakan style guide yang sama
   - Format heading, paragraph consistent
   - Naming convention untuk file

2. **Quality Control**:
   - Preview sebelum publish
   - Proofread untuk typo
   - Test semua links dan downloads
   - Check responsive di mobile

3. **SEO Friendly**:
   - Judul deskriptif dengan keyword
   - Slug clean dan readable
   - Deskripsi informatif
   - Alt text untuk gambar (future)

### File Management

1. **Naming Convention**:
   ```
   ✅ Good: panduan-impor-barang.pdf
   ❌ Bad: file1.pdf, untitled.pdf
   ```

2. **Optimization**:
   - Compress images (TinyPNG, ImageOptim)
   - Compress PDF (Adobe Acrobat, online tools)
   - Video: Use web-optimized format
   - Test download speed

3. **Organization**:
   - Folders by category di storage
   - Version control untuk updates
   - Backup files regularly

### Security

1. **Access Control**:
   - Ganti password default ASAP
   - Gunakan strong password
   - Logout after use
   - Limited admin accounts

2. **Content Safety**:
   - Validate file uploads
   - Scan for malware
   - Backup database regularly
   - Version control with Git

### Performance

1. **Optimize Database**:
   - Use filters untuk narrow search
   - Bulk operations untuk efficiency
   - Regular cleanup deleted files

2. **Media Optimization**:
   - Appropriate image size
   - Lazy loading (already implemented)
   - CDN untuk static files (production)

### User Experience

1. **Content Quality**:
   - Accurate and up-to-date
   - Well-structured
   - Easy to understand
   - Actionable

2. **Navigation**:
   - Clear categorization
   - Logical ordering
   - Search-friendly titles

3. **Accessibility**:
   - Clear language
   - Proper formatting
   - Multiple file formats

---

## Keyboard Shortcuts

Filament mendukung beberapa keyboard shortcuts:

- **Cmd/Ctrl + K**: Quick search
- **Cmd/Ctrl + S**: Save form
- **Esc**: Close modal
- **Tab**: Navigate fields
- **Enter**: Submit form

---

## Troubleshooting

### Issue: File upload gagal

**Solusi:**
1. Check file size < max limit
2. Check file format supported
3. Check storage permissions: `chmod -R 775 storage`
4. Check disk space cukup

### Issue: Rich editor tidak load

**Solusi:**
1. Clear browser cache
2. Check JavaScript errors di console
3. Reload page dengan Cmd/Ctrl + Shift + R

### Issue: Slug already exists

**Solusi:**
1. Edit slug manually
2. Add suffix number (e.g., `impor-2`)
3. Make title more specific

---

## Support

Jika ada pertanyaan atau issue:

- 📧 Email: admin@lms.com
- 💬 WhatsApp: +62 822 9027 9052

---

**Happy Managing! 🎉**
