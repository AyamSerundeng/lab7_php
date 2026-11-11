# Praktikum 7: PHP

**Nama:** Khairi Ramadhan Yudhatama (312510099)  
**Kelas:** Pemrograman Web (I251A)  
**Dosen:** Agung Nugroho, S.Kom., M.Kom.

## Deskripsi Praktikum

Praktikum 7 membahas penggunaan **PHP sebagai bahasa pemrograman sisi server (server-side)** untuk membuat halaman web dinamis. Kegiatan dimulai dari menjalankan PHP melalui server lokal, kemudian dilanjutkan dengan variabel, operator, percabangan, perulangan, array, function, pengolahan formulir dengan metode GET dan POST, serta validasi masukan pengguna.

Praktikum ini juga mencakup **mini project formulir data mahasiswa** dan beberapa eksperimen untuk mengembangkan program yang telah dibuat. Seluruh implementasi utama berada pada file [`index.php`](index.php).

## Tujuan Praktikum

1. Memahami cara kerja PHP dan menjalankannya melalui web server lokal.
2. Menggunakan variabel, operator aritmetika, dan percabangan untuk mengolah nilai.
3. Menerapkan array dan perulangan `foreach` untuk menampilkan data.
4. Membuat dan menggunakan function agar perhitungan dapat digunakan kembali.
5. Memproses input formulir menggunakan metode `GET` dan `POST`.
6. Memvalidasi data serta menampilkan input pengguna secara aman dengan `htmlspecialchars()`.
7. Menerapkan materi PHP dasar pada formulir mahasiswa dan penghitungan subtotal barang.

## Perangkat dan Perangkat Lunak

| Kebutuhan | Keterangan |
| --- | --- |
| Perangkat | Komputer atau laptop untuk menjalankan server lokal |
| Sistem operasi | Windows, sesuai lingkungan praktikum pada laporan |
| Text editor | Visual Studio Code atau editor kode sejenis |
| Web server lokal | XAMPP dengan Apache dan PHP |
| Browser | Google Chrome, Microsoft Edge, atau browser modern lainnya |
| Version control | Git dan GitHub untuk menyimpan kode serta dokumentasi |

> Praktikum ini tidak memerlukan database atau instalasi dependensi Composer. Program menggunakan PHP dan form HTML sederhana.

## Persiapan dan Cara Menjalankan Server Lokal

### 1. Menyiapkan direktori proyek

Pastikan **XAMPP** sudah terpasang. Simpan proyek di dalam folder `htdocs` dengan struktur berikut:

```text
C:\xampp\htdocs\lab7_php\
```

Jika ingin mengambil kode langsung dari GitHub, buka terminal pada folder `htdocs` dan jalankan:

```bash
cd C:\xampp\htdocs
git clone https://github.com/AyamSerundeng/lab7_php.git
```

Jika folder `lab7_php` sudah tersedia, cukup pastikan file `index.php` berada di dalam folder tersebut.

> **[SCREENSHOT 01]** Struktur folder `C:\xampp\htdocs\lab7_php` saat persiapan praktikum.

### 2. Mengaktifkan Apache

1. Buka **XAMPP Control Panel**.
2. Klik tombol **Start** pada modul **Apache**.
3. Pastikan Apache berjalan tanpa pesan kesalahan.
4. Buka browser dan akses alamat berikut:

```text
http://localhost/lab7_php/
```

Jika Apache menggunakan port selain 80, sesuaikan alamatnya dengan port yang digunakan. Contoh: `http://localhost:8080/lab7_php/`.

### 3. Memastikan PHP berjalan

Halaman akan menampilkan judul **Belajar PHP**, pesan **PHP berhasil dijalankan**, dan waktu server. Waktu yang ditampilkan dapat berubah mengikuti waktu saat halaman diakses.

## Struktur File

Struktur utama repositori saat dokumentasi ini dibuat:

```text
lab7_php/
├── .gitattributes    # Konfigurasi atribut Git
├── index.php         # Seluruh kode latihan, eksperimen, dan mini project
└── README.md         # Dokumentasi praktikum ini
```
---

## Langkah-Langkah Praktikum

### 1. Menjalankan PHP

Pada tahap awal, file `index.php` dibuat menggunakan HTML dan kode PHP. Fungsi `echo` digunakan untuk menampilkan teks, sedangkan `date()` menampilkan waktu dari server.

```php
echo "<p>PHP berhasil dijalankan.</p>";
echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
```

