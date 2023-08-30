<?php
// Cek Cookie
// if( isset($_COOKIE['login']) ) {
//   if( $_COOKIE['login'] == 'true' ) {
//     $_SESSION['login'] = true;
//   }
// }

require '../functions.php';

if( isset($_POST["login_btn"]) ) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");


  $error = true;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login | METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body>

    <div class="wrapper pt-5 text-light">
        <div class="container mt-5 mb-5">
            <div class="card login-form">
                <a href="../index.php"><img src="../assets/logo.png" alt="logo metik 2023" style="width: 100px;" class="mx-auto mb-3" id="logo-login"></a>
                <div class="card-body">
                    <!-- Kalo login Method harus Post -->
                    <form action="login.php" method="post">
                        <label for="username" class="form-label">Username</label>
                        <div class="content mb-4">
                            <div class="pass-logo">
                                <i class='bx bx-user'></i>
                            </div>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="addon-wrapping" placeholder="Enter Username" autocomplete="off" required>
                        </div>

                        <label for="password" class="form-label">Password</label>
                        <div class="content mb-2">
                            <div class="pass-logo">
                                <i class='bx bx-lock-alt'></i>
                            </div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" autocomplete="off" required>
                            <div class="pass-logo-pass" style="background-color: transparent;">
                                <button class="showPass"><i class="fa-regular fa-eye-slash"></i></button>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="keterangan">
                            <?php if (isset($error)) : ?>
                                <p style="color: red; font-style: italic; font-size: 13px;">Username atau password salah!</p>
                            <?php endif; ?>
                        </div>
                        <!-- Keterangan End -->

                        <div class="d-flex justify-content-between">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            
                            <div>
                                <a href="" class="link">Forgot Password?</a>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary btn-login" name="login_btn">Login</button>
                        </div>

                        <div class="back mt-3">
                            <a href="../index.php" class="link text-light" style="text-decoration: none;"><i class='bx bx-arrow-back'></i>&nbsp; Back</a>
                        </div>

                    </form>
                    <!-- form login bs5 end -->

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="login.js"></script>


</body>

</html>