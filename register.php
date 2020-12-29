<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Bookly</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link href="bootstrap/logoa.png" rel="icon">
	<script src="jquery-3.5.1.js"></script>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
		if(isset($_GET['error'])==true){
			echo'</br>

			<h6 style="background-color:#f35381;"><p align="center" style="color:white">Maaf anda memasukan format email salah</p></h6>';
		}
		?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="proses_daftar_user.php">
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Masukan username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Masukan password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Nama</span>
						<input class="input100" type="text" name="nama" id="nama" placeholder="Masukan Nama">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Alamat</span>
						<input class="input100" type="text" name="alamat" id="alamat" placeholder="Masukan Alamat">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" id="email" placeholder="Masukan email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Nomor HP</span>
						<input class="input100" type="number" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP">
						<span class="focus-input100"></span>
					</div>

				

					<div class="container-login100-form-btn">
						<button id="confirm" type="submit" name="submit">Hello</button>
					</div>
				</form>
				<button class="login100-form-btn" onclick="validate();" style="margin-left: 200px; margin-top: -90px">
					Register
				</button>
				<div class="flex-sb-m w-full p-b-0">
				<div class="contact100-form-checkbox">
				<a href="peminjaman.php" class="txt1">
						<h2>Back to Home<h2>
						</a>
				</div>            </br></br></br>
			</div>
		</div>
	</div>
	<script>
        document.getElementById("confirm").style.visibility = "hidden";

        function validate(){
            var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var nama = document.getElementById("nama").value;
			var alamat = document.getElementById("alamat").value;
			var email = document.getElementById("email").value;
            var no_hp = document.getElementById("no_hp").value;
            if (username == null || username == ""){
                alert("input username masih kosong");
                return false;
            }else if(password == null || password == ""){
                alert("input password masih kosong");
                return false;
			}else if(nama == null || nama == ""){
                alert("input nama masih kosong");
                return false;
			}else if(alamat == null || alamat == ""){
                alert("input alamat masih kosong");
                return false;
			}else if(email == null || email == ""){
                alert("input email masih kosong");
                return false;
            }else if(no_hp == null || no_hp == ""){
                alert("input nomor hp masih kosong");
                return false;
			}else{
                var klik = document.getElementById('confirm');
                klik.click();
            }

        }
    </script>

</body>
</html>