**Hasil:** Browser menampilkan teks **Belajar PHP**, **PHP berhasil dijalankan**, serta waktu server.

> **[SCREENSHOT 02]** Kode awal menjalankan PHP pada `index.php`.

> **[SCREENSHOT 03]** Hasil halaman PHP di browser pada `http://localhost/lab7_php/`.

### 2. Variabel, Operator, dan Percabangan

Latihan berikutnya menghitung nilai akhir mahasiswa menggunakan tiga komponen, yaitu tugas, UTS, dan UAS, dengan bobot masing-masing **30%, 30%, dan 40%**.

```php
$nama = "Siti";
$tugas = 91;
$uts = 71;
$uas = 88;

$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
```

Predikat ditentukan menggunakan `if`, `elseif`, dan `else`:

| Nilai akhir | Predikat |
| --- | --- |
| 85 ke atas | A |
| 75 sampai kurang dari 85 | B |
| 60 sampai kurang dari 75 | C |
| Kurang dari 60 | D |

**Hasil pengujian:** Nama **Siti**, nilai akhir **83,80**, dan predikat **B**.

> **[SCREENSHOT 04]** Kode variabel, operator, dan percabangan nilai mahasiswa.

> **[SCREENSHOT 05]** Tampilan hasil nilai akhir dan predikat di browser.

### 3. Perulangan dan Array

Array digunakan untuk menyimpan daftar nama mahasiswa. Setiap nama kemudian ditampilkan sebagai elemen daftar bernomor menggunakan `foreach`.

```php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Rehan", "Sugeng"];

echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
```

**Hasil:** Tujuh nama mahasiswa tampil secara berurutan sebagai daftar bernomor.

> **[SCREENSHOT 06]** Kode array dan perulangan `foreach`.

> **[SCREENSHOT 07]** Tampilan daftar nama mahasiswa di browser.

### 4. Membuat Function

Pada bagian ini dibuat function `hitungDiskon()` untuk menghitung harga setelah diskon serta function `formatRupiah()` untuk menampilkan angka dalam format mata uang Rupiah.

```php
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: " . formatRupiah($hargaAkhir);
```

Selain itu, perhitungan luas persegi panjang dilakukan dengan rumus:

```text
Luas = panjang × lebar
     = 10 × 5
     = 50 cm²
```

**Hasil:** Harga Rp150.000 setelah diskon 10% menjadi **Rp135.000**. Persegi panjang dengan panjang 10 cm dan lebar 5 cm memiliki luas **50 cm²**.

> **[SCREENSHOT 08]** Kode function diskon dan perhitungan luas persegi panjang.

> **[SCREENSHOT 09]** Tampilan hasil diskon dan luas persegi panjang.

### 5. Memproses Form dengan GET

Metode `GET` digunakan untuk mengirimkan kata kunci pencarian melalui URL. Form mengirim input bernama `kata`, kemudian PHP membaca nilainya melalui `$_GET["kata"]`.

```html
<form method="GET" action="">
    <label for="kata">Kata kunci:</label>
    <input id="kata" name="kata" type="text">
    <button type="submit">Cari</button>
</form>
```

Saat kata kunci **Pancoran** dikirim, URL memiliki parameter query seperti:

```text
http://localhost/lab7_php/?kata=Pancoran
```

**Hasil:** Nilai pencarian dapat dibaca oleh PHP dan ditampilkan kembali di browser. Pada tahap eksperimen, form ini dikembangkan untuk mencari nama dalam array mahasiswa.

> **[SCREENSHOT 10]** Kode form dan pemrosesan data menggunakan metode GET.

> **[SCREENSHOT 11]** Tampilan URL sebelum tombol Cari ditekan.

> **[SCREENSHOT 12]** Tampilan URL dan hasil pencarian setelah form GET dikirim.

### 6. Memproses Form dengan POST

Metode `POST` digunakan untuk mengirimkan data **Nama** dan **Program Studi** tanpa menempatkan nilainya pada query string URL. PHP membaca input melalui `$_POST` serta memeriksa apakah kolom diisi.

Pengolahan data pada bagian ini menggunakan `trim()` untuk menghapus spasi di awal dan akhir input, serta `htmlspecialchars()` agar karakter khusus tidak dibaca sebagai kode HTML ketika ditampilkan.

**Pengujian yang dilakukan:**

