<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap//css/style.css">


  <!-- Favicons -->
  <link href="bootstrap/logoa.png" rel="icon">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  

  <title>Bookly</title>
</head>

<body>
<?php
    include "koneksi.php";

    session_start();
    if ($_SESSION['status'] == 'admin') {
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
      <a class="nav-link" href="peminjaman.php">Peminjaman<span class="sr-only"></span></a>
            </li>
       
      <li class="nav-item">
      <a class="nav-link" href="member.php">Member<span class="sr-only"></span></a>
            </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"data-display="static" data-toggle="dropdown" aria-haspopup="true">
          Profile
        </a>
          <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
            <h6 class="dropdown-header">Your Account,<?php echo $_SESSION['username'] ?> </h6>
            <a class="dropdown-item" href="sessionLogout.php">Log Out</a>
          </div>
        </li>
      </ul>

      </div>
  </nav>


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>A ROOM WITHOUT BOOKS IS LIKE A BODY WITHOUT A SOUL</h3>
          <a class="cta-btn" href="tambahbuku.php">Tambah Buku</a>
        </div>

      </div>
    </section><!-- End Cta Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
  
     
  
          <div class="row">
            <?php
            include "koneksi.php";

            $query = "select * from buku";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" id="range">
              <div class="icon-box">
              <img src="img/<?php echo $row['foto'] ?>" width="150" style="margin-top:20px;">
              <h3 style="padding:10px;"><a href=""><?php echo $row['nama_buku'] ?></a></h3>
                <h4><?php echo $row['penulis'] ?></h4>
                <a href="deletebuku.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete Buku</a>
                  <a href="edit_buku.php?id_buku=<?php echo $row['id_buku']; ?>" ><button class="btn btn-warning">Edit Buku</button></a>
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
      header("Location: loginadmin.php");
    }
    ?>
</body>

</html>