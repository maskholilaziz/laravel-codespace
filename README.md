### **Timeline & Rencana Aksi Proyek: Dapur Pintar MVP v1.0**

**Estimasi Total Pengerjaan:** 11 Minggu (sekitar 3 bulan)

#### **Sprint 0: Fondasi, Desain & Persiapan (1 Minggu)**

Ini adalah fase persiapan sebelum kita menulis satu baris pun kode aplikasi. Tujuannya adalah memastikan semua rancangan dan alat kerja sudah siap.

-   **Tujuan Utama:** Memiliki cetak biru visual dan teknis yang lengkap.
-   **Detail Task:**
    1.  **Desain UI/UX:** Membuat _wireframe_ detail dan _mockup_ (desain visual) untuk semua layar yang ada di PRD menggunakan Figma.
    2.  **Setup Environment:**
        -   Membuat _repository_ Git (GitHub/GitLab).
        -   Setup _environment_ development lokal untuk Flutter & Laravel.
    3.  **Setup Backend:**
        -   Membeli domain & hosting/server.
        -   Membuat database MySQL dan mengeksekusi skema ERD yang sudah kita buat.
-   **Hasil Akhir (Deliverable):**
    -   ✅ Desain UI/UX final di Figma yang siap diimplementasikan.
    -   ✅ Database live dengan semua tabel yang sudah dibuat.
    -   ✅ Lingkungan kerja developer sudah siap.

---

#### **Sprint 1: Pembangunan Backend & Web Admin Panel (2 Minggu)**

Fokus pada "dapur" aplikasi. Membangun fondasi di sisi server agar aplikasi mobile nanti punya sumber data.

-   **Tujuan Utama:** Web Admin bisa digunakan untuk mengisi data resep dan API dasar sudah berfungsi.
-   **Detail Task:**
    1.  **Backend (Laravel):**
        -   Setup proyek Laravel baru, hubungkan ke database.
        -   Buat semua _Model_ & _Relationship_ Eloquent sesuai ERD.
        -   Install dan konfigurasi **Filament** untuk Admin Panel.
        -   Buat semua halaman CRUD (Create, Read, Update, Delete) di Filament untuk `Recipes`, `Ingredients`, `Categories`, dan `Steps`.
    2.  **API (Laravel):**
        -   Buat API _endpoints_ dasar (hanya untuk READ/membaca data):
            -   `GET /api/recipes` (mendapatkan semua resep)
            -   `GET /api/recipes/{id}` (mendapatkan detail satu resep)
            -   `GET /api/categories`
    3.  **Konten:** Mulai proses "masak-uji-tulis-foto" untuk **20 resep pertama**. Masukkan data ini melalui Web Admin.
-   **Hasil Akhir (Deliverable):**
    -   ✅ Web Admin Panel yang fungsional dan sudah terisi data awal.
    -   ✅ API yang bisa diakses dan mengembalikan data resep dalam format JSON.

---

#### **Sprint 2: Pembangunan Core Aplikasi Mobile (3 Minggu)**

Mulai membangun aplikasi yang akan dilihat pengguna. Fokus pada tampilan dan konektivitas ke backend.

-   **Tujuan Utama:** Aplikasi bisa menampilkan data resep dari server dan pengguna bisa menjelajahinya.
-   **Detail Task (Flutter):**
    1.  **Struktur Proyek:** Buat arsitektur dan struktur folder yang rapi (modular).
    2.  **Koneksi API:** Buat _service_ untuk berkomunikasi dengan API Laravel.
    3.  **Implementasi UI:**
        -   Membangun Halaman Utama (Home Screen).
        -   Membangun Halaman Pencarian.
        -   Membangun Halaman Detail Resep (termasuk logika Skala Porsi Otomatis).
        -   Membangun Halaman Daftar Kategori dan Daftar Resep per Kategori.
    4.  **Fungsionalitas:** Sambungkan UI dengan data dari API. Data resep dari server kini harus bisa tampil dengan baik di aplikasi.
-   **Hasil Akhir (Deliverable):**
    -   ✅ Aplikasi mobile yang bisa di-install, di mana pengguna bisa melihat daftar resep, mencari resep, dan melihat detailnya.

---

#### **Sprint 3: Implementasi Fitur Andalan (3 Minggu)**

Inilah fase di mana kita membangun "sihir" Dapur Pintar yang membedakannya dari yang lain.

-   **Tujuan Utama:** Fitur memasak interaktif berfungsi sepenuhnya.
-   **Detail Task (Flutter):**
    1.  **Mode Masak Tunggal:**
        -   Membangun UI layar penuh untuk panduan langkah-demi-langkah.
        -   Mengimplementasikan **Timer Terintegrasi**.
        -   Mengimplementasikan **Panduan Takaran Visual** (pop-up gambar saat ikon `[?]` ditekan).
        -   Mendesain dan mengimplementasikan alur **Langkah "Koreksi Rasa"**.
    2.  **Mode "Sesi Tempur":**
        -   Membangun UI _dashboard_ untuk menampilkan tugas-tugas paralel.
        -   Mengimplementasikan logika multi-timer.
    3.  **Polesan UI/UX:** Menambahkan animasi dan transisi agar aplikasi terasa lebih hidup dan profesional.
-   **Hasil Akhir (Deliverable):**
    -   ✅ Pengguna bisa menjalankan resep dari awal hingga akhir menggunakan Mode Masak interaktif.

---

#### **Sprint 4: Pengujian Internal, Beta & Peluncuran (2 Minggu)**

Fase terakhir sebelum aplikasi dilepas ke publik. Fokus pada kualitas dan persiapan rilis.

-   **Tujuan Utama:** Aplikasi stabil, bebas dari _bug_ kritis, dan berhasil dipublikasikan.
-   **Detail Task:**
    1.  **Pengujian:**
        -   Melakukan pengujian internal secara menyeluruh di berbagai perangkat.
        -   Membuat daftar dan memperbaiki semua _bug_ yang ditemukan.
        -   Mengundang teman atau keluarga (termasuk temanmu si _power user_!) untuk menjadi **Beta Tester** dan mengumpulkan _feedback_.
    2.  **Persiapan Rilis:**
        -   Menyiapkan semua aset untuk Google Play Store & Apple App Store (ikon, _screenshot_, deskripsi aplikasi, kebijakan privasi).
        -   Melakukan proses pendaftaran dan pengiriman aplikasi ke kedua _store_.
-   **Hasil Akhir (Deliverable):**
    -   ✅ Aplikasi **Dapur Pintar v1.0** tersedia untuk diunduh oleh publik! 🎉

---

Peta perjalanan ini memberikan kita struktur dan target yang jelas di setiap fase. Mari kita mulai dengan **Sprint 0** dan wujudkan ide ini menjadi kenyataan, langkah demi langkah.
