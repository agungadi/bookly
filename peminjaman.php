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

<body style="background-color :#e6edfc;">
<?php
    include "koneksi.php";

    session_start();
    if (isset($_SESSION['status']) == 'admin') {

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
        <a class="nav-link" href="homepage_admin.php">Home <span class="sr-only">(current)</span></a>
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
                <th>Peminjaman</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Status Buku</th>
                <th class="hidden-xs ">Action</th>
                <th></th>
                </thead>
            </tr>
            <?php
    include "koneksi.php";

    $query="SELECT * FROM peminjaman";
    $result=mysqli_query($connect, $query);
  

    if(mysqli_num_rows($result) > 0){
        while($res = mysqli_fetch_assoc($result)){
            $namaBuku = $res['id_buku'];
            $idUser = $res['id_user'];
            $queryBuku = "select * from buku where id_buku = '$namaBuku'";
            $resultBuku=mysqli_query($connect, $queryBuku);
            $queryUser = "select * from user where id_user = '$idUser'";
            $resultUser=mysqli_query($connect, $queryUser);
            while($resBuku = mysqli_fetch_assoc($resultBuku)){
                while($resUser = mysqli_fetch_assoc($resultUser)){

        echo "<tr>";
        echo "<td>".$res['id_peminjaman']."</td>";
        echo "<td>".$resBuku['nama_buku']."</td>";
        echo "<td>".$resUser['nama']."</td>";
        echo "<td>".$res['tanggal_pinjam']."</td>";
        echo "<td>".$res['tanggal_kembali']."</td>";
		echo "<td>".$res['denda']."</td>";
        echo "<td>".$res['status']."</td>";
        echo "<td><a href=\"editpeminjaman.php?id_peminjaman=$res[id_peminjaman]\" class=\"btn btn-info\">Edit</a></td>";
        echo "<td><a href=\"deletepeminjaman.php?id_peminjaman=$res[id_peminjaman]\" name=\"delpinjam\" class=\"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
        }
    }}
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