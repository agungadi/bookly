<?php

include("koneksi.php");

//including the database connection file

//getting id of the data from url
$id_peminjaman = $_GET['id_peminjaman'];

//deleting the row from table
$result = mysqli_query($connect, "DELETE FROM peminjaman WHERE id_peminjaman=$id_peminjaman");

//redirecting to the display page (index.php in our case)
header("Location: peminjaman.php");

?>