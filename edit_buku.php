<?php
// including the database connection file
include_once("koneksi.php");

if(isset($_POST['update']))
{	
	$id_buku = mysqli_real_escape_string($connect, $_POST['id_buku']);

	$nama_buku = mysqli_real_escape_string($connect, $_POST['nama_buku']);
	$penulis = mysqli_real_escape_string($connect, $_POST['penulis']);
	$tentang_buku = mysqli_real_escape_string($connect, $_POST['tentang_buku']);
    $status_buku = mysqli_real_escape_string($connect, $_POST['status_buku']);
    $fotolama = mysqli_real_escape_string($connect, $_POST['foto']);				
    
    
	// checking empty fields
	if(empty($id_buku) || empty($nama_buku) || empty($penulis) || empty($tentang_buku) || empty($status_buku)) {		
        echo "<font color='red'>Isi semua field terlebih dahulu</font><br/> <a href='homepage.php'> Back To Home <a>";
        return false;	
	} else {	
        $foto = $_FILES['foto']['name'];
        if ($foto != ""){

        $extallow = array('png','jpeg','jpg');
        $dot = explode('.', $foto);
        $ext = strtolower(end($dot));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $name_random = rand(1,999);
        $nama_foto = $name_random.'-'.$foto;
        //updating the table
        move_uploaded_file($file_tmp, 'img/'.$nama_foto);
		$result = mysqli_query($connect, "UPDATE buku SET nama_buku='$nama_buku', penulis='$penulis', tentang_buku='$tentang_buku', status_buku='$status_buku', foto='$nama_foto' WHERE id_buku='$id_buku'");
        }else{
            $result = mysqli_query($connect, "UPDATE buku SET nama_buku='$nama_buku', penulis='$penulis', tentang_buku='$tentang_buku', status_buku='$status_buku', foto='$fotolama' WHERE id_buku='$id_buku'");

        }

		//redirectig to the display page. In our case, it is index.php
		header("Location: homepage_admin.php");
	}
}
?>
<?php
include "koneksi.php";

//getting id from url
$id_buku = $_GET['id_buku'];

//selecting data associated with this particular id
$query = "SELECT * FROM buku WHERE id_buku=$id_buku";
$result = mysqli_query($connect, $query);

while($res = mysqli_fetch_array($result))
{
	$nama_buku = $res['nama_buku'];
    $penulis = $res['penulis'];
    $tentang_buku = $res['tentang_buku'];
    $status_buku = $res['status_buku'];
	$foto = $res['foto'];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  <!-- Favicons -->
  <link href="bootstrap/logoa.png" rel="icon">
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

    if (isset($_SESSION['status']) == 'admin') {
        ?>
	<div class="limiter">
	<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Edit Buku
					</span>
				</div>
				
				<form class="login100-form validate-form" method="POST" action="edit_buku.php"  enctype="multipart/form-data">

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Nama Buku</span>
                        <input class="input100" type="text" name="nama_buku" id="nama_buku" value="<?php echo $nama_buku;?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Penulis</span>
                        <input class="input100" type="text" name="penulis" id="penulis" value="<?php echo $penulis;?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Tentang Buku</span>
						<input class="input100" type="text" name="tentang_buku" id="tentang_buku" value="<?php echo $tentang_buku;?>">
                        <span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Status Buku</span>
                        <select name="status_buku" class="input100">
                            <option value="Tersedia" <?php if($status_buku=="Tersedia") echo 'selected="selected"'; ?>> Tersedia</option>
                            <option value="Sedang Dipinjam" <?php if($status_buku=="Sedang Dipinjam") echo 'selected="selected"'; ?>>Sedang Dipinjam</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-0" data-validate="Username is required">
                        <span class="label-input100">Foto</span>
                        <input type="file" name="foto" id="foto" value="<?php echo $foto;?>
                        <span class="focus-input100"></span>
                    </div>
                    <input type="hidden" name="foto" id="foto2" value="<?php echo $foto;?>">
                    <input type="hidden" name="id_buku" value="<?php echo $_GET['id_buku'];?>">
					<div class="container-login100-form-btn p-b-0">
                    <button id="confirm" type="submit" name="update">Hello</button>
                
                    </div>       
                </form>
                <button class="login100-form-btn" onclick="validate();" style="margin-left: 200px; margin-top: -50px">
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

       
            var nama_buku = document.getElementById("nama_buku").value;
            var penulis = document.getElementById("penulis").value;
            var tentang_buku = document.getElementById("tentang_buku").value;



            if (nama_buku == null || nama_buku == ""){
                alert("input nama buku masih kosong");
                return false;
            }else if(penulis == null || penulis == ""){
                alert("input penulis masih kosong");
                return false;
            }else if(tentang_buku == null || tentang_buku == ""){
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