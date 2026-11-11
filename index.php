<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Praktikum PHP</title>
    </head>
    <body>
        <h1>Belajar PHP</h1>
        <?php
        echo "<p>PHP berhasil dijalankan.</p>";
        echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
        ?>
        <?php
        $nama = "Siti";
        $tugas = 91;
        $uts = 71;
        $uas = 88;
        $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
        if ($nilaiAkhir >= 85) {
            $predikat = "A";
        } elseif ($nilaiAkhir >= 75) {
            $predikat = "B";
        } elseif ($nilaiAkhir >= 60) {
            $predikat = "C";
        } else {
            $predikat = "D";
        }
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
        echo "Predikat: " . $predikat;
        ?>
        
        <?php
        $mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Rehan", "Sugeng"];
        echo "<h3>Daftar Mahasiswa</h3><ol>";
        foreach ($mahasiswa as $nama) {
            echo "<li>" . htmlspecialchars($nama) . "</li>";
        }
        echo "</ol>";
        ?>
        
        <?php
        function hitungDiskon($harga, $persen) {
            $potongan = $harga * ($persen / 100);
            return $harga - $potongan;
            }
        $hargaAkhir = hitungDiskon(150000, 10);
        echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".");
        echo "<br><br>";
        ?>
        
        <?php
        $panjang = 10;
        $lebar = 5;
        $luas = $panjang * $lebar;
        echo "Panjang: " . $panjang . " cm<br>";
        echo "Lebar: " . $lebar . " cm<br>";
        echo "Luas Persegi Panjang: " . $luas . " cm²";
        echo "<br><br>";
        ?>
        
        <!-- cari.php -->
        <form method="GET" action="">
            <label for="kata">Kata kunci:</label>
            <input id="kata" name="kata" type="text">
            <button type="submit">Cari</button>
        </form>
        <?php
        if (isset($_GET["kata"])) {
            $kata = trim($_GET["kata"]);
            echo "Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
            }
            echo "<br><br>";
            ?>
        
        <!-- index.php -->
        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input id="nama" name="nama" type="text" required>
            <label for="prodi">Program Studi:</label>
            <input id="prodi" name="prodi" type="text" required>
            <button type="submit" name="kirim">Kirim Data</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nama = trim($_POST["nama"] ?? "");
            $prodi = trim($_POST["prodi"] ?? "");
            if ($nama === "" || $prodi === "") {
                echo "<p>Semua kolom wajib diisi.</p>";
            } else {
                echo "<h3>Data diterima</h3>";
                echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
                echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
            }  
        }
        ?>
        
        <?php
        echo "<br><br>";
        $hasil = null;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $barang = trim($_POST["barang"] ?? "");
            $hargaInput = $_POST["harga"] ?? "";
            $jumlahInput = $_POST["jumlah"] ?? "";
            if ($barang === "" || !is_numeric($hargaInput) ||
            !ctype_digit((string)$jumlahInput) ||
            (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
            $error = "Periksa kembali nama barang, harga, dan jumlah.";
            } else {
                $harga = (float)$hargaInput;
                $jumlah = (int)$jumlahInput;
                $subtotal = $harga * $jumlah;
            }
        }
        ?>
        <form method="POST">
            <label>Nama barang <input name="barang" required></label>
            <label>Harga <input name="harga" type="number" min="0" step="0.01" required></label>
            <label>Jumlah <input name="jumlah" type="number" min="1" step="1" required></label>
            <button type="submit">Hitung</button>
        </form>
        <?php
        if (isset($error)) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
            } elseif (isset($subtotal)) {
            echo "<p>Barang: " . htmlspecialchars($barang) . "</p>";
            echo "<p>Subtotal: Rp" . number_format($subtotal, 0, ",", ".") . "</p>";
            }
        ?>

        <h2>Mini Project</h2>
        <?php
        $dataMhs = null;
        $errorMhs = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST" && (isset($_POST["kirim_mhs"]) || isset($_POST["nama_mhs"]))) {
            $namaMhs = trim($_POST["nama_mhs"] ?? "");
            $nimMhs = trim($_POST["nim"] ?? "");
            $prodiMhs = trim($_POST["prodi_mhs"] ?? "");
            $semesterInput = $_POST["semester"] ?? "";
            $emailMhs = trim($_POST["email"] ?? "");

            if ($namaMhs === "") $errorMhs[] = "Nama wajib diisi.";
            if ($nimMhs === "") $errorMhs[] = "NIM wajib diisi.";
            if ($prodiMhs === "") $errorMhs[] = "Program studi wajib diisi.";
            if ($emailMhs === "") {
                $errorMhs[] = "Email wajib diisi.";
            } elseif (!filter_var($emailMhs, FILTER_VALIDATE_EMAIL)) {
                $errorMhs[] = "Format email tidak valid.";
            }
            if (!ctype_digit((string)$semesterInput) ||
                (int)$semesterInput < 1 || (int)$semesterInput > 14) {
                $errorMhs[] = "Semester harus berupa angka 1–14.";
            }

            if (!$errorMhs) {
                $dataMhs = compact("namaMhs", "nimMhs", "prodiMhs", "emailMhs");
                $dataMhs["semester"] = (int)$semesterInput;
            }
        }
        ?>

        <form method="POST" action="">
            <p>
                <label for="nama_mhs">Nama:</label><br>
                <input id="nama_mhs" name="nama_mhs" type="text">
            </p>
            <p>
                <label for="nim">NIM:</label><br>
                <input id="nim" name="nim" type="text">
            </p>
            <p>
                <label for="prodi_mhs">Program Studi:</label><br>
                <input id="prodi_mhs" name="prodi_mhs" type="text">
            </p>
            <p>
                <label for="semester">Semester:</label><br>
                <input id="semester" name="semester" type="text">
            </p>
            <p>
                <label for="email">Email:</label><br>
                <input id="email" name="email" type="text">
            </p>
            <p>
                <button type="submit" name="kirim_mhs">Kirim Data Mahasiswa</button>
            </p>
        </form>

        <?php
        if (!empty($errorMhs)) {
            foreach ($errorMhs as $err) {
                echo "<p>" . htmlspecialchars($err, ENT_QUOTES, "UTF-8") . "</p>";
            }
        } elseif ($dataMhs !== null) {
            echo "<h3>Ringkasan Data Mahasiswa</h3>";
            echo "Nama: " . htmlspecialchars($dataMhs["namaMhs"], ENT_QUOTES, "UTF-8") . "<br>";
            echo "NIM: " . htmlspecialchars($dataMhs["nimMhs"], ENT_QUOTES, "UTF-8") . "<br>";
            echo "Program Studi: " . htmlspecialchars($dataMhs["prodiMhs"], ENT_QUOTES, "UTF-8") . "<br>";
            echo "Semester: " . htmlspecialchars((string)$dataMhs["semester"], ENT_QUOTES, "UTF-8") . "<br>";
            echo "Email: " . htmlspecialchars($dataMhs["emailMhs"], ENT_QUOTES, "UTF-8") . "<br>";
        }
        ?>
    </body>
</html>