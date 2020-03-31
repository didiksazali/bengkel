<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='input'){
	$id_orang = $_POST["id_orang"];
	$kode_kamar = $_POST["kode_kamar"];
	$lama_inap = $_POST["lama_inap"];
	
	$fasilitas_tambahan = "";
	if(isset($_POST['ft_lemari'])){
			if(empty($fasilitas_tambahan)){
				$fasilitas_tambahan = $fasilitas_tambahan."Lemari";
			}else{
				$fasilitas_tambahan = $fasilitas_tambahan.", Lemari";
			}
		}
	if(isset($_POST['ft_kursi'])){
			if(empty($fasilitas_tambahan)){
				$fasilitas_tambahan = $fasilitas_tambahan."Kursi";
			}else{
				$fasilitas_tambahan = $fasilitas_tambahan.", Kursi";
			}
		}
	if(isset($_POST['ft_kipas'])){
			if(empty($fasilitas_tambahan)){
				$fasilitas_tambahan = $fasilitas_tambahan."Kipas Angin";
			}else{
				$fasilitas_tambahan = $fasilitas_tambahan.", Kipas Angin";
			}
		}
		
	$sql = "INSERT INTO transaksi VALUES ('','$id_orang','$kode_kamar', '$lama_inap', '$fasilitas_tambahan')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:laporan2.php');
	}
	else {echo "gagal";}
}


?>
