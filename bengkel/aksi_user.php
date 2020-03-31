<?php
include 'config.php';

$act=$_GET['act'];

if ($act=='delete'){
	$id_user = $_GET['id_user'];
	$row = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");
	header('location:user.php');
}


elseif ($act=='input'){
	$nama_user = $_POST["nama_user"];
	$password = md5($_POST["password"]);
	$level = $_POST["level"];

	$sql = "INSERT INTO user VALUES ('','$nama_user','$password','$level')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:user.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
    $id_user = $_POST["id_user"];
    $nama_user = $_POST["nama_user"];
    $password = md5($_POST["password"]);
    $level = $_POST["level"];

    if (!empty($_POST["password"])) {
        $sql = "UPDATE user SET nama_user='$nama_user', password='$password', level='$level' WHERE id_user='$id_user'";

        if(mysqli_query($koneksi, $sql)){
//		mysqli_close($koneksi);
            header('location:user.php');
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("gagal");';
            echo '</script>';
        }
	} else {
        $sql = "UPDATE user SET nama_user='$nama_user', level='$level' WHERE id_user='$id_user'";

        if(mysqli_query($koneksi, $sql)){
//		mysqli_close($koneksi);
            header('location:user.php');
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("gagal");';
            echo '</script>';
        }
	}


}
?>
