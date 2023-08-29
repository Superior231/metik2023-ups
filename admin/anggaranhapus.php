<?php 

require '../functions.php';

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../auth/login.php');
}


$id = $_GET["id"];

if( hapus($id) > 0 ) {
    echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'admin.php#anggaran'
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'admin.php#anggaran'
            </script>
        ";
}

?>