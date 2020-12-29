<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
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
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						LOGIN ADMIN
					</span>
				</div>
				<?php
				if(isset($_GET['error'])==true){
					echo'</br>

					<h6 style="background-color:#f35381;"><p align="center" style="color:white">Maaf Silahkan masukan username dan password dengan benar</p></h6>';
				}
				?>
				
				<form class="login100-form validate-form" method="POST" action="proses_login_admin.php">
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Masukan username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Masukan password">
						<span class="focus-input100"></span>
                    </div>
					<div class="container-login100-form-btn p-b-30">
						<button class="login100-form-btn" type="submit" name="submit" onclick="validate();">
							Login
                        </button>
                    </div>       
                    <div class="flex-sb-m w-full p-b-0">
						<div class="contact100-form-checkbox">
                        <a href="index.php" class="txt1">
								<h2>Back to Home<h2>
                                </a>
						</div>

				  
					</div>
                </form>
			</div>
		</div>
	</div>
    <script>
        function validate(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username == null || username == ""){
                alert("please enter username");
                return false;
            }
            if (password == null || password == ""){
                alert("Please enter password");
                return false;
            }
        }
    </script>

</body>
</html>