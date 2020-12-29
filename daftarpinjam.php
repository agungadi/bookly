<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap//css/style.css">



  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  

  <title>Hello, world!</title>
</head>

<body style="background-color :#e6edfc;">
<?php
    include "koneksi.php";

    session_start();
    $usernameLoginNow = $_SESSION['username'];
    if (isset($_SESSION['status']) == 'user_login') {
      $sqlGetId = "select * from user where username ='$usernameLoginNow'";
      $resultID = mysqli_query($connect, $sqlGetId);
      if (mysqli_num_rows($resultID) > 0) {
          while ($row = mysqli_fetch_array($resultID)) {
              ?>
 

  <nav class="navbar navbar-expand-lg navbar-default">
    <a class="navbar-brand" href="#">
    <img src="bootstrap/logoa.png" width="30" height="30" class="d-inline-block align-top" alt="">
    gung Adi
  </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
      <ul class="navbar-nav my-2 my-lg-0">
<li class="nav-item active">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="daftarpinjam.php?id_user=<?php echo $row['id_user'] ?>">Daftar Pinjam <span class="sr-only"></span></a>
            </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"data-display="static" data-toggle="dropdown" aria-haspopup="true">
          Profile
        </a>
          <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
            <h6 class="dropdown-header">Your Account,<?php echo $_SESSION['username'] ?> </h6>
            <a class="dropdown-item" href="edit_user.php?id_user=<?php echo $row['id_user'] ?>">Change Password</a>
            <a class="dropdown-item" href="sessionLogout.php">Log Out</a>
          </div>
        </li>
      </ul>

      </div>
  </nav>


  <?php
                
            }
          }
            ?>

    <!-- ======= Services Section ======= -->


    <section id="services" class="services section-bg">
    <div class="container">

        <div class="row">

        
        <div class="col-md-12">

            <div  class="content-box-large">
   
                
        <table class="table">
        <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Nama Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Status Buku</th>
                </thead>
                <?php
    include "koneksi.php";
    $id_user = $_GET['id_user'];
    $query = "select * from peminjaman where id_user ='$id_user'";
    $result = mysqli_query($connect, $query);
    $check = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) { ?>

    
                <?php 
	    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	    while($res = mysqli_fetch_array($result)) { 	
        $res['id_peminjaman'];
        echo "<tr>";
        echo "<td>".$res['id_peminjaman']."</td>";
		echo "<td>".$res['id_buku']."</td>";
        echo "<td>".$res['tanggal_pinjam']."</td>";
        echo "<td>".$res['tanggal_kembali']."</td>";
		echo "<td>".$res['denda']."</td>";
        echo "<td>".$res['status']."</td>";
        }
	    ?>
            </tr>
           
            <tbody>

            </tbody>
        </table>
    </div>
    </section><!-- End Services Section -->

        </div>
      <?php
    }
    ?>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <?php
    } else {
      header("Location: login.php");
    }
    ?>
</body>

</html>