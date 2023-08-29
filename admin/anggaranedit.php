<?php

require '../functions.php';

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../auth/login.php');
}


// Ambil data URL
$id = $_GET["id"];

// query data user berdasarkan id
$editDataPembayaran = query("SELECT * FROM riwayat_pembayaran WHERE id = $id")[0];


// Cek apakah tombol submit udah ditekan atau belum
if (isset($_POST["edit_btn"])) {


    // Cek apakah data berhasil diubah atau tidak
    if (edit($_POST) > 0) {
        echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = 'admin.php#anggaran'
          </script>
      ";
    } else {
        echo "
          <script>
              alert('Data gagal diubah!');
              document.location.href = 'admin.php#anggaran'
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
    <link rel="stylesheet" href="style.css">
    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body>

    <div class="wrapper">
        <div class="container">
            <div class="card my-4">
                <div class="card-body">
                    <h2 class="card-title">Edit data</h2>

                    <!-- form registrasi bs5 -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $editDataPembayaran["id"]; ?>">
                        <label for="type" class="form-label">Type</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-venus-mars icon"></i></span>
                            <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                <option selected value="<?= $editDataPembayaran["type"] ?>">Select type</option>
                                <option value="Acara">Acara</option>
                                <option value="Konsumsi">Konsumsi</option>
                                <option value="Perkap">Perkap</option>
                                <option value="Lain - lain">Lain - lain</option>
                            </select>
                        </div>


                        <label for="jenis_belanja" class="form-label mt-2">Nama Belanja</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-cart-shopping"></i></span>
                            <input type="text" name="jenis_belanja" id="jenis_belanja" class="form-control" placeholder="Nama belanja" aria-label="jenis_belanja" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $editDataPembayaran["jenis_belanja"]; ?>" required>
                        </div>

                        <label for="harga_satuan" class="form-label mt-2">Harga Satuan</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-cart-shopping"></i></span>
                            <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" placeholder="Rp. " aria-label="harga_satuan" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $editDataPembayaran["harga_satuan"]; ?>" required>
                        </div>

                        <label for="volume_vol" class="mt-2">Volume</label>
                        <div class="input-group flex">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list-ol"></i></span>
                            <input type="text" name="volume_vol" id="volume_vol" class="form-control me-2" placeholder="Vol : 1, 2, 3,..." aria-label="volume_vol" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $editDataPembayaran["volume_vol"]; ?>" required>

                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-scroll"></i></span>
                            <input type="text" name="volume_sat" id="volume_sat" class="form-control" placeholder="Satuan : Lembar, Box, Buah" aria-label="volume_sat" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $editDataPembayaran["volume_sat"]; ?>" required>
                        </div>

                        <label for="frekuensi_vol" class="mt-2">Frekuensi</label>
                        <div class="input-group flex">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list-ol"></i></span>
                            <input type="text" name="frekuensi_vol" id="frekuensi_vol" class="form-control me-2" placeholder="Vol : 1, 2, 3,..." aria-label="frekuensi_vol" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $editDataPembayaran["frekuensi_vol"]; ?>" required>

                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-scroll"></i></span>
                            <input type="text" name="frekuensi_sat" id="frekuensi_sat" class="form-control" placeholder="Satuan : Kali, Kegiatan" aria-label="frekuensi_sat" aria-describedby="addon-wrapping" autocomplete="off" value="<?= $editDataPembayaran["frekuensi_sat"]; ?>" required>
                        </div>

                        <label for="date" class="mt-2">Date</label>
                        <div class="input-group">
                            <input type="date" name="date" id="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" value="<?= $editDataPembayaran["date"]; ?>" required>
                        </div>


                        <div class="d-flex mt-4 gap-2" style="justify-content: end;">
                            <button type="submit" name="edit_btn" class="btn btn-primary btn-edit">Ubah</button>
                            <a href="admin.php#anggaran"><button type="button" class="btn btn-secondary">Cancel</button></a>
                        </div>

                    </form>
                    <!-- form registrasi bs5 end -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>