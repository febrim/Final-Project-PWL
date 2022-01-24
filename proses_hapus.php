<?php 
include 'db_conn.php';
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM tb_category WHERE category_id='$id'")or die(mysql_error());
 
header("location:data_kategori.php?pesan=hapus");
?>


?>