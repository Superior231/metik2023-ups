<?php
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'metik');


function getContents() {
    global $db;
    $query = "SELECT * FROM judul";
    $result = mysqli_query($db, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
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