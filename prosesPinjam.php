<?php
    include "koneksi.php";

        $id_buku = $_POST['id_buku'];
        $id_user = $_POST['id_user'];
        $tanggalPinjam= date('Y-m-d');
        $tannggalKembali= $_POST['tanggalkembali'];

    if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$tannggalKembali)){
        $sqlInsert = "insert into peminjaman(id_user,id_buku,tanggal_pinjam,tanggal_kembali,denda,status) values ('$id_user','$id_buku','$tanggalPinjam','$tannggalKembali','','')";
        $res = mysqli_query($connect, $sqlInsert) or die(mysqli_close($connect));
        $result = mysqli_query($connect, "UPDATE buku SET status_buku='Sedang Dipinjam' WHERE id_buku=$id_buku");
        header("location:homepage.php");
    }else{
        header("location:homepage.php?error=1");
    }
    ?>