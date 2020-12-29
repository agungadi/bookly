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
<?php
            include "koneksi.php";
            $id_buku = $_GET['id_buku'];
            $username = $_GET['username'];
            $queryUser = "select * from user where username = '$username'";
            $query = "select * from buku where id_buku='$id_buku'";
            $resultUsername = mysqli_query($connect, $queryUser);
            $result = mysqli_query($connect, $query);
            ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            <form method="POST" enctype="multipart/form-data" action="prosesPinjam.php"">

            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                while ($rowUser = mysqli_fetch_array($resultUsername)) { ?>
                                <input type="hidden" name="id_buku" value="<?php echo $row['id_buku']; ?>" id="id_buku" maxlength="20" required>
                                <input type="hidden" name="id_user" value="<?php echo $rowUser['id_user']; ?>" id="id_user" required>
				<div class="login100-form-title" style="background-image: url(assets/img/book2.jpg);">
					<span class="login100-form-title-1">
                    <h5><?php echo $row['nama_buku'] ?></h5>
                    <h6>"<?php echo $row['penulis'] ?>"</h5>
                    <p style="text-align:left;margin-bottom:10px;color:aliceblue;"><?php echo $row['tentang_buku'] ?></p>

					</span>
				</div>
                <?php
                                }
                            }
                            ?>
				
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Tanggal Kembali</span>
                        <input class="input100" type="text" name="tanggalkembali" id="tanggalkembali" placeholder="Masukan Tanggal Kembali">
                        <span class="focus-input100"></span>
                        <p> Example : 2020-12-20(Y-m-d)</p>

                    </div>
                            
					<div class="container-login100-form-btn">
                   
                        <button id="confirm" type="submit" name="submit">Hello</button>

					</div>
                </form>
                <button class="login100-form-btn" onclick="validate();">
							submit
                        </button>
                        <div class="flex-sb-m w-full p-b-0">
						<div class="contact100-form-checkbox">
                        <a href="homepage.php" class="txt1">
								<h2>Back to List Book<h2>
                                </a>
						</div>            </br></br></br>

            </div>
                   

	</div>
    <script>
        document.getElementById("confirm").style.visibility = "hidden";

        function validate(){
            var tgl = document.getElementById("tanggalkembali").value;
            if (tgl == null || tgl == ""){
                alert("input tanggal kembali masih kosong");
                return false;
            }else{
                var klik = document.getElementById('confirm');
                klik.click();
            }
        }

        
    </script>

</body>
</html>