<?php
session_start();
if (!empty($_SESSION['username']) AND !empty($_SESSION['password'])) {
    include 'config.php';
    include 'include/header.php';
    include 'include/sidebar.php';
    ?>

<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Formulir Data Transaksi
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="aksi_transaksi.php?act=input">
                                        <div class="form-group">
                                            <label>Nama Orang</label>
                                            <select name='id_orang' class='form-control'>
											<?php
												$sqlquery = "SELECT * FROM orang";
												if ($result = mysqli_query($koneksi, $sqlquery)) {
													while ($row = mysqli_fetch_assoc($result)) {
														$id_orang = $row["id_orang"];
														$nama_orang = $row["nama_orang"];
														echo "<option value='$id_orang'>$nama_orang</option>";
													}
													mysqli_free_result($result);
												}
											?>
											</select>
                                        </div>
										
										<div class="form-group">
                                            <label>Kode Kamar</label>
                                            <select name='kode_kamar' class='form-control'>
											<?php
												$sqlquery = "SELECT * FROM kamar";
												if ($result = mysqli_query($koneksi, $sqlquery)) {
													while ($row = mysqli_fetch_assoc($result)) {
														$kode_kamar = $row["kode_kamar"];
														echo "<option value='$kode_kamar'>$kode_kamar</option>";
													}
													mysqli_free_result($result);
												}
											?>
											</select>
                                        </div>
										
										<div class="form-group">
                                            <label>Lama Inap</label>
                                            <input class="form-control" placeholder="Masukkan Lama Inap" name="lama_inap" required>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Fasilitas</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name='ft_lemari'>Lemari (Rp. 10.000,- / Hari)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name='ft_kursi'>Kursi (Rp. 8.000,- / Hari)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name='ft_kipas'>Kipas Angin (Rp. 10.000,- / Hari)
                                                </label>
                                            </div>
                                        </div>
														
                                        
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-warning">Batal</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
       
        
<?php
	include 'include/footer.php';
?>
		
            </div>
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
<?php
}
?>