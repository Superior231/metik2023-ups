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


// Edit data Gallery
function editGallery($data) {
    global $db;
    $id         = intval($data["id"]); // memaksa data menjadi integer
    $gambar     = mysqli_real_escape_string($db, htmlspecialchars($data["gambar"]));
    $keterangan = mysqli_real_escape_string($db, htmlspecialchars($data["keterangan"]));
    $date       = mysqli_real_escape_string($db, htmlspecialchars($data["date"]));

    $query = "UPDATE gallery SET
                gambar     = '$gambar',
                keterangan = '$keterangan',
                date       = '$date'
              WHERE id = $id";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Edit data Gallery End

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