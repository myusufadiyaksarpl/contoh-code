<?php 

// Daftar tipe gedung beserta harga sewanya per hari
$gedung = [
    "VIP" => 5000000,
    "Ballroom" => 3575000,
    "Outdoor" => 2500000
];

// Menentukan tipe gedung yang dipilih berdasarkan input form atau default
$pilih_gedung = $_POST['gedung'] ?? "VIP";
// Menentukan harga gedung yang dipilih
$pilih_harga = $gedung[$pilih_gedung];

// Mengecek apakah opsi catering dipilih oleh pengguna
$catering = isset($_POST['catering']);

// Mengambil durasi menginap dari input pengguna
$durasi = $_POST['durasi'] ?? '';
// Mengambil tanggal dari input pengguna
$tanggal = $_POST['tanggal'] ?? '';

// Inisialisasi total pembayaran
$total_bayar = 0;

// Array untuk menyimpan pesan error validasi
$errors = [];

// Mengecek apakah form telah dikirim (dengan metode POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi: Durasi harus angka dan lebih dari 0
    if (!is_numeric($durasi) || $durasi <= 0) {
        //menampilkan pesan error, jika durasi tidak sesuai, maka akan muncul pesan error
        $errors[] = "Durasi menginap harus berupa angka lebih dari 0.";
    }

    // Validasi: Nomor identitas harus 16 digit angka
    if (!is_numeric($_POST['identitas']) || strlen($_POST['identitas']) !== 16) {
        $errors[] = "Nomor Identitas harus 16 digit angka.";//menampilkan pesan error
    }

    // Validasi: Tanggal tidak boleh kosong
    if (empty($tanggal)) {
        $errors[] = "Tanggal harus diisi.";//menampilkan pesan error
    }

    // Jika tidak ada error validasi, hitung total pembayaran
    if (empty($errors)) {
        // Total harga gedung
        //menghitung total harga gedung yang harus dibayar
        $total_harga_gedung = $pilih_harga * $durasi;
        
        // Diskon 10% jika menginap lebih dari 3 hari
        //menghitung diskon 10% jika menginap lebih dari 3 hari
        $diskon = ($durasi > 3) ? 0.1 * $total_harga_gedung : 0;

        // Biaya tambahan catering, jika dipilih, sebesar Rp 1.200.000 per hari, jika tidak, maka biaya catering = 0
        $biaya_catering = $catering ? 1200000 * $durasi : 0;

        // Total pembayaran, dihitung dari total harga gedung dikurangi diskon ditambah biaya catering, jika ada
        //menghitung total pembayaran yang harus dibayar, dengan mengurangi diskon dan menambah biaya catering, jika ada,  dari total harga gedung
        $total_bayar = $total_harga_gedung - $diskon + $biaya_catering;
    }

    // Jika tombol "Simpan" ditekan dan tidak ada error, simpan data ke dalam session dan redirect ke index.php
    if (isset($_POST['simpan']) && empty($errors)) {
        // Menyimpan data pemesanan ke dalam array asosiatif
        $pesanan = [
            "Nama" => $_POST['nama'], //menyimpan nama pemesan
            "Nomor Identitas" => $_POST['identitas'], //menyimpan nomor identitas
            "Jenis Kelamin" => $_POST['gender'],    //menyimpan jenis kelamin
            "Tanggal" => $tanggal,//menyimpan tanggal
            "Gedung" => $pilih_gedung,//menyimpan gedung yang dipilih
            "Durasi" => $durasi . " hari", //menyimpan durasi menginap
            "Catering" => $catering ? "Ya" : "Tidak",//menyimpan status catering
            "Diskon" => "Rp " . number_format($diskon, 0, ',', '.'),   //menyimpan diskon
            "Total Bayar" => "Rp " . number_format($total_bayar, 0, ',', '.')   //menyimpan total bayar
        ];  

        // Membuat string detail pesanan untuk ditampilkan dalam alert
        $detail_pesanan = "Pesanan Berhasil!\n\n";//menampilkan pesanan berhasil, jika tidak ada error, maka akan muncul pesan pesanan berhasil
        foreach ($pesanan as $key => $value) {//menampilkan pesanan yang telah diinputkan, jika tidak ada error, maka akan muncul pesan pesanan yang telah diinputkan
            $detail_pesanan .= "$key: $value\n";// menampilkan pesanan yang telah diinputkan, // jika tidak ada error, maka akan muncul pesan pesanan yang telah diinputkan
        }
        
        echo "<script>
            alert(`$detail_pesanan`); //menampilkan pesanan yang telah diinputkan, jika tidak ada error, maka akan muncul pesan pesanan yang telah diinputkan
            window.location.href = 'index.php'; //mengarahkan ke halaman index.php
        </script>";
        exit();
    }
}
?>

