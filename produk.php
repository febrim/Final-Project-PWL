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
    <title>Produk Fegali Fashion</title>
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
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="produk.php">Produk</a>
            </li>
            <li class="nav-item">
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
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari">
        </div>
    </div>

    <!-- Product-->
    <div class="section">
        <div class="container">
        <h3>Produk</h3>    
            <div class="box">
                <?php 
                    if($_GET['search'] != '' || $_GET ['kat'] != ''){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET ['kat']."%' ";
                    }
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                    
                ?>
                <a href="detail_produk.php?id=<?php  echo $p['product_id']?>">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image']?> ">
                        <p class="nama"><?php echo substr($p['product_name'], 0, 25)?></p>
                        <p class="harga">Rp. <?php echo number_format($p['product_price'])?></p>
                    </div>
                </a>
                <?php }}else{?>
                    <p>Produk tidak ada</p>
                <?php  }?>
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
