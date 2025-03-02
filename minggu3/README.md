# Jobsheet 3

## Pertanyaan Jobsheet 3

### 1. Pada Praktikum 1 - Tahap 5, apakah fungsi dari `APP_KEY` pada file setting `.env` Laravel?
- APP_KEY pada .env digunakan untuk enkripsi data, seperti untuk mengenkripsi session, cookie.

### 2. Pada Praktikum 1, bagaimana kita men-generate nilai untuk `APP_KEY`?
- Dengan perintah:
```
php artisan key:generate
```

### 3. Pada Praktikum 2.1 - Tahap 1, secara default Laravel memiliki berapa file migrasi? dan untuk apa saja file migrasi tersebut?
- Pada laravel 10 memiliki 4 default file migrasi, yaitu:
    - `create_users_table.php`: untuk membuat tabel `users`.
    - `create_password_reset_tokens_table.php`: untuk membuat tabel `password_reset_tokens` yang berfungsi menyimpan token reset password.
    - `create_failed_jobs_table.php`: untuk membuat tabel `failed_jobs` yang menyimpan data pekerjaan (job) yang gagal diproses.
    - `create_personal_access_tokens_table.php`: untuk membuat tabel `personal_access_tokens` yang digunakan untuk menyimpan token akses pribadi.
  
### 4. Secara default, file migrasi terdapat kode `$table->timestamps();`, apa tujuan/output dari fungsi tersebut?
- Tujuan dari fungsi tersebut untuk menambahkan dua kolom timestamp ke dalam tabel, yaitu:
    - `created_at`: Menyimpan waktu ketika record pertama kali dibuat.
    - `updated_at`: Menyimpan waktu ketika record terakhir kali diubah.

### 5. Pada File Migrasi, terdapat fungsi `$table->id();` Tipe data apa yang dihasilkan dari fungsi tersebut?
- Tipe data yang dihasilkan dari fungsi `$table->id();` adalah unsigned big integer.

### 6. Apa bedanya hasil migrasi pada table `m_level`, antara menggunakan `$table->id()`; dengan menggunakan `$table->id('level_id');`?
- `$table->id();`: Ini menghasilkan kolom kunci utama dengan `id` nama default.
- `$table->id('level_id');`: Ini menghasilkan kolom kunci primer dengan nama `level_id`.

### 7. Pada migration, Fungsi `->unique()` digunakan untuk apa?
- Digunakan untuk memastikan bahwa nilai-nilai dalam kolom basis data tertentu unik.

### 8. Pada Praktikum 2.2 - Tahap 2, kenapa kolom `level_id` pada tabel `m_user` menggunakan `$tabel->unsignedBigInteger('level_id')`, sedangkan kolom `level_id` pada tabel `m_level` menggunakan `$tabel->id('level_id')`?
- Pada tabel `m_user`, kolom `level_id` menggunakan `$table->unsignedBigInteger('level_id')` karena kolom ini berfungsi sebagai foreign key yang mengacu pada primary key di tabel `m_level`.
- Pada tabel `m_level`, kolom `level_id` menggunakan `$table->id('level_id')` karena kolom ini berfungsi sebagai primary key yang bersifat auto-increment.

### 9. Pada Praktikum 3 - Tahap 6, apa tujuan dari Class Hash? dan apa maksud dari kode program `Hash::make('1234');`?
- Tujuan dari Class `Hash` adalah untuk menghasilkan password yang di-hash agar keamanannya terjaga.
- Maksud dari kode `Hash::make('1234');` adalah melakukan hashing terhadap string '1234'.

### 10. Pada Praktikum 4 - Tahap 3/5/7, pada query builder terdapat tanda tanya `(?)`, apa kegunaan dari tanda tanya `(?)` tersebut?
- Tanda tanya `(?)` Dalam pembangun kueri digunakan sebagai placeholder untuk pengikatan parameter. Ini membantu mencegah injeksi SQL dengan memasukkan input pengguna dengan aman ke dalam kueri.

### 11. Pada Praktikum 6 - Tahap 3, apa tujuan penulisan kode `protected $table = ‘m_user’;` dan `protected $primaryKey = ‘user_id’;`?
-  Untuk mendefinisikan nama tabel dan primary key yang digunakan oleh model Eloquent di Laravel.

### 12. Menurut kalian, lebih mudah menggunakan mana dalam melakukan operasi CRUD ke database (DB Façade / Query Builder / Eloquent ORM)? jelaskan
- Yang paling mudah digunakan untuk operasi CRUD ke database adalah Eloquent ORM. Hal ini karena Eloquent memetakan tabel ke dalam model, sehingga menghasilkan kode yang lebih bersih dan mudah di-maintain. Eloquent menyediakan sintaks yang ekspresif dan mudah dibaca untuk berinteraksi dengan database.
