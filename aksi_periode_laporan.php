<?php
include 'config.php';

$act=$_GET['act'];



if ($act=='input'){
	$nama_jasa = $_POST["nama_jasa"];
	$tarif = $_POST["tarif"];

	$sql = "INSERT INTO jasa VALUES ('','$nama_jasa','$tarif')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:jasa.php');
	}
	else {echo "gagal";}

}


?>
