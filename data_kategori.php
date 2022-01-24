<?php
session_start();
include('db_conn.php');
if(isset($_SESSION['username'])){



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="data_kategori.css">
    <title>Data Kategori (ADMIN)</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="home.php">Fegali Fashion</a>
 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="home.php">Home </a>
            </li>
            
            <li class="nav-item dropdown active">
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
        <h3>Kategori</h3>
        <div class="box">
          <p><a href="tambah_kategori.php">Tambah Data</a></p> 
          <table border="1" cellspacing="0" class="table">
              <thead>
                  <tr>
                      <th width="60px">No</th>
                      <th>Kategori</th>
                      <th width="150px">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                  if(mysqli_num_rows($kategori) > 0){
                  while($row = mysqli_fetch_array($kategori)){

                ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['category_name']?></td>
                      <td>
                          <a href="edit_kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || 
                          <a href="proses_hapus.php?id=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                      </td>
                  </tr>
                  <?php }}else {?>
                    <tr>
                      <td>Tidak Ada Data</td>
                    </tr>
                    <?php  }?>
              </tbody>
          </table>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <small>Copyright &copy; 2021 - Fegali Fashion</small>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}else{
    header("location:login.php");
}

?>
