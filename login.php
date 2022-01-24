<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="nlogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="\pwl_project\fontawesome-free-5.15.4-web\css\all.css">
    <title>Halaman Login (Admin)</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php"><i class="fas fa-angle-left" id="back"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <div class="container " id="container">
        <form action ="cek_login.php" method="post">
            <h2 style="text-align:center; ">Halaman Login Admin</h2>
            <span>
                <?php
                    if(isset($_GET['error'])){
                        echo "<p class ='error' style ='background: #E57676; color; #FFFFFF;'>";
                        echo $_GET['error'];
                    }
                ?>
            </span>

            <div class="mb-4">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>

            <button type="submit" name="login" id="login" class="btn btn-primary" value="login">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>