- **Data lengkap:** Nama dan program studi ditampilkan pada bagian **Data diterima**.
- **Data kosong:** Browser meminta pengguna melengkapi field dengan atribut `required`; server juga memiliki pemeriksaan input kosong.
- **Karakter khusus/tag HTML:** Input diperlakukan sebagai teks, bukan dijalankan sebagai HTML.

> **[SCREENSHOT 13]** Kode form POST dan pemrosesan data di PHP.

> **[SCREENSHOT 14]** Hasil form POST dengan nama dan program studi terisi.

> **[SCREENSHOT 15]** Hasil validasi ketika salah satu field belum diisi.

> **[SCREENSHOT 16]** Hasil pengujian input karakter khusus atau tag HTML.

### 7. Pengolahan Data Sederhana

Latihan ini membuat form untuk menghitung subtotal berdasarkan **nama barang**, **harga**, dan **jumlah**.

```text
Subtotal = Harga × Jumlah
```

Program melakukan pemeriksaan pada sisi server untuk memastikan bahwa nama barang tidak kosong, harga bernilai numerik dan tidak negatif, serta jumlah merupakan bilangan bulat minimal 1. Hasil subtotal ditampilkan menggunakan function `formatRupiah()`.

**Skenario pengujian:**

| Skenario | Data uji | Hasil |
| --- | --- | --- |
| Input lengkap | Sabun, harga 3000, jumlah 300 | Subtotal Rp900.000 |
| Harga desimal | Sabun, harga 2999.81, jumlah 2 | Ditampilkan sebagai Rp6.000 |
| Jumlah desimal | Jumlah 2.00 | Ditolak oleh pemeriksaan jumlah bilangan bulat pada server |
| Jumlah negatif | Jumlah -50 | Ditolak karena jumlah minimal 1 |
| Data tidak sesuai | Kolom kosong atau nilai tidak valid | Ditampilkan pesan untuk memeriksa input |

> **Catatan:** Angka subtotal ditampilkan tanpa bagian desimal oleh `number_format()`. Format tampilan tersebut tidak berarti program mengubah harga masukan menjadi bilangan bulat sebelum perkalian.

> **[SCREENSHOT 17]** Kode form barang, validasi, dan perhitungan subtotal.

> **[SCREENSHOT 18]** Hasil pengolahan data dengan input lengkap.

> **[SCREENSHOT 19]** Hasil pengujian harga berbentuk desimal.

> **[SCREENSHOT 20]** Hasil pengujian jumlah berbentuk desimal.

> **[SCREENSHOT 21]** Hasil validasi jumlah negatif atau data tidak sesuai.

---

## Mini Project: Form Data Mahasiswa

Mini project menerapkan konsep form POST dan validasi sisi server untuk mengolah data mahasiswa.

**Data yang dimasukkan:** Nama, NIM, Program Studi, Semester, dan Email.

**Aturan validasi:**

1. Nama dan program studi wajib diisi.
2. NIM wajib diisi, hanya boleh berisi angka, dan maksimal 10 digit.
3. Semester harus berupa bilangan bulat antara 1 sampai 14.
4. Email wajib diisi dengan format yang valid, diperiksa menggunakan `filter_var()` dan `FILTER_VALIDATE_EMAIL`.
5. Jika validasi berhasil, data ditampilkan pada bagian **Ringkasan Data Mahasiswa**.
6. Jika tidak valid, halaman menampilkan pesan kesalahan sesuai field yang bermasalah.

Program juga menggunakan `htmlspecialchars()` ketika menampilkan kembali data mahasiswa agar masukan yang memiliki karakter khusus tidak ditafsirkan sebagai markup HTML.

> **[SCREENSHOT 22]** Kode logika pemrosesan dan validasi data mahasiswa.

> **[SCREENSHOT 23]** Kode HTML form Nama, NIM, Program Studi, Semester, dan Email.

> **[SCREENSHOT 24]** Hasil form dengan data lengkap dan ringkasan mahasiswa.

> **[SCREENSHOT 25]** Validasi ketika Program Studi dikosongkan.

> **[SCREENSHOT 26]** Validasi ketika Email dikosongkan.

---

## Eksperimen

### Eksperimen 1. Menambahkan Nilai Rata-Rata

Program nilai mahasiswa dikembangkan agar menampilkan rata-rata dari tiga komponen nilai, selain nilai akhir berbobot.

```php
$rataRata = ($tugas + $uts + $uas) / 3;
```

