<?php

require 'functions.php';

$anggaran = mysqli_query($db, "SELECT * FROM anggaran");
$isi_contents = mysqli_query($db, "SELECT * FROM judul");
$gallery = mysqli_query($db, "SELECT * FROM gallery");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style5.css">
    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <a class="navbar-brand" href=""><img src="assets/logo.png" alt="metik_2023" style="width: 100px;"></a>
                <ul class="links">
                    <li><a href="#home" class="active text-light">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#anggaran">Anggaran</a></li>
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
                <li><a href="auth/login.php" class="button"><button type="button" class="btn btn-primary">Get Started</button></a></li>
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

            <div class="button">
                <a href="auth/login.php"><button type="button" style="background-color: #257cc4;">Get Started</button></a>
                <a href="index.php#contacts"><button type="button"><span></span>Contact Us</button></a>
            </div>
        </div>
        <!-- Content Banner End -->
    </div>
    <!-- Banner 1 - Landing Page End -->


    <!-- Banner 2 - About -->
    <div class="banner-2">
        <div class="container-about">
            <div class="label-about" id="about">
                <h2><b>About</b></h2>
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
            </div>

            <?php $i = 1; ?>
            <div class="row row-cols-2 row-cols-lg-5 row-cols-md-3 row-sm-1 g-3">
                <?php foreach ($gallery as $row) : ?>
                    <div class="col">
                        <div class="card">
                            <div class="gambar">
                                <img src="img/<?php echo $row["gambar"]; ?>" alt="gallery image" class="card-img">
                            </div>
                            <div class="keterangan">
                                <p><?= $row["keterangan"]; ?></p>
                                <p><?= $row["date"]; ?></p>
                                <a href="download_image.php?filename=<?php echo $row['gambar']; ?>"><button class="btn btn-primary"><i class='bx bxs-download'></i></button></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php $i++; ?>

        </div>
    </div>
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
                <a href=""><button type="button" style="background: transparent; border-color: transparent;"><i class="fa-solid fa-rotate-right fa-2x text-light"></i></button></a>
            </div>
            <!-- Actions End -->

            <!-- Table -->
            <div class="table-responsive text-light">
                <table id="myDataTable" class="table table-hover table-striped table-bordered table-sm" style="width:100%">
                    <thead class="table-info" >
                        <tr>
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
                                            <img class="img mx-auto d-block" src="img/<?php echo $row["gambar"]; ?>" style="width: 60%;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="download_image.php?filename=<?php echo $row['gambar']; ?>" class="btn btn-primary">Download</a>
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
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Table End -->


            <!-- Download file pdf Anggaran -->
            <div class="download-action mt-4">
                <a href="cetak_anggaran.php" target="_blank"><button class="btn btn-primary" style="border-radius: 0px;">Download pdf</button></a>
                <a href="export_to_excel.php" target="_blank"><button class="btn btn-success" style="border-radius: 0px;">Export to Excel</button></a>
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
                        <img src="assets/logo.png" alt="logo_metik_2023" style="width: 150px;">
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
                        <li><a href="https://www.instagram.com/ftikpancasakti/" target="_blank"><i class="fa-brands fa-instagram me-2"></i>ftikpancasakti</a></li>
                        <li><a href="https://www.instagram.com/bemftikupstegal/" target="_blank"><i class="fa-brands fa-instagram me-2"></i>bemftikupstegal</a></li>
                        <li><a href="#">Help / FAQ</a></li>
                    </ul>
                </div>

                <div class="col col-lg-12 col-md-12 col-sm-12 mt-2">
                    <div class="social-media ms-1">
                        <img class="me-2" src="assets/logo_informatika.jpg" alt="logo_informatika" style="width: 40px;">
                        <img class="me-2" src="assets/logo_informatika.jpg" alt="logo_sistem_informasi" style="width: 40px;">
                        <img class="me-2" src="assets/logo_informatika.jpg" alt="logo_mesin" style="width: 40px;">
                        <img class="me-2" src="assets/logo_informatika.jpg" alt="logo_industri" style="width: 40px;">
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



    <script src="script.js"></script>
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