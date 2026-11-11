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

> <img width="831" height="197" alt="Screenshot 2026-11-11 074552" src="https://github.com/user-attachments/assets/423ccca2-43cf-4df1-96af-9dce18fceaac" />

Struktur folder `C:\xampp\htdocs\lab7_php` saat persiapan praktikum.

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

> <img width="725" height="405" alt="Screenshot 2026-11-11 074657" src="https://github.com/user-attachments/assets/216c0b71-679f-46d4-bca2-d8ad6133d3d8" />
Kode awal menjalankan PHP pada `index.php`.

> <img width="557" height="336" alt="Screenshot 2026-11-11 074820" src="https://github.com/user-attachments/assets/e2d8c9b2-0044-4d1e-8101-33f749e8763b" />
Hasil halaman PHP di browser pada `http://localhost/lab7_php/`.

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

> <img width="685" height="457" alt="Screenshot 2026-11-11 075309" src="https://github.com/user-attachments/assets/d8529b2b-9219-41c0-9a5e-5167d4dccc81" />

Kode variabel, operator, dan percabangan nilai mahasiswa.

> <img width="560" height="407" alt="Screenshot 2026-11-11 075422" src="https://github.com/user-attachments/assets/97a65244-9f28-4eae-8f8c-f072caa8eb8f" />

Tampilan hasil nilai akhir dan predikat di browser.

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

> <img width="767" height="187" alt="Screenshot 2026-11-11 080259" src="https://github.com/user-attachments/assets/4007a197-2295-4c2a-bcf0-7357f6743209" />
Kode array dan perulangan `foreach`.

> <img width="267" height="218" alt="Screenshot 2026-11-11 080315" src="https://github.com/user-attachments/assets/99b1b135-a095-4bcb-9f68-67d9b2287868" />

Tampilan daftar nama mahasiswa di browser.

### 4. Membuat Function

Pada bagian ini dibuat function `hitungDiskon()` untuk menghitung harga setelah diskon serta function `formatRupiah()` (hasil dari eksperimen mandiri) untuk menampilkan angka dalam format mata uang Rupiah.

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

> <img width="777" height="436" alt="Screenshot 2026-11-11 080713" src="https://github.com/user-attachments/assets/f2d3f166-563c-4504-99c5-4e9aac375a05" />

Kode function diskon dan perhitungan luas persegi panjang.

> <img width="297" height="150" alt="Screenshot 2026-11-11 080924" src="https://github.com/user-attachments/assets/cec29287-bba4-4df9-9e1a-f18ad6ecc8a6" />

Tampilan hasil diskon dan luas persegi panjang.

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

> <img width="762" height="292" alt="Screenshot 2026-11-11 081518" src="https://github.com/user-attachments/assets/6bc21a49-a398-4efe-9902-98efe883629d" />

Kode form dan pemrosesan data menggunakan metode GET.

> <img width="461" height="45" alt="Screenshot 2026-11-11 081618" src="https://github.com/user-attachments/assets/540171ff-28bc-4143-8aae-20cb26e07adb" />

Tampilan URL sebelum tombol Cari ditekan.

> <img width="380" height="48" alt="Screenshot 2026-11-11 081713" src="https://github.com/user-attachments/assets/75fee121-2645-4bdb-9999-3ffa775fad6f" />
> <img width="372" height="46" alt="Screenshot 2026-11-11 081733" src="https://github.com/user-attachments/assets/1b589ad2-6d09-4902-8939-3bb17a48a488" />
> <img width="390" height="73" alt="Screenshot 2026-11-11 081742" src="https://github.com/user-attachments/assets/e44bfeaf-5a18-475b-b5a4-bd529e8b5104" />

Tampilan URL dan hasil pencarian setelah form GET dikirim.

### 6. Memproses Form dengan POST

Metode `POST` digunakan untuk mengirimkan data **Nama** dan **Program Studi** tanpa menempatkan nilainya pada query string URL. PHP membaca input melalui `$_POST` serta memeriksa apakah kolom diisi.

Pengolahan data pada bagian ini menggunakan `trim()` untuk menghapus spasi di awal dan akhir input, serta `htmlspecialchars()` agar karakter khusus tidak dibaca sebagai kode HTML ketika ditampilkan.

**Pengujian yang dilakukan:**

- **Data lengkap:** Nama dan program studi ditampilkan pada bagian **Data diterima**.
- **Data kosong:** Browser meminta pengguna melengkapi field dengan atribut `required`; server juga memiliki pemeriksaan input kosong.
- **Karakter khusus/tag HTML:** Input diperlakukan sebagai teks, bukan dijalankan sebagai HTML.

> <img width="830" height="513" alt="Screenshot 2026-11-11 082313" src="https://github.com/user-attachments/assets/2f0a324a-b60f-4f1e-b61b-0b6845e168cd" />