Dengan nilai tugas **91**, UTS **71**, dan UAS **88**, didapatkan:

- Rata-rata: **83,33**.
- Nilai akhir berbobot: **83,80**.
- Predikat: **B**.

> **[SCREENSHOT 27]** Perubahan kode untuk menghitung nilai rata-rata.

> **[SCREENSHOT 28]** Tampilan nilai rata-rata, nilai akhir, dan predikat.

### Eksperimen 2. Pencarian Nama Mahasiswa Menggunakan GET

Form GET dikembangkan untuk mencari nama mahasiswa dari array `$mahasiswa`. Fungsi `array_filter()` dipakai untuk menyaring data, sedangkan `stripos()` memeriksa kecocokan teks tanpa membedakan huruf besar dan kecil.

```php
$hasilCari = array_filter($mahasiswa, function ($mhs) use ($kata) {
    return stripos($mhs, $kata) !== false;
});
```

Pengujian pada laporan mencakup kata kunci yang ditemukan (**Doni** dan **Bima**) serta yang tidak ditemukan (**Anton** dan **Egi**). Jika tidak ada nama yang cocok, program menampilkan pesan **Nama tidak ditemukan.**

> **[SCREENSHOT 29]** Kode perubahan form GET menjadi pencarian array mahasiswa.

> **[SCREENSHOT 30]** Tampilan daftar mahasiswa dan beberapa hasil pencarian nama.

### Eksperimen 3. Membuat Function Format Rupiah

Function `formatRupiah()` menggunakan `number_format()` untuk memberikan pemisah ribuan dan awalan `Rp`.

```php
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
```

Function ini diterapkan pada harga setelah diskon dan pada subtotal form barang sehingga hasil lebih mudah dibaca. Contohnya, angka `135000` ditampilkan sebagai **Rp135.000**, sedangkan `3000` menjadi **Rp3.000**.

> **[SCREENSHOT 31]** Kode function `formatRupiah()`.

> **[SCREENSHOT 32]** Pemakaian `formatRupiah()` pada harga setelah diskon.

> **[SCREENSHOT 33]** Pemakaian `formatRupiah()` pada hasil subtotal form barang.

### Eksperimen 4. Menambahkan Validasi NIM

Validasi NIM ditambahkan dalam mini project. NIM diperiksa dengan `ctype_digit()` agar hanya menerima angka dan `strlen()` untuk membatasi panjang maksimal **10 digit**.

```php
if ($nimMhs === "") {
    $errorMhs[] = "NIM wajib diisi.";
} elseif (!ctype_digit($nimMhs) || strlen($nimMhs) > 10) {
    $errorMhs[] = "NIM harus berupa angka dan maksimal 10 digit.";
}
```

**Hasil pengujian:** NIM yang berisi huruf atau lebih dari 10 digit ditolak. NIM numerik dengan panjang sesuai ketentuan dapat diproses apabila seluruh field lain valid.

> **[SCREENSHOT 34]** Kode validasi NIM pada mini project.

> **[SCREENSHOT 35]** Pesan kesalahan saat NIM berisi karakter selain angka.

> **[SCREENSHOT 36]** Pesan kesalahan saat NIM lebih dari 10 digit.

> **[SCREENSHOT 37]** Hasil pengiriman form dengan NIM yang valid.

### Eksperimen 5. Menambahkan Tombol Reset

Tombol reset ditambahkan untuk mengembalikan isi form ke nilai awal di browser.

```html
<button type="reset">Reset Form</button>
```

**Perbedaan tombol Reset dan Submit:**

| Reset | Submit / pemrosesan server |
| --- | --- |
| Dijalankan oleh browser (client-side). | Mengirim request ke server untuk diproses PHP. |
| Mengembalikan nilai input ke kondisi awal. | Memeriksa input, menjalankan logika, dan menghasilkan HTML respons. |
| Tidak mengirim data ke PHP. | Dapat menampilkan ringkasan data atau pesan validasi. |
| Tidak menghapus hasil server yang sudah tampil pada halaman. | Memperbarui hasil setelah request diproses. |

> **[SCREENSHOT 38]** Tampilan tombol Reset Form pada mini project dan hasil penggunaannya.

---

## Pertanyaan Evaluasi

### 1. Apa perbedaan pemrosesan client-side dan server-side?

**Client-side** berjalan di browser pengguna, contohnya HTML, CSS, dan JavaScript. Pemrosesannya dapat memberikan respons cepat, tetapi kode dan data di browser dapat diperiksa atau dimodifikasi pengguna.

