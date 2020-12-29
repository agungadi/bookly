<?php
// including the database connection file
include_once("koneksi.php");

if(isset($_POST['update']))
{	

	$id_user = mysqli_real_escape_string($connect, $_POST['id_user']);
    $passwordlama = mysqli_real_escape_string($connect, $_POST['passwordlama']);
	$passwordbaru= mysqli_real_escape_string($connect, $_POST['passwordbaru']);


    $password_lama = md5($passwordlama);
    $query = "SELECT * FROM user WHERE id_user='$id_user' AND password='$password_lama'";
    $result = mysqli_query($connect, $query);
    $hasil = mysqli_num_rows ($result);

	// checking empty fields
    if(!$hasil >=1){
        echo "<font color='red'>Password tidak sesuai</font><br/> <a href='homepage.php'> Back To Home <a>";
        return false;
    }else{	
		//updating the table
		$result = mysqli_query($connect, "UPDATE user SET password=MD5('$passwordbaru') WHERE id_user=$id_user");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: homepage.php");
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<script src="jquery-3.5.1.js"></script>
	

</script>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
    include "koneksi.php";

    session_start();

    if ($_SESSION['status'] == 'user_login') {
        ?>
	<div class="limiter">
	<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Change Password
					</span>
				</div>
				
				<form class="login100-form validate-form" method="POST" action="edit_user.php">
     
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Password Lama</span>
						<input class="input100" type="password" name="passwordlama" id="passwordlama"">
                        <span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Password Baru</span>
						<input class="input100" type="password" name="passwordbaru" id="passwordbaru">
                        <span class="focus-input100"></span>
                    </div>
                    <input type="hidden" name="id_user" value=<?php echo $_GET['id_user'];?>>
					<div class="container-login100-form-btn p-b-0">
						<button class="login100-form-btn" type="submit" name="update"">
							Submit
                        </button>
                    </div>       
					</div>
				</form>
			</div>
		</div>
	</div>

<?php
    }else {
        header("Location: loginadmin.php");
      }
    ?>
</body>
</html>