<!DOCTYPE html><!-- Form Pemesanan Gedung -->
<html lang="id">//membuat form pemesanan gedung
<head>
    <meta charset="UTF-8"> <!--mengatur karakter set UTF-8-->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--mengatur tampilan di berbagai perangkat-->
    <title>Form Pemesanan Gedung</title><!--judul halaman-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"><!--memuat Bootstrap CSS-->
</head>
<body>
    <div class="container mt-5"><!--membuat container-->
        <div class="card"><!--membuat cart-->
            <div class="card-header bg-primary text-white text-center">,<!--membuat header cart, -->
                <h5>Form Pemesanan</h5><!--judul form pemesanan-->
            </div>
            <div class="card-body"><!--membuat body cart-->
                <?php if ($errors) { ?> <!--menampilkan pesan error, jika terdapat error-->
                    <div class="alert alert-danger"><!--membuat alert danger-->
                        <ul>
                            <?php foreach ($errors as $error) { ?><!--menampilkan pesan error, jika terdapat error-->
                                <li><?= $error ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <!-- Form Pemesanan -->
                <form method="POST"><!--membuat form pemesanan-->
                    <input type="text" class="form-control mb-3" name="nama" placeholder="Nama Pemesan" value="<?= $_POST['nama'] ?? '' ?>" required>
                    <!--membuat form input nama pemesan, jika tidak diisi maka akan muncul pesan error-->
                    <div class="mb-3"><!--membuat form input jenis kelamin-->
                        <label class="form-label">Jenis Kelamin</label><br><!--membuat label jenis kelamin-->
                        <input class="form-check-input" type="radio" name="gender" value="Laki-laki" <?= (isset($_POST['gender']) && $_POST['gender'] == "Laki-laki") ? 'checked' : '' ?> required> Laki-laki
                        <input class="form-check-input ms-3" type="radio" name="gender" value="Perempuan" <?= (isset($_POST['gender']) && $_POST['gender'] == "Perempuan") ? 'checked' : '' ?> required> Perempuan
                        <!--membuat form input jenis kelamin, jika tidak diisi maka akan muncul pesan error-->
                    </div>
                    <input type="text" class="form-control mb-3" name="identitas" placeholder="Nomor Identitas (16 digit)" value="<?= $_POST['identitas'] ?? '' ?>" required>
                    <!--membuat form input nomor identitas, jika tidak diisi maka akan muncul pesan error seperti memunculkan nomor harus 16 digit-->
                    <label>Tanggal</label><!--membuat label tanggal-->
                    <input type="date" class="form-control mb-3" name="tanggal" value="<?= $tanggal ?>" required>
                    <!--membuat form input tanggal, jika tidak diisi maka akan muncul pesan error-->
                    <select class="form-select mb-3" name="gedung" onchange="this.form.submit()">
                        <!--membuat form select gedung, jika tidak diisi maka akan muncul pesan error-->
                        <?php foreach ($gedung as $nama => $harga) { ?>
                            <option value="<?= $nama ?>" <?= ($nama === $pilih_gedung) ? 'selected' : '' ?>><?= $nama ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" class="form-control mb-3" name="harga" value="<?= number_format($pilih_harga, 0, ',', '.') ?>" readonly>
                    <!--membuat form input harga, jika tidak diisi maka akan muncul pesan error-->
                    <input type="number" class="form-control mb-3" name="durasi" placeholder="Durasi Menginap (hari)" value="<?= $durasi ?>" required>
                    <!--membuat form input durasi menginap, jika tidak diisi maka akan muncul pesan error-->
                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" name="catering" <?= $catering ? 'checked' : '' ?>> Termasuk Catering (Rp 1.200.000/hari)
                        <!--membuat form input catering, jika tidak diisi maka akan muncul pesan error, jika dipilih maka akan muncul pesan termasuk catering-->
                    </div>
                    <input type="text" class="form-control mb-3" id="total" value="<?= $total_bayar ? number_format($total_bayar, 0, ',', '.') : '' ?>" placeholder="Total Bayar" readonly>
                    <!--membuat form input total bayar, jika tidak diisi maka akan muncul pesan error, jika dipilih maka akan muncul pesan total bayar-->
                    <button type="submit" class="btn btn-primary">Hitung Total</button><!--membuat tombol hitung total-->
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button> <!--membuat tombol simpan-->
                    <button type="reset" class="btn btn-danger">Cancel</button><!--membuat tombol cancel-->
                </form>
            </div>
        </div>
    </div>
</body>
</html>
