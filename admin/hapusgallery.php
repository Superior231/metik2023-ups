<?php 

require '../functions.php';
require 'functions_contents.php';

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../auth/login.php');
}


$id = $_GET["id"];

if( hapusGallery($id) > 0 ) {
    echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'admin.php#gallery'
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'admin.php#gallery'
            </script>
        ";
}

?>