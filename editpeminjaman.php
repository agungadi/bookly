<?php
// including the database connection file
include_once("koneksi.php");

if(isset($_POST['update']))
{	
	$id_peminjaman = mysqli_real_escape_string($connect, $_POST['id_peminjaman']);

	$id_user = mysqli_real_escape_string($connect, $_POST['id_user']);
	$id_buku = mysqli_real_escape_string($connect, $_POST['id_buku']);
	$tanggal_pinjam = mysqli_real_escape_string($connect, $_POST['tanggal_pinjam']);
    $tanggal_kembali = mysqli_real_escape_string($connect, $_POST['tanggal_kembali']);
    $denda = mysqli_real_escape_string($connect, $_POST['denda']);				
    $status = mysqli_real_escape_string($connect, $_POST['status']);	
    
    
	// checking empty fields
	if(empty($id_user) || empty($id_buku) || empty($tanggal_pinjam) || empty($tanggal_kembali)) {	
	    echo "<font color='red'>Field belum terisi semua.</font><br/>";		
	} else {	
		//updating the table
		$result = mysqli_query($connect, "UPDATE peminjaman SET id_user='$id_user', id_buku='$id_buku', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali', denda='$denda', status='$status' WHERE id_peminjaman=$id_peminjaman");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: peminjaman.php");
	}
}
?>
<?php
include "koneksi.php";

//getting id from url
$id_peminjaman = $_GET['id_peminjaman'];

//selecting data associated with this particular id
$query = "SELECT * FROM peminjaman WHERE id_peminjaman=$id_peminjaman";
$result = mysqli_query($connect, $query);

while($res = mysqli_fetch_array($result))
{
	$id_user = $res['id_user'];
    $id_buku = $res['id_buku'];
    $tanggal_pinjam = $res['tanggal_pinjam'];
    $tanggal_kembali = $res['tanggal_kembali'];
	$denda = $res['denda'];
    $status = $res['status'];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
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
						Edit Peminjaman
					</span>
				</div>
				
				<form class="login100-form validate-form" method="POST" action="editpeminjaman.php">

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">ID Member</span>
                        <select name="id_user" class="input100" >
                        <?php
                            $a = mysqli_query($connect, "SELECT * FROM user");
                            while($row=mysqli_fetch_array($a))
                            {
                            $id_user=$row['id_user'];
                            $nama =$row['nama'];
                           //Data akan terseleksi (selected) jika variabel $kode sama dengan $kdprincipal
                            if($kode==$id_user){
                            $cek="selected";
                            }
                            else{
                            $cek="";
                            }
                            echo"<option value='$id_user' $cek>$nama</option>";
                           
                            }
                            echo""
                            ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">ID Buku</span>
                        <select name="id_buku" class="input100" >
                        <?php
                            $a = mysqli_query($connect, "SELECT * FROM buku");
                            while($row=mysqli_fetch_array($a))
                            {
                            $id_buku=$row['id_buku'];
                            $nama_buku =$row['nama_buku'];
                           //Data akan terseleksi (selected) jika variabel $kode sama dengan $kdprincipal
                            if($kode==$id_buku){
                            $cek="selected";
                            }
                            else{
                            $cek="";
                            }
                            echo"<option value='$id_buku' $cek>$nama_buku</option>";
                           
                            }
                            echo""
                            ?>
                        </select>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Tanggal Pinjam</span>
						<input class="input100" type="text" name="tanggal_pinjam" id="tanggal_pinjam" value="<?php echo $tanggal_pinjam;?>">
                        <span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Tanggal Kembali</span>
						<input class="input100" type="text" name="tanggal_kembali" id="tanggal_kembali" value="<?php echo $tanggal_kembali;?>">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Denda</span>
						<input class="input100" type="text" name="denda" id="denda" value="<?php echo $denda;?>">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Status</span>
                        <select name="status" class="input100">
                            <option value="" <?php if($status=="") echo 'selected="selected"'; ?>> - </option>
                            <option value="Dipinjam" <?php if($status=="Dipinjam") echo 'selected="selected"'; ?>> Dipinjam</option>
                            <option value="Dikembalikan" <?php if($status=="Dikembalikan") echo 'selected="selected"'; ?>> Dikembalikan</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>
                    <input type="hidden" name="id_peminjaman" value=<?php echo $_GET['id_peminjaman'];?>>
					<div class="container-login100-form-btn p-b-0">
                    <button id="confirm" type="submit" name="update">Hello</button>

                    </div>       
                </form>
                <button class="login100-form-btn" onclick="validate();" style="margin-left: 200px; margin-top: -70px">
							submit
                        </button>
                        <div class="flex-sb-m w-full p-b-0">
						<div class="contact100-form-checkbox">
                        <a href="peminjaman.php" class="txt1">
								<h2>Back to Peminjaman<h2>
                                </a>
						</div>            </br></br></br>
			</div>
		</div>
	</div>
    <script>
        document.getElementById("confirm").style.visibility = "hidden";

        function validate(){
            var tanggal_pinjam = document.getElementById("tanggal_pinjam").value;
            var tanggal_kembali = document.getElementById("tanggal_kembali").value;
            if (tanggal_pinjam == null || tanggal_pinjam == ""){
                alert("input tanggal pinjam masih kosong");
                return false;
            }else if(tanggal_kembali == null || tanggal_kembali == ""){
                alert("input tanggal kembali masih kosong");
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