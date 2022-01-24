<?php

session_start();
include('db_conn.php');
if($_SESSION['username'] != true){
    echo 'location:login.php';
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <title>Tambah Produk</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="home.php"></a>
 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home </a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="data_kategori.php">Data Kategori</a>
                <a class="dropdown-item" href="data_produk.php">Data Produk</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="dropdown messages-menu">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pesan
              </a>
              <ul class="dropdown-menu">
                <li class="header">You Have 1 Messages</li>
                <li>
                  <ul class="menu">
                    <?php 
                    $pesan = mysqli_query($conn,"SELECT * FROM tb_pesan");
                    while ($p = mysqli_fetch_array($pesan)){
                    ?>
                    <li>
                      <a href="#">
                        <h4 class="kepada">
                        <?php echo $p['kepada'] ?>
                        </h4>
                        <p class="pesan"><?php echo $p['pesan']?></p>
                      </a>
                    </li>
                    <?php }?>
                  </ul>
                </li>
                <li ><a href="#" class="footm">See All Messages</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav mr-right">
          <li class="nav-item">
              <a class="nav-link" href="logout.php">Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <section class="section">
      <div class="container">
        <h3>Tambah Data Produk</h3>
        <div class="box">
          <form action="" method="POST" enctype="multipart/form-data">
            <select class="input-control" name="kategori" required>
                <option value="">Pilih</option>
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY  category_id DESC");
                while($r = mysqli_fetch_array($kategori)){
                ?>
                <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name']?></option>
                <?php }?>
            </select>
            <input type="text" name="nama" placeholder="Nama Produk" class="input-control"  required>
            <input type="text" name="harga" placeholder="Harga" class="input-control"  required>
            <input type="file" name="gambar" class="input-control"  required>
            <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br><br><br>
            <select class="input-control" name="status">
                <option value="">Pilih</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
            <input type="submit" name="submit" value="Submit" class="btn">
          </form>
          <?php 
          if(isset($_POST['submit'])){
            //print_r($_FILES['gambar']);
            //menampung input dari form
            $kategori = $_POST['kategori'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $status = $_POST['status'];
            //menampung data file yang diaplud
            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

            $type1 = explode('.',$filename);
            $type2 = $type1[1];

            $newname = 'produk'.time().'.'.$type2;

            echo $type2;

            // meanpung data format file yang diizinkan
            $tipe_diizinkan = array('jpg','jpeg','png');

            // validasi format file
            if(!in_array($type2, $tipe_diizinkan)){
                // jika format file tidak sesuai dengan yang ada didalam array tipe diizinkan
                echo '<script>alert("Format file tidak diizinkan")</script>';
            }else{
                // jika format file sesuai dengan yang ada didalam array tipe diizinkan
                move_uploaded_file($tmp_name, './produk/'.$newname);
            
                $insert = mysqli_query($conn,"INSERT INTO tb_product VALUES (
                            null,
                            '".$kategori."',
                            '".$nama."',
                            '".$harga."',
                            '".$deskripsi."',
                            '".$newname."',
                            '".$status."',
                            null
                                )");

                if($insert){
                    echo '<script>alert("Tambah data berhasil")</script>';
                    echo '<script>window.location="data_produk.php"<script></script>';
                }else{
                    echo 'Gagal'.mysqli_error($conn);
                }
            }
            // proses upload file sekaligus insert ke database
          }
          ?>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <small>Copyright &copy; 2021 - Fegali Fashion</small>
      </div>
    </footer>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
<?php


?>