<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'metik');


// Deklarasi Variables
$username 	 = "";
$errors   	 = array(); 


// Session user
function isLoggedIn() {
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// Session admin
function isAdmin() {
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


// Mengambil data berdasarkan id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}


function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}


// Memanggil function login() jika tombol login diclick
if (isset($_POST['login_btn'])) {
	login();
}


// LOGIN USER
function login(){
	global $db, $username, $errors;

	$username =  mysqli_real_escape_string($db, $_POST['username']);
	$password =  mysqli_real_escape_string($db, $_POST['password']);
	$query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
	$results = mysqli_query($db, $query);

	// Jika input kosong
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// jika tidak ada error
	if (count($errors) === 0) {

		if (mysqli_num_rows($results) > 0) { // user ditemukan
			// check apakah user memiliki role user / admin
			$logged_in_user 	 = mysqli_fetch_assoc($results);
			$logged_in_user_pass = $logged_in_user['password'];

			if( password_verify($password, $logged_in_user_pass) ) {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;

				// Cek Remember Me
				// if( isset($_POST['remember']) )  {
				// 	// buat cookie
				// 	setcookie('login', 'true', time() + 30);
				// }

				if ($logged_in_user['user_type'] == 'admin') {
	
					$_SESSION['user'] = $logged_in_user;
					header('Location: ../admin/admin.php');		  
				}else{
	
					$_SESSION['user'] = $logged_in_user;	
					header('Location: index.php');
				}
			}

		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}




// Riwayat Pembayaran
function riwayat() {
    global $db;
    $anggaran = mysqli_query($db, "SELECT * FROM anggaran");

    // mysqli_fetch_row()    -> Mengembalikan Nilai Numerik | Angka
    // mysqli_fetch_assoc()  -> Mengembalikan Array Associative | String
    // mysqli_fetch_array()  -> Mengembalikan 2 Nilai Yaitu Nilai Assoc dan Numerik | menampilkan datanya dobble
    // mysqli_fetch_object() -> Mengembalikan Nilai Object

    $row = mysqli_fetch_assoc($anggaran);
}


function query($riwayat) {
    global $db;
    $anggaran = mysqli_query($db, $riwayat);
    $rows = [];
    while ($row = mysqli_fetch_assoc($anggaran)) {
        $rows[] = $row;
    }
    return $rows;
}



// Menghitung total biaya
$query = "SELECT * FROM anggaran";
$result = mysqli_query($db, $query);

// Inisialisasi total biaya
$jmlTotalBiaya = 0;


// Loop melalui data riwayat pembayaran
while ($row = mysqli_fetch_assoc($result)) {

    // Hitung total biaya keseluruhan
    $jumBiaya = $row["harga"];
    $jmlTotalBiaya += $jumBiaya;

    // Format uang
    $format_jumBiaya = number_format($jmlTotalBiaya, 0, '.', '.');
}
// Menghitung total biaya End
// Riwayat Pembayaran End



// Tambah data
function tambah($data) {
    global $db;

    // htmlspecialchars supaya artibut html tidak jalan di input user
    $type 		 = htmlspecialchars($data["type"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $satuan      = htmlspecialchars($data["satuan"]);
    $jumlah      = htmlspecialchars($data["jumlah"]);
    $date        = htmlspecialchars($data["date"]);
    $harga       = $satuan * $jumlah;

	// Cek apakah admin upload gambar / tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$query = "INSERT INTO anggaran
				  VALUES ('', '$type', '$nama_barang', '$satuan', '$jumlah', '$harga', '$date', 'kwitansi.jpg')";
	
		mysqli_query($db, $query);
		return mysqli_affected_rows($db);
	} else {
		$gambar = upload();

		$query = "INSERT INTO anggaran
				  VALUES ('', '$type', '$nama_barang', '$satuan', '$jumlah', '$harga', '$date', '$gambar')";
	
		mysqli_query($db, $query);
		return mysqli_affected_rows($db);
	}

}
// Tambah data End


// Upload Gambar
function upload() {
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

	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

	return $namaFileBaru;
}
// Upload Gambar End


// Hapus data Anggaran
function hapus($id) {
    global $db;
    $query = "SELECT gambar FROM anggaran WHERE id = $id";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$gambarPath = '../img/' . $row['gambar'];

	// hapus data berdasarkan id
	$hapus = "DELETE FROM anggaran WHERE id = $id";
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
// Hapus data Anggaran End


// Edit data Anggaran
function editAnggaran($data) {
    global $db;

    // htmlspecialchars supaya artibut html tidak jalan di input user
	$id          = $data["id"];
	$type 		 = htmlspecialchars($data["type"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
    $satuan      = htmlspecialchars($data["satuan"]);
    $jumlah      = htmlspecialchars($data["jumlah"]);
    $date        = htmlspecialchars($data["date"]);
	$gambarLama  = htmlspecialchars($data["gambarLama"]);
	
    $harga       = $satuan * $jumlah;

	// Cek apakah user pilih gambar baru atau tidak || 4 = user tidak upload gambar baru
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

    $query = "UPDATE anggaran SET
				type        = '$type',
				nama_barang = '$nama_barang',
				satuan      = '$satuan',
				jumlah      = '$jumlah',
				harga       = '$harga',
                date        = '$date',
                gambar      = '$gambar'
			  WHERE id = $id
			";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
// Edit data Anggaran End