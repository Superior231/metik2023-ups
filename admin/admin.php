<?php

require 'functions_contents.php';
require '../functions.php';

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../auth/login.php');
}


$anggaran = mysqli_query($db, "SELECT * FROM anggaran");
$isi_contents = mysqli_query($db, "SELECT * FROM judul");
$gallery = mysqli_query($db, "SELECT * FROM gallery");


// Cek apakah tombol submit udah ditekan atau belum
if (isset($_POST["tambah_btn"])) {
    // Cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'admin.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'admin.php'
            </script>
        ";
    }
}


// Cek apakah tombol submit udah ditekan atau belum
if (isset($_POST["tambahGallery_btn"])) {
    // Cek apakah data berhasil ditambahkan atau tidak
    if (tambahGallery($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'admin.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'admin.php'
            </script>
        ";
    }
}


// Cek apakah tombol edit sudah ditekan atau belum
if (isset($_POST["edit_anggaran_btn"])) {
    // Cek apakah data berhasil diubah atau tidak
    if (editAnggaran($_POST) > 0) {
        echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = ''
          </script>
      ";
    } else {
        echo "
          <script>
              alert('Data gagal diubah!');
              document.location.href = ''
          </script>
      ";
    }
}


// Cek apakah tombol edit judul sudah ditekan atau belum
if (isset($_POST["edit_judul_btn"])) {
    // Cek apakah data berhasil diubah atau tidak
    if (editJudul($_POST) > 0) {
        echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = ''
          </script>
      ";
    } else {
        echo "
          <script>
              alert('Data gagal diubah!');
              document.location.href = ''
          </script>
      ";
    }
}


// Cek apakah tombol edit about sudah ditekan atau belum
if (isset($_POST["edit_about_btn"])) {
    // Cek apakah data berhasil diubah atau tidak
    if (editAbout($_POST) > 0) {
        echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = ''
          </script>
      ";
    } else {
        echo "
          <script>
              alert('Data gagal diubah!');
              document.location.href = ''
          </script>
      ";
    }
}


// Cek apakah tombol edit about sudah ditekan atau belum
if (isset($_POST["edit_gallery_btn"])) {
    // Cek apakah data berhasil diubah atau tidak
    if (editGallery($_POST) > 0) {
        echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = ''
          </script>
      ";
    } else {
        echo "
          <script>
              alert('Data gagal diubah!');
              document.location.href = ''
          </script>
      ";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style5.css">
    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <title>METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body>

    <!-- Banner 1 - Landing Page -->
    <div class="banner" id="home">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="admin.php"><img src="../assets/logo.png" alt="metik_2023" style="width: 100px;"></a>
                <ul class="links">
                    <li><a href="#home" class="active text-light">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#anggaran">Anggaran</a></li>
                    <li><a href="../auth/logout.php"><button type="button" class="btn btn-danger">Logout</button></a></li>
                </ul>
                <!-- hamburger menu -->
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars-staggered" style="color: #fff;"></i>
                </div>
                <!-- hamburger menu rnd -->
            </div>
        </nav>
        <!-- dropdown menu -->
        <nav class="navbar_2">
            <div class="dropdown_menu">
                <li><a href="#home" class="active text-light">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#anggaran">Anggaran</a></li>
                <li><a href="../auth/logout.php" class="button"><button type="button" class="btn btn-danger">Logout</button></a></li>
            </div>
        </nav>
        <!-- dropdown menu end -->
        <!-- Navbar End -->

        <!-- Content Banner -->
        <div class="content">
            <?php foreach ($isi_contents as $row) : ?>
                <h1 id="editable-judul"><?= $row['judul']; ?></h1>
                <p id="editable-subjudul"><?= $row['subjudul']; ?></p>
            <?php endforeach; ?>


            <?php if (isset($_SESSION['user'])) : ?>
                <div class="button">
                    <a href=""><button type="button" style="background-color: #257cc4;">Hi, <?= $_SESSION['user']['username']; ?>!</button></a>
                    <a href="admin.php#contacts"><button type="button"><span></span>Contact Us</button></a>
                </div>
            <?php endif; ?>
        </div>

        <div class="edit d-flex">
            <div class="container">
                <button class="btn btn-secondary" id="edit-judul-btn" data-bs-toggle="modal" data-bs-target="#editJudulModal<?= $row['id']; ?>"><i class="fa-solid fa-pencil my-auto">&nbsp;</i>Edit</button>
            </div>
        </div>
        <!-- Content Banner End -->
    </div>
    <!-- Banner 1 - Landing Page End -->


    <!-- Modal Edit Judul -->
    <?php foreach ($isi_contents as $row) : ?>
        <form action="admin.php" method="post">
            <div class="modal fade" id="editJudulModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <label for="judul" class="mt-2">Judul</label>
                            <div class="input-group flex-nowrap">
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" aria-label="judul" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $row['judul']; ?>">
                            </div>

                            <label for="subjudul" class="mt-2">Subjudul</label>
                            <div class="input-group flex-nowrap">
                                <textarea name="subjudul" id="subjudul" cols="60" rows="10"><?= $row['subjudul']; ?></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button onclick="editJudul()" type="submit" id="edit_judul_btn" name="edit_judul_btn" class="btn btn-primary edit_judul_btn">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
    <!-- Modal Edit Judul End -->

    <!-- Modal Edit About -->
    <?php foreach ($isi_contents as $row) : ?>
        <form action="admin.php" method="post">
            <div class="modal fade" id="editAboutModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <label for="about_judul" class="mt-2">About judul</label>
                            <div class="input-group flex-nowrap">
                                <textarea name="about_judul" id="about_judul" cols="60" rows="10"><?= $row['about_judul']; ?></textarea>
                            </div>

                            <label for="subjudul" class="mt-2">About subjudul</label>
                            <div class="input-group flex-nowrap">
                                <textarea name="about_subjudul" id="about_subjudul" cols="60" rows="10"><?= $row['about_subjudul']; ?></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button onclick="editAbout()" type="submit" id="edit_about_btn" name="edit_about_btn" class="btn btn-primary edit_about_btn">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
    <!-- Modal Edit About End -->


    <!-- Banner 2 - About -->
    <div class="banner-2">
        <div class="container-about">
            <div class="label-about" id="about">
                <h2><b>About</b></h2>
            </div>

            <div class="edit d-flex">
                <div class="container">
                    <button class="btn btn-secondary" id="edit-judul-btn" data-bs-toggle="modal" data-bs-target="#editAboutModal<?= $row['id']; ?>"><i class="fa-solid fa-pencil my-auto">&nbsp;</i>Edit</button>
                </div>
            </div>

            <?php foreach ($isi_contents as $row) : ?>
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col col-lg-4 col-md-6 col-sm-12">
                        <div class="text-about">
                            <h3><?= $row['about_judul']; ?></h3>
                        </div>
                    </div>
                    <div class="col col-lg-8 col-md-6 col-sm-12">
                        <p class="about-subjudul"><?= $row['about_subjudul']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#160e32" fill-opacity="1" d="M0,288L21.8,250.7C43.6,213,87,139,131,112C174.5,85,218,107,262,144C305.5,181,349,235,393,229.3C436.4,224,480,160,524,160C567.3,160,611,224,655,256C698.2,288,742,288,785,272C829.1,256,873,224,916,186.7C960,149,1004,107,1047,122.7C1090.9,139,1135,213,1178,213.3C1221.8,213,1265,139,1309,122.7C1352.7,107,1396,149,1418,170.7L1440,192L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
        </svg>
    </div>
    <!-- Banner 2 - About End -->


    <!-- Banner 3 - Gallery -->
    <div class="banner-3">
        <div class="container-gallery">
            <div class="label-gallery d-flex gap-2" id="gallery">
                <h2><b>Gallery</b></h2>
                <div class="actions">
                    <button type="button" style="background: transparent; border-color: transparent;" data-bs-toggle="modal" data-bs-target="#tambahGalleryModal"><i class="fa-solid fa-square-plus fa-2x text-light"></i></button>
                </div>
            </div>

            <?php $i = 1; ?>
            <div class="row row-cols-2 row-cols-lg-5 row-cols-md-3 row-sm-1 g-3">
                <?php foreach ($gallery as $row) : ?>
                    <div class="col">
                        <div class="gallery-actions">
                            <button class="btn btn-primary" id="edit-gallery-btn" data-bs-toggle="modal" data-bs-target="#editGalleryModal<?= $row['id']; ?>">Edit</button>
                            <a href="hapusgallery.php?id=<?= $row["id"]; ?>" class="link" onclick="return confirm('Apakah Anda yakin untuk menghapusnya?');"><button class="btn btn-danger">Hapus</button></a>
                        </div>
                        <div class="card">
                            <div class="gambar">
                                <img src="../img/<?php echo $row["gambar"]; ?>" alt="gallery image" class="card-img">
                            </div>
                            <div class="keterangan">
                                <p><?= $row["keterangan"]; ?></p>
                                <p><?= $row["date"]; ?></p>
                                <a href="../download_image.php?filename=<?php echo $row['gambar']; ?>"><button class="btn btn-primary"><i class='bx bxs-download'></i></button></a>
                            </div>
                        </div>

                        <!-- Modal Edit Gallery -->
                        <form action="admin.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="editGalleryModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editGalleryModal<?= $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editGalleryModal<?= $row['id']; ?>">Edit gallery</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <input type="hidden" name="gambarLama" value="<?= $row['gambar']; ?>">

                                            <label for="gambar" class="">Image</label>
                                            <div class="input-group flex-nowrap">
                                                <input type="file" accept="image/*" name="gambar" class="form-control" id="gambar" aria-label="image" aria-describedby="addon-wrapping">
                                            </div>

                                            <label for="keterangan" class="mt-2">keterangan</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-circle-info"></i></span>
                                                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan" aria-label="keterangan" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $row['keterangan']; ?>">
                                            </div>

                                            <label for="date" class="mt-2">Date</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-clock"></i></span>
                                                <input type="date" name="date" id="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" value="<?= $row["date"]; ?>">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="edit_gallery_btn" name="edit_gallery_btn" class="btn btn-primary edit_gallery_btn">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Modal Edit Gallery End -->
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $i++; ?>

        </div>
    </div>

    <!-- Modal Tambah Gallery -->
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="tambahGalleryModal" tabindex="-1" aria-labelledby="tambahGalleryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahGalleryModalLabel">Tambah gallery</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <label for="gambar" class="">Image</label>
                        <div class="input-group flex-nowrap">
                            <input type="file" accept="image/*" name="gambar" class="form-control" id="gambar" aria-label="gambar" aria-describedby="addon-wrapping" required>
                        </div>

                        <label for="keterangan" class="mt-3">Keterangan</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-circle-info"></i></span>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan gambar..." aria-label="keterangan" aria-describedby="addon-wrapping" autocomplete="off">
                        </div>

                        <label for="date" class="mt-3">Date</label>
                        <div class="input-group">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-clock"></i></span>
                            <input type="date" name="date" id="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button onclick="tambahGallery()" type="submit" name="tambahGallery_btn" class="btn btn-primary btn-tambah-gallery">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal Tambah Gallery End -->
    <!-- Banner 3 - Gallery End -->


    <!-- Banner 4 - Anggaran -->
    <div class="banner-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#160e32" fill-opacity="1" d="M0,64L21.8,53.3C43.6,43,87,21,131,48C174.5,75,218,149,262,165.3C305.5,181,349,139,393,154.7C436.4,171,480,245,524,245.3C567.3,245,611,171,655,138.7C698.2,107,742,117,785,112C829.1,107,873,85,916,112C960,139,1004,213,1047,224C1090.9,235,1135,181,1178,144C1221.8,107,1265,85,1309,101.3C1352.7,117,1396,171,1418,197.3L1440,224L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path>
        </svg>
        <div class="container-anggaran">
            <div class="label-anggaran" id="anggaran">
                <h2><b>Anggaran</b></h2>
            </div>

            <!-- Actions -->
            <div class="actions mb-2">
                <button type="button" style="background: transparent; border-color: transparent;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus fa-2x text-light"></i></button>
                <a href="admin.php"><button type="button" style="background: transparent; border-color: transparent;"><i class="fa-solid fa-rotate-right fa-2x text-light"></i></button></a>
            </div>
            <!-- Actions End -->


            <!-- Modal Tambah Data Pembayaran -->
            <form action="admin.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <label for="gambar" class="">Bukti pembayaran</label>
                                <div class="input-group flex-nowrap">
                                    <input type="file" accept="image/*" name="gambar" class="form-control" id="gambar" aria-label="gambar" aria-describedby="addon-wrapping">
                                </div>

                                <label for="type" class="mt-2">Type</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-star icon"></i></span>
                                    <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                        <option selected>Select type</option>
                                        <option value="Sekertaris">Sekertaris</option>
                                        <option value="Acara">Acara</option>
                                        <option value="Konsumsi">Konsumsi</option>
                                        <option value="Perkap">Perkap</option>
                                        <option value="Lain - lain">Lain - lain</option>
                                    </select>
                                </div>

                                <label for="nama_barang" class="mt-2">Nama Barang</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-cart-shopping"></i></span>
                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" aria-label="nama_barang" aria-describedby="addon-wrapping" autocomplete="off" required>
                                </div>

                                <label for="satuan" class="mt-2">Harga Satuan</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-sack-dollar"></i></span>
                                    <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan" aria-label="satuan" aria-describedby="addon-wrapping" autocomplete="off" required>
                                </div>

                                <label for="jumlah" class="mt-2">Jumlah</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-open"></i></span>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" aria-label="jumlah" aria-describedby="addon-wrapping" autocomplete="off" required>
                                </div>

                                <label for="date" class="mt-2">Date</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-clock"></i></span>
                                    <input type="date" name="date" id="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" required>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button onclick="tambah()" type="submit" name="tambah_btn" class="btn btn-primary btn-tambah">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal Tambah Data Pembayaran End -->


            <!-- Table -->
            <div class="table-responsive text-light">
                <table id="myDataTable" class="table table-hover table-striped table-bordered table-sm" style="width:100%">
                    <thead class="table-colors">
                        <tr>
                            <th class="text-center">Actions</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Harga<span style="color: red;">*</span></th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Kwitansi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($anggaran as $row) : ?>
                            <tr>
                                <td class="text-center"><button style="border-color: transparent;" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>"><i class="fa fa-pencil text-primary"></i></button> |
                                    <a href="anggaranhapus.php?id=<?= $row["id"]; ?>" class="link" onclick="return confirm('Apakah Anda yakin untuk menghapusnya?');"><i class="fa-solid fa-trash text-danger"></i></a>
                                </td>
                                <td><?= $row["nama_barang"]; ?></td>
                                <td><?= $row["type"]; ?></td>
                                <td class="text-end"><?= "Rp. " . number_format($row["satuan"], 0, ',', '.'); ?></td>
                                <td class="text-end"><?= $row["jumlah"]; ?></td>
                                <td class="text-end"><?= "Rp. " . number_format($row["harga"], 0, ',', '.'); ?></td>
                                <td class="text-center"><?= $row["date"]; ?></td>
                                <td class="text-center"><button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#kwitansiModal<?php echo $row['id']; ?>">Lihat</button></td>
                            </tr>

                            <!-- Modal Bukti Pembayaran -->
                            <div class="modal fade" id="kwitansiModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content text-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img mx-auto d-block" src="../img/<?php echo $row["gambar"]; ?>" style="width: 60%;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="../download_image.php?filename=<?php echo $row['gambar']; ?>" class="btn btn-primary">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Bukti Pembayaran End -->
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-center">Jumlah</th>
                            <th colspan="1" class="text-end">Rp. <?= $format_jumBiaya; ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Modal Edit Data Pembayaran -->
            <?php foreach ($anggaran as $row) : ?>
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content text-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <input type="hidden" name="gambarLama" value="<?= $row['gambar']; ?>">

                                    <label for="gambar" class="">Bukti pembayaran</label>
                                    <div class="input-group flex-nowrap">
                                        <input type="file" accept="image/*" name="gambar" class="form-control" id="gambar" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>

                                    <label for="type" class="mt-2">Type</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-star icon"></i></span>
                                        <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                            <option selected value="<?= $row['type']; ?>">Select type</option>
                                            <option value="Sekertaris">Sekertaris</option>
                                            <option value="Acara">Acara</option>
                                            <option value="Konsumsi">Konsumsi</option>
                                            <option value="Perkap">Perkap</option>
                                            <option value="Lain - lain">Lain - lain</option>
                                        </select>
                                    </div>

                                    <label for="nama_barang" class="mt-2">Nama Barang</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-cart-shopping"></i></span>
                                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama belanja" aria-label="nama_barang" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $row["nama_barang"]; ?>">
                                    </div>

                                    <label for="satuan" class="mt-2">Satuan</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-sack-dollar"></i></span>
                                        <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Nama belanja" aria-label="satuan" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $row["satuan"]; ?>">
                                    </div>

                                    <label for="jumlah" class="mt-2">Jumlah</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-open"></i></span>
                                        <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Nama belanja" aria-label="jumlah" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $row["jumlah"]; ?>">
                                    </div>

                                    <label for="date" class="mt-2">Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-clock"></i></span>
                                        <input type="date" name="date" id="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" value="<?= $row["date"]; ?>">
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="edit_anggaran_btn" id="edit_anggaran_btn" class="btn btn-primary btn-edit">Edit data</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
            <!-- Modal Edit Data Pembayaran End -->
            <!-- Table End -->




            <!-- Download file pdf Anggaran -->
            <div class="download-action mt-4">
                <a href="../cetak_anggaran.php" target="_blank"><button class="btn btn-primary" style="border-radius: 0px;">Download pdf</button></a>
                <a href="../export_to_excel.php" target="_blank"><button class="btn btn-success" style="border-radius: 0px;">Export to Excel</button></a>
            </div>
            <!-- Download file pdf Anggaran End -->

            <!-- Information -->
            <div class="informations mt-5">
                <div class="container-information">
                    <h4 class="text-light mb-3">Keterangan</h4>
                    <table>
                        <tbody class="align-top">
                            <tr>
                                <td><span class="text-light align-top"><b style="color: red;">*</b></span></td>
                                <td>&nbsp;</td>
                                <td><span class="text-light">adalah tanda untuk menentukan hasil kali dari Satuan dengan Jumlah.</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Information End -->

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#050510" fill-opacity="1" d="M0,192L24,170.7C48,149,96,107,144,112C192,117,240,171,288,165.3C336,160,384,96,432,74.7C480,53,528,75,576,90.7C624,107,672,117,720,149.3C768,181,816,235,864,245.3C912,256,960,224,1008,197.3C1056,171,1104,149,1152,149.3C1200,149,1248,171,1296,186.7C1344,203,1392,213,1416,218.7L1440,224L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path>
        </svg>
    </div>
    <!-- Banner 4 - Anggaran End -->


    <!-- Footer -->
    <footer class="footer" id="contacts">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-12 py-4 px-2">
                <div class="col col-lg-6 col-md-7 col-sm-12">
                    <div class="layout-logo d-flex">
                        <img src="../assets/logo.png" alt="logo_metik_2023" style="width: 150px;">
                    </div>

                    <p class="text-footer text-light ms-1" style="opacity: 0.4;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam eligendi placeat odio voluptates rem asperiores voluptatibus enim est voluptatem impedit ipsam cupiditate labore sapiente corporis adipisci natus, nemo reiciendis doloremque sequi quos aspernatur! Porro, vel!</p>
                </div>

                <div class="col col-lg-2 col-md-1 col-sm-12"></div>

                <div class="col col-lg-2 col-md-4 col-sm-6">
                    <h4 style="width: min-content;">Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#anggaran">Anggaran</a></li>
                    </ul>
                </div>

                <div class="col col-lg-2 col-md-12 col-sm-6">
                    <h4 style="width: min-content;">Contacts</h4>
                    <ul>
                        <li><a href="#">Help / FAQ</a></li>
                    </ul>
                </div>

                <div class="col col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="social-media ms-1">
                        <img class="me-2" src="../assets/logo_informatika.jpg" alt="logo_informatika" style="width: 40px;">
                        <img class="me-2" src="../assets/logo_informatika.jpg" alt="logo_sistem_informasi" style="width: 40px;">
                        <img class="me-2" src="../assets/logo_informatika.jpg" alt="logo_mesin" style="width: 40px;">
                        <img class="me-2" src="../assets/logo_informatika.jpg" alt="logo_industri" style="width: 40px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <h6 class="px-2 pt-2 text-center">copyright &copy;2023 Metik.</h6>
            </div>
        </div>
    </footer>
    <!-- Footer End -->


    <!-- TOASTS -->
    <?php
    // Jika user berhasil login
    $loggedIn = true;

    if ($loggedIn && !isset($_SESSION['loginToastShown'])) {
        $_SESSION['loginToastShown'] = true;
        echo '
        <!-- Toast -->
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="loginToast" class="toast align-items-center bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
                <div class="d-flex">
                    <div class="toast-body">
                        Selamat datang! Anda berhasil login.
                    </div>
                    <button type="button" class="btn-close me-2 m-auto btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <!-- End Toast -->

        <script>
            // Menampilkan toast setelah halaman selesai dimuat
            window.onload = function() {
                var toast = new bootstrap.Toast(document.getElementById("loginToast"));
                toast.show();
            };
        </script>
        ';
    }
    ?>
    <!-- TOASTS END -->


    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable();
        });
    </script>


</body>

</html>