Kode form POST dan pemrosesan data di PHP.

> <img width="730" height="162" alt="Screenshot 2026-11-11 082424" src="https://github.com/user-attachments/assets/6afd1cd7-9917-4e84-8876-6f0c1708ef12" />

Hasil form POST dengan nama dan program studi terisi.

> <img width="753" height="98" alt="Screenshot 2026-11-11 082749" src="https://github.com/user-attachments/assets/a97623af-3b7d-459e-bf86-9d91a546bc6f" />

Hasil validasi ketika salah satu field belum diisi.

> <img width="755" height="67" alt="Screenshot 2026-11-11 082838" src="https://github.com/user-attachments/assets/553495d4-e4d2-456c-9dc8-bad605234009" />
> <img width="245" height="120" alt="Screenshot 2026-11-11 082848" src="https://github.com/user-attachments/assets/26cd3804-b05e-4fd7-b647-e1468dc8dd63" />

Hasil pengujian input karakter khusus atau tag HTML.

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

> <img width="942" height="746" alt="Screenshot 2026-11-11 083157" src="https://github.com/user-attachments/assets/3af7a55d-146b-487f-9540-9f6159cbfd54" />

Kode form barang, validasi, dan perhitungan subtotal.

> <img width="1015" height="45" alt="Screenshot 2026-11-11 083504" src="https://github.com/user-attachments/assets/a89c1c67-0b07-48c9-8b8b-b19506417f1a" />
> <img width="202" height="76" alt="Screenshot 2026-11-11 083550" src="https://github.com/user-attachments/assets/f02c4188-270b-47b7-9004-05ab50740851" />

Hasil pengolahan data dengan input lengkap.

> <img width="975" height="52" alt="Screenshot 2026-11-11 083658" src="https://github.com/user-attachments/assets/c2938a8d-6e22-441a-bcda-e30daca42a4e" />
> <img width="171" height="82" alt="Screenshot 2026-11-11 083716" src="https://github.com/user-attachments/assets/8e101b01-abbe-4e55-b7f3-ffcc861518f4" />

Hasil pengujian harga berbentuk desimal.

> <img width="962" height="50" alt="Screenshot 2026-11-11 084706" src="https://github.com/user-attachments/assets/b9bca7ca-1769-4de5-832b-9bc1e0670c95" />
> <img width="412" height="46" alt="Screenshot 2026-11-11 084730" src="https://github.com/user-attachments/assets/f2e09c9f-941b-41a7-8c92-a69aa033cced" />

Hasil pengujian jumlah berbentuk desimal.

> <img width="973" height="97" alt="Screenshot 2026-11-11 084204" src="https://github.com/user-attachments/assets/5930fe45-7047-4358-9d83-75c6977894ae" />
Hasil validasi jumlah negatif atau data tidak sesuai.

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

> <img width="1163" height="741" alt="Screenshot 2026-11-11 093644" src="https://github.com/user-attachments/assets/9b959c8c-5635-4daa-83d9-1408077ce9ef" />
Kode logika pemrosesan dan validasi data mahasiswa.

> <img width="938" height="802" alt="Screenshot 2026-11-11 093715" src="https://github.com/user-attachments/assets/f470dcaf-3ca9-4142-b9a6-15701bb7e2c8" />

Kode HTML form Nama, NIM, Program Studi, Semester, dan Email.

> <img width="322" height="635" alt="Screenshot 2026-11-11 093451" src="https://github.com/user-attachments/assets/2fdcfb26-7164-4928-8794-8777e32c34e2" />

Hasil form dengan data lengkap dan ringkasan mahasiswa.

> <img width="247" height="497" alt="Screenshot 2026-11-11 094722" src="https://github.com/user-attachments/assets/2ec3beb4-678e-4694-8d24-0c922178c504" />

Validasi ketika Program Studi dikosongkan.

> <img width="247" height="500" alt="Screenshot 2026-11-11 095108" src="https://github.com/user-attachments/assets/f3edf4d2-2b33-4dde-b6a2-7e1b5570f5dc" />
Validasi ketika Email dikosongkan.

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

> <img width="780" height="418" alt="Screenshot 2026-11-11 105114" src="https://github.com/user-attachments/assets/623aff65-4a0c-425e-a813-59e30177a143" />
Perubahan kode untuk menghitung nilai rata-rata.

> <img width="187" height="107" alt="Screenshot 2026-11-11 105140" src="https://github.com/user-attachments/assets/b1e2d32a-c9bf-4f78-8cb6-4b6043774dfd" />
Tampilan nilai rata-rata, nilai akhir, dan predikat.

### Eksperimen 2. Pencarian Nama Mahasiswa Menggunakan GET

