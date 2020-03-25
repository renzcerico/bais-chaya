<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaisChayaAcademy</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  p-4 fixed-top">
        <a class="h3 text-white font-weight-bold text-spacing-3">BAIS<span class="text-info">CHAYA</span> ACADEMY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container-fluid login mt-5 pt-5 ">
        <form class="form-signin pt-5 mt-5" action="../php/admin_login.php" method="POST">
            <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal mt-5">Login</h1>
            </div>

            <div class="form-label-group">
            <input type="text" id="email_address" class="form-control" name="email_address" placeholder="Email" required autofocus>
            <label for="email_address">Email</label>
            </div>

            <div class="form-label-group">
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
            <label for="password">Password</label>
            </div>

            <div class="justify-content-end d-flex mb-3">
            <label>
                <a href="#">Forgot Password?</a>
            </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block font-weight-bold" type="submit">Sign in</button>

            <?php
            if (isset($_SESSION['login'])) {
                if ($_SESSION['login'] == false) {
                    ?>
                    <br>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Invalid,</strong> username or password!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php
                    }
                }
            ?>
        </form>     

        <?php
            include '../footer.php';
        ?>
    </div>
    <script src="../bootstrap/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="../bootstrap/popper.min.js" crossorigin="anonymous"></script>
    <script src="../bootstrap/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>