**Server-side** berjalan di server, misalnya PHP. PHP mengolah data, melakukan validasi, lalu mengirimkan hasil berupa HTML kepada browser. Karena itu, pemeriksaan penting perlu dilakukan di server.

### 2. Mengapa file PHP harus dijalankan melalui web server?

PHP memerlukan interpreter yang berjalan pada lingkungan server. Browser tidak mengeksekusi sintaks PHP secara langsung. Web server seperti Apache menangani permintaan dan meneruskan pemrosesan PHP hingga hasil akhirnya dikirimkan sebagai respons ke browser. Membuka `index.php` dengan alamat `file://` tidak menjalankan kode PHP seperti saat mengaksesnya melalui `localhost`.

### 3. Apa fungsi tanda `$` pada variabel PHP?

Tanda `$` digunakan sebagai awalan nama variabel dalam PHP. Contohnya:

```php
$barang = "Meja";
$harga = 50000;
```

### 4. Apa perbedaan metode GET dan POST?

- **GET:** Data dikirim melalui parameter URL, cocok digunakan untuk pencarian dan penyaringan yang hasilnya dapat dibagikan melalui tautan.
- **POST:** Data dikirim melalui bagian body HTTP request, cocok digunakan untuk form yang memproses atau mengirimkan data tanpa meletakkannya di URL.

**Catatan:** POST tidak otomatis mengenkripsi data. Gunakan HTTPS saat mengirimkan data sensitif.

### 5. Mengapa input pengguna perlu divalidasi di sisi server?

Validasi di browser dapat dilewati atau diubah pengguna. Validasi server membantu memastikan tipe, format, dan batasan data sesuai kebutuhan aplikasi serta mengurangi risiko kesalahan pemrosesan dan penyalahgunaan input.

### 6. Apa fungsi `htmlspecialchars()` ketika menampilkan data dari form?

`htmlspecialchars()` mengubah karakter khusus HTML menjadi entitas HTML. Dengan demikian, input seperti tag HTML ditampilkan sebagai teks, bukan ditafsirkan sebagai elemen halaman. Penggunaan yang tepat membantu mencegah *cross-site scripting* (XSS) ketika menampilkan input pengguna.

### 7. Apa manfaat penggunaan function dalam program PHP?

Function membantu mengurangi penulisan kode berulang, memecah logika ke bagian lebih kecil, memudahkan pembacaan, pengujian, serta perawatan program. Pada praktikum ini contohnya adalah `hitungDiskon()` dan `formatRupiah()`.

---

## Ringkasan Hasil Praktikum

| Bagian | Ringkasan hasil |
| --- | --- |
| Menjalankan PHP | Halaman menampilkan pesan keberhasilan dan waktu server. |
| Variabel dan percabangan | Nilai akhir dihitung dengan bobot tugas 30%, UTS 30%, UAS 40%, lalu diberikan predikat. |
| Array dan perulangan | Tujuh nama mahasiswa berhasil ditampilkan dalam daftar bernomor. |
| Function | Harga setelah diskon dan luas persegi panjang berhasil dihitung. |
| GET | Kata kunci dikirim lewat URL dan digunakan untuk pencarian nama mahasiswa. |
| POST | Nama dan program studi diterima, diperiksa, lalu ditampilkan dengan aman. |
| Pengolahan data | Subtotal barang dihitung dan input tidak valid ditangani. |
| Mini project | Data mahasiswa ditampilkan setelah lulus validasi nama, NIM, prodi, semester, dan email. |
| Eksperimen | Ditambahkan rata-rata nilai, pencarian array, format Rupiah, validasi NIM, dan tombol reset. |

## Kesimpulan

Praktikum 7 berhasil menerapkan konsep dasar PHP dalam sebuah halaman web yang dijalankan melalui server lokal. Materi yang dipraktikkan mencakup pemrosesan data, percabangan, perulangan, penggunaan function, metode GET dan POST, serta validasi input di sisi server. Mini project formulir mahasiswa menjadi penerapan gabungan dari konsep-konsep tersebut, sedangkan eksperimen membantu memperbaiki fungsi pencarian, format hasil, dan ketepatan validasi.

## Referensi Kode

- Repository GitHub: [AyamSerundeng/lab7_php](https://github.com/AyamSerundeng/lab7_php)
- File implementasi utama: [`index.php`](index.php)
