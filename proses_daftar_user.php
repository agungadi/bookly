
    <?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];


    $sqlCheck = "SELECT * FROM user where username='$username' OR email='$email'";
    $runCheck = mysqli_query($connect, $sqlCheck);

    $check = mysqli_num_rows($runCheck);

    if ($check == TRUE) {
        header("Location: register.php");
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: register.php?error=1");
    }else {
        $query = "INSERT INTO `user` (`username`, `password`, `nama`, `alamat`, `email`, `no_hp`) VALUES ('$username', MD5('$password'), '$nama', '$alamat', '$email', '$no_hp')";
        $sql = mysqli_query($connect, $query);
        header("Location: login.php");
    }
        mysqli_close($connect);
        
    ?>
