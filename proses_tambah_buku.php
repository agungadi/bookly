<?php
include 'koneksi.php';

    $namabuku = $_POST['namabuku'];
    $penulis = $_POST['penulis'];
    $tentang = $_POST['tentang'];
    $foto = $_FILES['foto']['name'];

if ($foto != ""){
    $extallow = array('png','jpeg','jpg');
    $dot = explode('.', $foto);
    $ext = strtolower(end($dot));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $name_random = rand(1,999);
    $nama_foto = $name_random.'-'.$foto;
        if(in_array($ext, $extallow) === true){
            move_uploaded_file($file_tmp, 'img/'.$nama_foto);
            $query = "INSERT INTO buku (id_buku,nama_buku,penulis,tentang_buku,status_buku,foto) VALUES (NULL,'$namabuku','$penulis','$tentang','Tersedia','$nama_foto')";
            $sql = mysqli_query($connect, $query);
            header( 'Location: homepage_admin.php' ) ;
        }else{
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpeg, jpg, atau png.');window.location='tambah_form.php';</script>";
        }
}