<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='delete'){
	$id_barang = $_GET['id_barang'];
	$row = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id_barang'");
	header('location:barang.php');
}


elseif ($act=='input'){
	$nama_barang = $_POST["nama_barang"];
	$harga_beli = $_POST["harga_beli"];
	$harga_jual = $_POST["harga_jual"];
	$satuan = $_POST["satuan"];
	$stok = $_POST["stok"];

	$sql = "INSERT INTO barang VALUES ('','$nama_barang','$harga_beli','$harga_jual','$satuan','$stok')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:barang.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
    $id_barang = $_POST["id_barang"];
    $nama_barang = $_POST["nama_barang"];
    $harga_beli = $_POST["harga_beli"];
    $harga_jual = $_POST["harga_jual"];
    $satuan = $_POST["satuan"];
    $stok = $_POST["stok"];

	$sql = "UPDATE barang SET nama_barang='$nama_barang', harga_beli='$harga_beli', harga_jual='$harga_jual',
			satuan='$satuan', stok='$stok' WHERE id_barang='$id_barang'";

	if(mysqli_query($koneksi, $sql)){
//		mysqli_close($koneksi);
		header('location:barang.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
