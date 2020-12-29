<?php

include("koneksi.php");

//including the database connection file

//getting id of the data from url
$id_user = $_GET['id_user'];

//deleting the row from table
$result = mysqli_query($connect, "DELETE FROM user WHERE id_user=$id_user");

//redirecting to the display page (index.php in our case)
header("Location: member.php");

?>