<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bookly</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<script src="jquery-3.5.1.js"></script>
	<link href="bootstrap/logoa.png" rel="icon">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
    include "koneksi.php";

    session_start();

    if (isset($_SESSION['status']) == 'admin') {
        ?>
	<div class="limiter">
	<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Tambah Buku
					</span>
				</div>
				
				<form class="login100-form validate-form" method="POST" action="proses_tambah_buku.php" enctype="multipart/form-data">

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">nama buku</span>
						<input class="input100" type="text" name="namabuku" id="namabuku" placeholder="Masukan Nama Buku">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Penulis</span>
						<input class="input100" type="text" name="penulis" id="penulis" placeholder="Masukan Penulis">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">tentang buku</span>
						<input class="input100" type="text" name="tentang" id="tentang"  placeholder="Deskripsi Buku">
                        <span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Foto Buku</span>
						<input type="file" name="foto" id="foto">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn p-b-0">
					<button id="confirm" type="submit" name="submit">Hello</button>
     
					            </div>       
		
				</form>
				<button class="login100-form-btn" onclick="validate();" style="margin-left: 200px; margin-top: -80px">
							submit
                        </button>
                        <div class="flex-sb-m w-full p-b-0">
						<div class="contact100-form-checkbox">
                        <a href="homepage_admin.php" class="txt1">
								<h2>Back to List Book<h2>
                                </a>
						</div>            </br></br></br>
   
		</div>
	</div>
    <script>
        document.getElementById("confirm").style.visibility = "hidden";

        function validate(){
			var namabuku = document.getElementById("namabuku").value;
			var penulis = document.getElementById("penulis").value;
			var tentang = document.getElementById("tentang").value;


            if (namabuku == null || namabuku == ""){
                alert("input nama buku masih kosong");
				return false;
			}else if(penulis == null || penulis == ""){
                alert("input penulis masih kosong");
                return false;
            }else if(tentang == null || tentang == ""){
                alert("input tentang buku masih kosong");
                return false;
            }else{
                var klik = document.getElementById('confirm');
                klik.click();
            }
        }

        
    </script>
<?php
    }else {
        header("Location: loginadmin.php");
      }
    ?>
</body>
</html>