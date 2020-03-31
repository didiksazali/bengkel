<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='delete'){
	$nomor_pendaftaran = $_GET['nomor_pendaftaran'];
	$row = mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE nomor_pendaftaran = '$nomor_pendaftaran'");
	header('location:pendaftaran.php');
}


elseif ($act=='input'){
	$no_pol = $_POST["no_pol"];
	$nama_pelanggan = $_POST["nama_pelanggan"];
	$jenis_kendaraan = $_POST["jenis_kendaraan"];
	$keluhan = $_POST["keluhan"];
	$status = $_POST["status"];

	$sql = "INSERT INTO pendaftaran VALUES ('','$hari_ini','$no_pol','$nama_pelanggan','$jenis_kendaraan','$keluhan','$status')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:pendaftaran.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
    $nomor_pendaftaran = $_POST["nomor_pendaftaran"];
    $no_pol = $_POST["no_pol"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $jenis_kendaraan = $_POST["jenis_kendaraan"];
    $keluhan = $_POST["keluhan"];
    $status = $_POST["status"];

	$sql = "UPDATE pendaftaran SET no_pol='$no_pol', nama_pelanggan='$nama_pelanggan', jenis_kendaraan='$jenis_kendaraan', keluhan='$keluhan',
			status='$status' WHERE nomor_pendaftaran='$nomor_pendaftaran'";

	if(mysqli_query($koneksi, $sql)){
//		mysqli_close($koneksi);
		header('location:pendaftaran.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
