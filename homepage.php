<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap//css/style.css">
  <link href="bootstrap/logoa.png" rel="icon">



  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  

  <title>Hello, world!</title>
</head>

<body>
<?php
    include "koneksi.php";

    session_start();
    $usernameLoginNow = $_SESSION['username'];
    if ($_SESSION['status'] == 'user_login') {
        $sqlGetId = "select * from user where username ='$usernameLoginNow'";

        $resultID = mysqli_query($connect, $sqlGetId);
        if (mysqli_num_rows($resultID) > 0) {
            while ($row = mysqli_fetch_array($resultID)) {
                ?>

  <nav class="navbar navbar-expand-lg navbar-default">
    <a class="navbar-brand" href="#">
    <img src="bootstrap/logoa.png" width="30" height="30" class="d-inline-block align-top" alt="">
    BookLy
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
        <section id="cta" class="cta">
      <div class="container">
    <div class="text-center">
          <h3>Today a reader tomorrow a leader</h3>
          <h3>CHOOSE YOUR BOOK</h3>
          <p>List Book</p>
        </div>
      </div>
        </section>
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
        <?php
				if(isset($_GET['error'])==true){
					echo'</br>

					<h6 style="background-color:#f35381;"><p align="center" style="color:white">Maaf anda memasukan format tanggal salah</p></h6>';
				}
				?>
				

          <div class="row">
            <?php
            include "koneksi.php";

            $query = "select * from buku";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch"  id="range">
              <div class="icon-box">
              <img src="img/<?php echo $row['foto'] ?>" width="150" style="margin-top:20px;">
              <h3 style="padding:10px;"><a href=""><?php echo $row['nama_buku'] ?></a></h3>
                <h4><?php echo $row['penulis'] ?></h4>
                <p class="btn btn-info"><?php echo $row['status_buku'] ?></p></br></br>
                <?php
                                                    if ($row['status_buku'] == "Tersedia") {
                                                        ?>
                                            <a href="pinjambuku.php?id_buku=<?php echo $row['id_buku']; ?>&username=<?php echo $_SESSION['username'] ?>"><button class="btn btn-success">Pinjam Buku</button></a>
                                        <?php
                                                    } else {
                                                        //do nothing
                                                    }
                                                    ?>
              </div>
            </div>
          <?php
                      }
                  } else {
                      echo "0 Result";
                  }
                  ?>



          </div>
        </div>
      </section><!-- End Services Section -->
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