Form GET dikembangkan untuk mencari nama mahasiswa dari array `$mahasiswa`. Fungsi `array_filter()` dipakai untuk menyaring data, sedangkan `stripos()` memeriksa kecocokan teks tanpa membedakan huruf besar dan kecil.

```php
$hasilCari = array_filter($mahasiswa, function ($mhs) use ($kata) {
    return stripos($mhs, $kata) !== false;
});
```

Pengujian pada laporan mencakup kata kunci yang ditemukan (**Doni** dan **Bima**) serta yang tidak ditemukan (**Anton** dan **Egi**). Jika tidak ada nama yang cocok, program menampilkan pesan **Nama tidak ditemukan.**

> <img width="1157" height="550" alt="Screenshot 2026-11-11 105845" src="https://github.com/user-attachments/assets/2a9b2275-ea7b-4a58-b100-39e463298e22" />

Kode perubahan form GET menjadi pencarian array mahasiswa.

> <img width="380" height="447" alt="Screenshot 2026-11-11 110154" src="https://github.com/user-attachments/assets/7b322227-68f6-4471-b3fe-88338c56cb84" />
> <img width="377" height="85" alt="Screenshot 2026-11-11 110344" src="https://github.com/user-attachments/assets/a11a081b-25c4-4c33-8166-3fd6398601ba" />
> <img width="371" height="80" alt="Screenshot 2026-11-11 110507" src="https://github.com/user-attachments/assets/f2638125-9b21-43ef-9809-b00ea49a913b" />
> <img width="373" height="77" alt="Screenshot 2026-11-11 110436" src="https://github.com/user-attachments/assets/0cbdd11f-3bab-40f4-b601-b27980044e96" />

Tampilan daftar mahasiswa dan beberapa hasil pencarian nama.

### Eksperimen 3. Membuat Function Format Rupiah

Function `formatRupiah()` menggunakan `number_format()` untuk memberikan pemisah ribuan dan awalan `Rp`.

```php
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
```

Function ini diterapkan pada harga setelah diskon dan pada subtotal form barang sehingga hasil lebih mudah dibaca. Contohnya, angka `135000` ditampilkan sebagai **Rp135.000**, sedangkan `3000` menjadi **Rp3.000**.

> <img width="535" height="110" alt="Screenshot 2026-11-11 184607" src="https://github.com/user-attachments/assets/f5e27b7a-5759-481b-a404-0c7a9eff619d" />

Kode function `formatRupiah()`.

> <img width="562" height="117" alt="Screenshot 2026-11-11 184637" src="https://github.com/user-attachments/assets/5e2baa06-8041-4475-b7f0-ed321b2b3f73" />
> <img width="232" height="40" alt="Screenshot 2026-11-11 185016" src="https://github.com/user-attachments/assets/0c02161e-f207-482d-a2da-2a4983522766" />

Pemakaian `formatRupiah()` pada harga setelah diskon.

> <img width="658" height="106" alt="Screenshot 2026-11-11 185231" src="https://github.com/user-attachments/assets/b3602f0c-19e3-4304-a1e6-b8d1f4ba571b" />
> <img width="131" height="68" alt="Screenshot 2026-11-11 185024" src="https://github.com/user-attachments/assets/9d1b9a27-b82f-4051-8b7b-0be67aacbbda" />

Pemakaian `formatRupiah()` pada hasil subtotal form barang.

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

> <img width="658" height="106" alt="Screenshot 2026-11-11 185231" src="https://github.com/user-attachments/assets/713cb191-989f-4ad6-94c1-add1da32a569" />
Kode validasi NIM pada mini project.

> <img width="319" height="389" alt="Screenshot 2026-11-11 185358" src="https://github.com/user-attachments/assets/fc4d0cd5-414f-470d-948e-bbbbd52f0d83" />
Pesan kesalahan saat NIM berisi karakter selain angka.

> <img width="321" height="384" alt="Screenshot 2026-11-11 185419" src="https://github.com/user-attachments/assets/2d7069c6-8ded-4679-8dbd-3875491e48ec" />
Pesan kesalahan saat NIM lebih dari 10 digit.

> <img width="254" height="146" alt="Screenshot 2026-11-11 185529" src="https://github.com/user-attachments/assets/b1fd1e46-69e7-4fb7-98c6-4b0d2e1f1a54" />
Hasil pengiriman form dengan NIM yang valid.

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

> <img width="707" height="44" alt="Screenshot 2026-11-11 185748" src="https://github.com/user-attachments/assets/e5e53c7a-d9dd-4f5a-bc36-38fb3b128adb" />
> <img width="249" height="40" alt="Screenshot 2026-11-11 190043" src="https://github.com/user-attachments/assets/ec35507b-c998-4f32-b52f-370c7a91aa90" />


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
