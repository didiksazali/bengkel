<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='delete'){
	$id_mekanik = $_GET['id_mekanik'];
	$row = mysqli_query($koneksi, "DELETE FROM mekanik WHERE id_mekanik = '$id_mekanik'");
	header('location:mekanik.php');
}


elseif ($act=='input'){
	$nama_mekanik = $_POST["nama_mekanik"];
	$alamat = $_POST["alamat"];
	$handphone = $_POST["handphone"];

	$sql = "INSERT INTO mekanik VALUES ('','$nama_mekanik','$alamat','$handphone')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:mekanik.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
    $id_mekanik = $_POST["id_mekanik"];
    $nama_mekanik = $_POST["nama_mekanik"];
    $alamat = $_POST["alamat"];
    $handphone = $_POST["handphone"];

	$sql = "UPDATE mekanik SET nama_mekanik='$nama_mekanik', alamat='$alamat', handphone='$handphone' WHERE id_mekanik='$id_mekanik'";

	if(mysqli_query($koneksi, $sql)){
//		mysqli_close($koneksi);
		header('location:mekanik.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
