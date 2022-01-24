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
    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);
    $md5pass = md5($pass);

    if(empty($uname)){
        header("location:login.php?error=Username wajib diisi");
        exit();
    }else if(empty($pass)){
        header("location:login.php?error=Password wajib diisi");
        exit();
    }else{
        $sql = "SELECT * FROM tb_admin WHERE username='$uname' AND password='$md5pass'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username']===$uname && $row['password']===$md5pass){
                $_SESSION['username'] = $row['username'];
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->admin_id; 
                header("location:home.php");
                exit();
            }else{
                header("location:login.php?error=Salah username atau password!");
                exit();
            }
        }else{
            header("location:login.php?error=Salah username dan password");
        }
    }
}
?>