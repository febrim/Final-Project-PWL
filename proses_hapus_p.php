<?php 
include 'db_conn.php';


$id = $_GET['id'];

$produk = mysqli_query($conn,"SELECT product_image FROM tb_product WHERE product_id = '$id'");
$p = mysqli_fetch_object($produk);

unlink('./produk/'.$p->product_image);

mysqli_query($conn,"DELETE FROM tb_product WHERE product_id='$id'")or die(mysql_error());
 
header("location:data_produk.php?pesan=hapus");
?>


?>