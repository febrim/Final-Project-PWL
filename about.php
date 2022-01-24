<?php
error_reporting(0);
session_start();
include('db_conn.php');

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>About Fegali Fashion</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" id="brand"href="index.php"><img src="./foto/logo.png"></a>
 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>
          <ul class="navbar-nav mr-right">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.php">Produk</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
          </ul>  
        </div>
      </div>
    </nav>

    <!-- Search Button-->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari">
        </div>
    </div>


    <!-- About -->
    <div class="about">
        <div class="container">
            <div class="card" style="width: 30rem; margin:10% 32%; text-align:center; position:relative;">
              <img src="./foto/logo1.png" class="card-img-top" id="logo">
              <div class="card-body">
              <h5 class="card-title">Fegali Fashion</h5>
              <p>Fegali Fashion adalah perusahaan yang didirikan pada tahun 2021 oleh 3 orang yaitu Muhammad Kholif Arrahman,
              Briga Darmawan dan Ananda Febriansyah Mardean. Kami membuat toko online ini agar mempermudah konsumen untuk 
              memesan barang / item.
              </p>
              </div>
            </div>
            <div class="card" style="width: 30rem; text-align:center; position:relative;">
              <img src="./foto/2799.jpeg" class="card-img-top" id="foto">
              <div class="card-body">
              <h5 class="card-title">Muhammad Kholif Arrahman </h5>
              <p>19.11.2799</p>
              </div>
            </div>
            <div class="card" style="width: 30rem; margin:10% 58%; text-align:center; position:relative;">
              <img src="./foto/2831.jpg" class="card-img-top" id="foto" style="width: 30rem">
              <div class="card-body">
              <h5 class="card-title">Briga Darmawan</h5>
              <p>19.11.2831</p>
              </div>
            </div>
            <div class="card" style="width: 30rem; margin-bottom:20%; text-align:center; position:relative;">
              <img src="./foto/2856.jpeg" class="card-img-top" id="foto" style="width: 30rem">
              <div class="card-body">
              <h5 class="card-title">Ananda Febriansyah Mardean </h5>
              <p>19.11.2856</p>
              </div>
            </div>
        </div>
    </div>
    <footer>
      <div class="container">
          <h4>Alamat</h4>
          <p>Jalan Sukamakmur No.21 Condongcatur, Depok, Sleman </p>

          <h4>Email</h4>
          <p>fegalifashion@gmail.com</p>

          <h4>No. HP</h4>
          <p>081328657431</p>
        <small>Copyright &copy; by Us 2021 - Fegali Fashion</small>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
