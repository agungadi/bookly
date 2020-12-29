<?php

include("koneksi.php");

//including the database connection file

//getting id of the data from url
$id_buku = $_GET['id_buku'];

//deleting the row from table
$result = mysqli_query($connect, "DELETE FROM buku WHERE id_buku=$id_buku");

//redirecting to the display page (index.php in our case)
header("Location: homepage_admin.php");

?>