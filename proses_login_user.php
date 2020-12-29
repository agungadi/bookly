<?php

    include "koneksi.php";

    $username = $_POST['username'];
    $password =md5($_POST['password']);

    $query="SELECT * FROM user WHERE username='$username' and password='$password'";
    $result=mysqli_query($connect, $query);
    $cek = mysqli_num_rows($result);

    if($cek){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'user_login';
        header("Location: homepage.php");
    
    }else{
        header("Location: login.php?error=1");

        echo mysqli_error($connect);
    }
?>