<?php
session_start();
include 'config.php';
include "include/fungsi_indotgl.php";

$act=$_GET['act'];

if ($act=='delete'){
	$no_faktur = $_GET['no_faktur'];
	$row = mysqli_query($koneksi, "DELETE FROM service WHERE no_faktur = '$no_faktur'");
	header('location:service.php');
}


elseif ($act=='input'){
	$jumlah_item = $_POST["jumlah_item"];
	$id_jasa = $_POST["id_jasa"];
	$id_barang = $_POST["id_barang"];
	$diskon = $_POST["diskon"];
	$id_mekanik = $_POST["id_mekanik"];
	$id_user = $_SESSION["id_user"];
	$nomor_pendaftaran = $_POST["nomor_pendaftaran"];

	$sql = "INSERT INTO service VALUES ('','$hari_ini','$jumlah_item','$id_jasa','$id_barang','$diskon',
			'$id_mekanik','$id_user','$nomor_pendaftaran')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:service.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
    $no_faktur = $_POST["no_faktur"];
    $jumlah_item = $_POST["jumlah_item"];
    $id_jasa = $_POST["id_jasa"];
    $id_barang = $_POST["id_barang"];
    $diskon = $_POST["diskon"];
    $id_mekanik = $_POST["id_mekanik"];
    $id_user = $_SESSION["id_user"];
    $nomor_pendaftaran = $_POST["nomor_pendaftaran"];

	$sql = "UPDATE service SET jumlah_item='$jumlah_item', id_jasa='$id_jasa', id_barang='$id_barang',
 			diskon='$diskon', id_mekanik='$id_mekanik', id_user='$id_user', nomor_pendaftaran='$nomor_pendaftaran' WHERE no_faktur='$no_faktur'";

	if(mysqli_query($koneksi, $sql)){
//		mysqli_close($koneksi);
		header('location:service.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
