<?php 
session_start();
$_SESSION = [];
unset($_SESSION['user']);
session_unset();
session_destroy();

// setcookie('user', '', time() - 3600);
// setcookie('key', '', time() - 3600);

// setcookie('admin', '', time() - 3600);
// setcookie('key', '', time() - 3600);


header("Location: login.php");
exit();


// if (isset($_GET['logout'])) {
// 	session_destroy();
//     session_unset();
//     $_SESSION = [];
// 	unset($_SESSION['user']);
// 	header("location: index.php");
// }

?>