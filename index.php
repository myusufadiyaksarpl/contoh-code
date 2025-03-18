<?php
// Membuat array multidimensi yang menyimpan daftar paket gedung
// Setiap elemen array berisi informasi gedung: Nama, Deskripsi, Harga, dan Nama File Gambar
$paket_gedung = array(
    array("GEDUNG VIP", "Gedung VIP Cinepolis menghadirkan kenyamanan mewah dengan kursi luas yang bisa direbahkan, layanan premium, serta audio dan visual berkualitas tinggi untuk pengalaman menonton yang eksklusif
    ,BIOSKOP CINEPOLIS Jl. Hartono Raya No.9C, RT.003/RW.006, Klp. Indah, Kota Tangerang, Banten 15117,NO Telp : 
087777731078,ALAMAT EMAIL : ta@cinepolis.co.id", 5000000, "bioskop.jpg"),
    array("GEDUNG GOLDEN TULIP GALAXY HOTEL Ballrom ","Ballroom Golden Tulip Galaxy Hotel adalah ruang mewah dan luas, ideal untuk acara besar dengan fasilitas modern dan layanan premium,Galaxy Hotel Banjarmasin,
    ALAMAT Jalan A. Yani KM 2,5 No.138, Sungai Baru Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233,
    No Telp :081241413 ALAMAT EMAILinfo@goldentulipgalaxy.com", 3575000, "ballrom.jpg"),
    array("GEDUNG SIRING Outdoor", "Siring Kota Banjarmasin adalah area wisata tepi sungai yang ikonik, menawarkan pemandangan indah, wisata susur sungai, taman terbuka, dan landmark seperti Patung Bekantan.
    ,ALAMAT : MHJV+J24, Jl. Jend Sudirman, Siring, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70123,No Telp : 0814113353", 2500000, "outdor.jpg")
);
?>
<!DOCTYPE html>  <!-- Mendefinisikan tipe dokumen -->
<html lang="id">    <!-- Menentukan bahasa dokumen -->
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Menyesuaikan tampilan di berbagai perangkat -->
    <title>GEDUNG</title> <!-- Judul halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Memuat Bootstrap CSS -->
    <style>
        body { background-color:rgb(83, 99, 222); color: white; } /* Mengatur warna latar belakang dan teks */
        .card { background-color: #666666; height: 100%; color: white; } /* Mengatur tampilan kartu */
        .btn-custom { background-color: rgb(20, 22, 20); color: white; } /* Mengatur warna tombol custom */
        .carousel-inner img { height: 900px; object-fit: cover; width: 100%; } /* Mengatur tampilan gambar dalam carousel */
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-light bg-white navbar-expand-lg border-bottom">
    <div class="container">
        <a class="navbar-brand text-dark fw-bold" href="#">Home</a> <!-- Link ke halaman utama -->
        <a class="navbar-brand text-dark fw-bold" href="transaksi.php">Transaksi</a> <!-- Link ke halaman transaksi -->
        <a class="navbar-brand text-dark fw-bold ms-auto" href="#">Logout</a> <!-- Link untuk logout -->
    </div>
</nav>

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide"><
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button><!-- Tombol untuk slide 1 -->
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button><!-- Tombol untuk slide 2 -->
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button><!-- Tombol untuk slide 3 -->
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active"><!-- Item pertama dalam carousel -->
          <img src="img/bioskop.jpg" class="d-block w-100" alt="ballrom"><!-- Gambar gedung -->
          <div class="carousel-caption d-none d-md-block"><!-- Deskripsi gedung -->
            <h5>VIP</h5><!-- Nama gedung -->
            <p>Rp. 5.000.000 </p><!-- Harga gedung -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/ballrom.jpg" class="d-block w-100" alt="ballrom">
          <div class="carousel-caption d-none d-md-block">
            <h5>Ballrom</h5><!-- Nama gedung -->
            <p>Rp. 3.575.000</p><!-- Harga gedung -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/outdor.jpg" class="d-block w-100" alt="outdor"><!-- Gambar gedung -->
          <div class="carousel-caption d-none d-md-block">
            <h5>outdor</h5><!-- Nama gedung -->
            <p>Rp. 2.500.000</p> <!-- Harga gedung -->
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"> <!-- Tombol untuk slide sebelumnya -->
        <span class="carousel-control-prev-icon" aria-hidden="true"></span> <!-- Ikon panah -->
        <span class="visually-hidden">Previous</span>  <!-- Teks untuk aksesibilitas -->
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">   <!-- Tombol untuk slide selanjutnya -->
        <span class="carousel-control-next-icon" aria-hidden="true"></span> <!-- Ikon panah -->
        <span class="visually-hidden">Next</span>   <!-- Teks untuk aksesibilitas -->
      </button>
    </div>


<!-- Daftar Gedung -->
<div class="container text-center mt-4">
    <h2 class="fw-bold">DAFTAR GEDUNG SMK ISFI BJM</h2> <!-- Judul bagian daftar gedung -->
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <?php foreach ($paket_gedung as $index => $data) { ?> <!-- Looping untuk menampilkan daftar gedung -->
        <div class="col-md-3 mb-4 d-flex justify-content-center">
            <div class="card text-center p-3 mx-auto" style="width: 18rem;"> <!-- Kartu untuk setiap gedung -->
                <img src="img/<?= ($data[3]) ?>" class="card-img-top" alt="<?= ($data[0]) ?>"> <!-- Gambar gedung -->
                <h5 class="fw-bold mt-2"><?= ($data[0]) ?></h5> <!-- Nama gedung -->
                <p><?= ($data[1]) ?></p> <!-- Deskripsi gedung -->
                <p><strong>Rp <?= number_format($data[2], 0, ',', '.') ?></strong></p> <!-- Harga dalam format Rupiah -->
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Tombol Sewa -->
<div style="text-align: center;">
    <a href="transaksi.php?id=<?= $index ?>" class="btn btn-custom"> pesan Sekarang</a> <!-- Tombol sewa dengan link ke transaksi -->
</div>
<!-- Video Profil -->
<div class="container mt-4">
    <h3 class="text-center">Video Koleksi Kami - Gedung Ballroom dan foto </h3>
    <div class="d-flex align-items-center justify-content-center">
        <!-- Gambar di kiri -->
        <img src="img/ballrom.jpg" alt="Gedung Ballroom" width="50%" class="me-3">
        
        <!-- Video di kanan -->
        <video width="30%" controls>
            <source src="video/ballrom.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
    </div>
</div>

<!-- Tentang Kami -->
<<div class="container mt-5">
        <section id="tentang">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h2 class="card-title">Tentang Kami</h2>
                    <p class="card-text">Selamat datang di <strong>gedung  Kami</strong>, penyedia layanan rental terpercaya yang siap memenuhi kebutuhan transportasi Anda.</p>
                    <p class="card-text">Kami berlokasi di <strong>Jalan Flamboyan III</strong>, dengan berbagai pilihan kendaraan yang nyaman, terawat, dan siap digunakan untuk perjalanan bisnis, wisata, atau keperluan pribadi.</p>
                    <p class="card-text">Kami selalu mengutamakan kepuasan pelanggan dengan menyediakan layanan profesional, harga kompetitif, serta kemudahan dalam proses penyewaan.</p> <!-- Deskripsi tentang kami -->
                    <hr> <!-- Garis pemisah -->
                    <h5>Hubungi Kami</h5>
                    <p><strong>📍 Alamat:</strong> Jalan Flamboyan III</p>
                    <p><strong style="color: white;">📞 Telepon:</strong> <a href="tel:+62895383875089" style="color: white;">+62895383875089</a></p> 
                    <p><strong style="color: white;">📧 Email:</strong> <a href="mailto:gedungkami@gmail.com" style="color: white;">gedungkami@gmail.com</a></p>
                </div>
            </div>
        </section>
    </div>
<!-- Footer -->
<div class="footer text-center mt-4 text-white">
    &copy; M YUSUF ADIYAKSA <!-- Hak cipta -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Memuat Bootstrap JS -->
</body>
</html>


