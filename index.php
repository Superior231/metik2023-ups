<?php

require 'functions.php';

$riwayat_pembayaran = mysqli_query($db, "SELECT * FROM riwayat_pembayaran");


// Tombol search ditekan
if (isset($_POST["search_btn"])) {
    $riwayat_pembayaran = search($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            </div>
        </nav>
        <!-- dropdown menu end -->
        <!-- Navbar End -->

        <!-- Content Banner -->
        <div class="content">
            <h1>"Mengasah Pemikiran Kritis melalui Inovasi dan Teknologi di Fakultas Teknik"</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis, voluptatem!</p>

            <div class="button">
                <a href="auth/login.php"><button type="button" style="background-color: #257cc4;">Get Started</button></a>
                <a href="https://www.upstegal.ac.id/" target="_blank"><button type="button"><span></span>Contact Us</button></a>
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

            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col col-lg-4 col-md-6 col-sm-12">
                    <div class="text-about">
                        <h3>The pain you feel today will be the <b style="color: #2196f3;">strength</b> you feel tomorrow!</h3>
                    </div>
                </div>
                <div class="col col-lg-8 col-md-6 col-sm-12 text-muted">
                    <p>Welcome to Superior Sport, your ultimate fitness destination. Discover expert guidance, informative articles, and interactive tools to help you achieve your fitness goals. <br><br>Join our community of enthusiasts and embrace a healthier lifestyle. Let us inspire and support you on your fitness journey, making every workout count towards a stronger, fitter you.</p>
                </div>
            </div>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#160e32" fill-opacity="1" d="M0,288L21.8,250.7C43.6,213,87,139,131,112C174.5,85,218,107,262,144C305.5,181,349,235,393,229.3C436.4,224,480,160,524,160C567.3,160,611,224,655,256C698.2,288,742,288,785,272C829.1,256,873,224,916,186.7C960,149,1004,107,1047,122.7C1090.9,139,1135,213,1178,213.3C1221.8,213,1265,139,1309,122.7C1352.7,107,1396,149,1418,170.7L1440,192L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
        </svg>
    </div>
    <!-- Banner 2 - About End -->


    <!-- Banner 3 - Gallery -->
    <div class="banner-3">
        <div class="container-gallery">
            <div class="label-gallery" id="gallery">
                <h2><b>Gallery</b></h2>
            </div>

            <div class="row row-cols-2 row-cols-lg-5 row-cols-md-3 row-sm-1 g-3">
                <div class="col">
                    <div class="card">
                        <img src="assets/gallery1.jpg" class="card-img" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/gallery1.jpg" class="card-img" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/gallery1.jpg" class="card-img" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/gallery1.jpg" class="card-img" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/gallery1.jpg" class="card-img" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/gallery1.jpg" class="card-img" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/gallery1.jpg" class="card-img" alt="...">
                    </div>
                </div>
            </div>

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

                <!-- Search -->
                <form action="" method="post" class="search mx-0 ms-auto d-flex">
                    <div class="input-group">
                        <input class="form-control" type="search" name="keyword" placeholder="Search" autocomplete="off">
                        <div class="search-button">
                            <button type="submit" name="search_btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <!-- Search End -->
            </div>
            <!-- Actions End -->

            <div class="table-responsive">
                <table class="table table-hover table-striped bg-light table-bordered table-sm">
                    <thead class="table-color">
                        <tr>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Jenis Belanja</th>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Type</th>
                            <th class="text-center" colspan="7">Rincian Biaya</th>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Jumlah Anggaran</th>
                            <th class="text-center" rowspan="4" style="vertical-align: middle;">Update at</th>
                            <th class="text-center" rowspan="4" style="vertical-align: middle;">Kwitansi</th>
                        </tr>
                        <tr>
                            <th class="text-center" colspan="2">Volume</th>
                            <th class="text-center" colspan="2">Frekuensi</th>
                            <th class="text-center">Perhitungan</th>
                            <th class="text-center">Sat</th>
                            <th class="text-center">Harga Satuan</th>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">2</td>
                            <td class="text-center">3</td>
                            <td class="text-center">4</td>
                            <td class="text-center">5</td>
                            <td class="text-center">6</td>
                            <td class="text-center">7<b style="color: red;">*</b></td>
                            <td class="text-center">8</td>
                            <td class="text-center">9</td>
                            <td class="text-center">10<b style="color: red;">**</b></td>
                        </tr>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">Vol</td>
                            <td class="text-center">Sat</td>
                            <td class="text-center">Vol</td>
                            <td class="text-center">Sat</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($riwayat_pembayaran as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $row["jenis_belanja"]; ?></td>
                                <td class="text-center"><?= $row["type"]; ?></td>
                                <td class="text-center"><?= $row["volume_vol"]; ?></td>
                                <td class="text-center"><?= $row["volume_sat"]; ?></td>
                                <td class="text-center"><?= $row["frekuensi_vol"]; ?></td>
                                <td class="text-center"><?= $row["frekuensi_sat"]; ?></td>
                                <td class="text-center"><?= $row["perhitungan"]; ?></td>
                                <td class="text-center"><?= $row["volume_sat"]; ?></td>
                                <td class="text-start">&nbsp; <?= "Rp. " . number_format($row["harga_satuan"], 0, ',', '.'); ?></td>
                                <td class="text-start">&nbsp; <?= "Rp. " . number_format($row["jml_anggaran"], 0, ',', '.'); ?></td>
                                <td class="text-center"><?= $row["date"]; ?></td>
                                <td class="text-center"><button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id']; ?>">Lihat</button></td>
                            </tr>

                            <!-- Modal Bukti Pembayaran -->
                            <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
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
                        <tr>
                            <td class="text-center" colspan="9"><b>Jumlah Total</b></td>
                            <td class="text-center">Rp. <?= $format_jumBiaya; ?></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <!-- Banner 4 - Anggaran End -->


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>