<?php

session_start();

if(isset($_SESSION['admin_id']) && isset($_SESSION['username'])){
    header("location:login.php");
}

include 'db_conn.php';

if(isset($_POST['username']) && isset($_POST['password'])){
    function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(empty($username)){
        header("location:daftar.php?error=Username wajib diisi");
        exit();
    }else if(empty($password)){
        header("location:daftar.php?error=Password wajib diisi");
        exit();
    }else{
        $query = "INSERT INTO tb_admin(username, password)
                        VALUES ('$username', '$password')";
        $sql = mysqli_query($conn, $query) or die("cek : " . $conn->error);;
        if ($sql) {
            echo "Berhasil simpan data anggota";
            exit;
          }
        else {
            echo "Gagal simpan data anggota";
            exit;
        }  
    }
}
?>