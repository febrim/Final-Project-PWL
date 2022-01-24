<?php

include "db_conn.php";

$query = mysqli_query($conn,"SELECT * FROM tb_product WHERE product_id ='".$_GET["id"]."'");
$hasil = mysqli_fetch_object($query);

if (isset($_POST["submit"])) {
    if(isset($_SESSION['shop_cart'])){

        $item_array_id = array_column($_SESSION['shop_cart'],'id');
        if(!in_array($_GET['product_id'], $item_array_id)){
            $count = count ($_SESSION['shop_cart']);
            $item_array = array(
                'id' => $_GET['product_id'],
                'nama' => $_GET['product_name'],
                'harga' => $_GET['product_price']
            );
            $_SESSION['shop_cart'][$count] = $item_array;
        }else{
            echo '<script>alert("Item Already Added")</script>';
        }
    }else{
        $item_array = array(
            'id' => $_GET['product_id'],
            'nama' => $_GET['product_name'],
            'harga' => $_GET['product_price']
        );
        $_SESSION['shop_cart'][0] = $item_array;
        
    }
}

header("location:cart.php");
?>