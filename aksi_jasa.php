<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='delete'){
	$id_jasa = $_GET['id_jasa'];
	$row = mysqli_query($koneksi, "DELETE FROM jasa WHERE id_jasa = '$id_jasa'");
	header('location:jasa.php');
}


elseif ($act=='input'){
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


elseif ($act=='update'){
    $id_jasa = $_POST["id_jasa"];
    $nama_jasa = $_POST["nama_jasa"];
    $tarif = $_POST["tarif"];

	$sql = "UPDATE jasa SET nama_jasa='$nama_jasa', tarif='$tarif' WHERE id_jasa='$id_jasa'";

	if(mysqli_query($koneksi, $sql)){
//		mysqli_close($koneksi);
		header('location:jasa.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
