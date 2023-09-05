<?php
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'metik');


function getContents() {
    global $db;
    $query = "SELECT * FROM judul";
    $result = mysqli_query($db, $query);

    // Content judul dan about
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getGallery() {
    global $db;
    $query = "SELECT * FROM gallery";
    $result = mysqli_query($db, $query);
    
    // Gallery
    $images = [];
    while ($image = mysqli_fetch_assoc($result)) {
        $images[] = $image;
    }
    return $images;
}




// Edit data Contents
function editJudul($data) {
    global $db;
    $id       = intval($data["id"]); // memaksa data menjadi integer
    $judul    = mysqli_real_escape_string($db, htmlspecialchars($data["judul"]));    // memaksa data menjadi string
    $subjudul = mysqli_real_escape_string($db, htmlspecialchars($data["subjudul"])); // memaksa data menjadi string

    $query = "UPDATE judul SET
                judul = '$judul',
                subjudul = '$subjudul'
              WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
// Edit data Contents End


// Edit data About Contents
function editAbout($data) {
    global $db;
    $id             = intval($data["id"]); // memaksa data menjadi integer
    $about_judul    = mysqli_real_escape_string($db, $data["about_judul"]);
    $about_subjudul = mysqli_real_escape_string($db, $data["about_subjudul"]);

    $query = "UPDATE judul SET
                about_judul = '$about_judul',
                about_subjudul = '$about_subjudul'
              WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
// Edit data About Contents End



// Tambah Gallery
function tambahGallery($data) {
    global $db;

    $keterangan = mysqli_real_escape_string($db, htmlspecialchars($data["keterangan"]));
    $date       = mysqli_real_escape_string($db, htmlspecialchars($data["date"]));

	// Cek apakah admin upload gambar / tidak
	if( $_FILES['gambar']['error'] === 4 ) {

        return false;

	} else {
		$gambar = upload();

		$query = "INSERT INTO gallery
				  VALUES ('', '$gambar', '$keterangan', '$date')";
	
		mysqli_query($db, $query);
		return mysqli_affected_rows($db);
	}

}
// Tambah Gallery End

// Upload Gambar
function uploadGallery() {
	$namaFile   = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error      = $_FILES['gambar']['error'];
	$tmpName    = $_FILES['gambar']['tmp_name'];

	// Cek ukuran file || max size 10 mb
	if( $ukuranFile > 10000000 ) {
		echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
	}

	// cek apakah yang diupload gambar atau bukan
	// explode = memecah sebuah string menjadi array || memcahnya menggunakan delimiter '.'
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar      = explode('.', $namaFile);
	$ekstensiGambar		 = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar ,$ekstensiGambarValid) ) {
		echo "<script>
                alert('Data gagal diubah!');
				document.location.href = ''
              </script>";
        return false;
	}



	// Lolos pengecekan gambar siap diupload
	// Buat nama file baru agar nama file tidak ada yang sama
	$namaFileBaru  = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, __DIR__ . '/../img/' . $namaFileBaru);

	return $namaFileBaru;
}
// Upload Gambar End

// Hapus Gallery
function hapusGallery($id) {
    global $db;
    $query = "SELECT gambar FROM gallery WHERE id = $id";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$gambarPath = __DIR__ . '/../img/' . $row['gambar'];

	// hapus data berdasarkan id
	$hapus = "DELETE FROM gallery WHERE id = $id";
    mysqli_query($db, $hapus);

	// Menghapus file fisik jika ada
    if (file_exists($gambarPath)) {
        unlink($gambarPath);
        echo "File berhasil dihapus.";
    } else {
        echo "File tidak ditemukan.";
    }

    return mysqli_affected_rows($db);
}
// Hapus Gallery End

// Edit data Gallery
function editGallery($data) {
    global $db;
    $id         = intval($data["id"]); // memaksa data menjadi integer
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $keterangan = mysqli_real_escape_string($db, htmlspecialchars($data["keterangan"]));
    $date       = mysqli_real_escape_string($db, htmlspecialchars($data["date"]));

    // Cek apakah user pilih gambar baru atau tidak || 4 = user tidak upload gambar baru
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

    $query = "UPDATE gallery SET
                gambar     = '$gambar',
                keterangan = '$keterangan',
                date       = '$date'
              WHERE id = $id";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Edit data Gallery End