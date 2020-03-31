<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='delete'){
	$kode_kamar=$_GET['kode_kamar'];
	$row = mysqli_query($koneksi, "DELETE FROM kamar WHERE kode_kamar = '$kode_kamar'");
	header('location:kamar.php');
}


elseif ($act=='input'){
	$kode_kamar = $_POST["kode_kamar"];
	$nama_kamar = $_POST["nama_kamar"];
	$tarif_normal = $_POST["tarif_normal"];
	$tarif_khusus = $_POST["tarif_khusus"];

	$sql = "INSERT INTO kamar VALUES ('$kode_kamar','$nama_kamar','$tarif_normal', '$tarif_khusus')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:kamar.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$kode_kamar =$_POST["kode_kamar"];
	$nama_kamar = $_POST["nama_kamar"];
	$tarif_normal = $_POST["tarif_normal"];
	$tarif_khusus = $_POST["tarif_khusus"];

	$sql = "UPDATE kamar SET nama_kamar='$nama_kamar', tarif_normal='$tarif_normal', tarif_khusus='$tarif_khusus' WHERE kode_kamar='$kode_kamar'";

	if(mysqli_query($koneksi, $sql)){
		mysqli_close($koneksi);
		header('location:kamar.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
