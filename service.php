<?php
session_start();
if (!empty($_SESSION['username']) AND !empty($_SESSION['password'])) {
	include 'include/fungsi.php';
	include 'config.php';
	include 'include/header.php';
	include 'include/sidebar.php';
	include 'include/fungsi_indotgl.php';
?>

<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Data Service
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="add_service.php" class="btn btn-primary"><i class="fa fa-plus"> Tambah Data Service</i></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
											<th>No Faktur</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Item</th>
                                            <th>Biaya Jasa</th>
                                            <th>Biaya Barang</th>
                                            <th>Diskon</th>
                                            <th>ID Mekanik</th>
                                            <th>ID User</th>
                                            <th>No Pendaftaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										$no=1;
										$sqlquery = "SELECT s.*, s.tanggal as hari, m.*, u.*, p.*, b.*, j.* FROM service s INNER JOIN mekanik m ON s.id_mekanik = m.id_mekanik
                                                     INNER JOIN user u ON s.id_user = u.id_user INNER JOIN pendaftaran p ON s.nomor_pendaftaran = p.nomor_pendaftaran
                                                     INNER JOIN barang b ON s.id_barang = b.id_barang INNER JOIN jasa j ON s.id_jasa = j.id_jasa";
										if ($result = mysqli_query($koneksi, $sqlquery)) {
											while ($row = mysqli_fetch_assoc($result)) {
									?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?php echo $row["no_faktur"];?></td>
											<td><?php echo $row["hari"];?></td>
											<td><?php echo $row["jumlah_item"];?></td>
											<td><?php echo $row["tarif"];?></td>
											<td><?php echo $row["harga_jual"];?></td>
											<td><?php echo $row["diskon"];?></td>
											<td><?php echo $row["id_mekanik"];?></td>
											<td><?php echo $row["id_user"];?></td>
											<td><?php echo $row["nomor_pendaftaran"];?></td>
                                            <td>
											<div class="btn-group">
											   <a href="edit_service.php?no_faktur=<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-success" title='Edit'> <i class="fa fa-edit"></i> </a>

											  <a onclick="return confirm('Anda yakin ingin menghapus data tersebut?');" href="aksi_service.php?act=delete&no_faktur=<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o" title='Hapus'></i> </a>
											</div>
											</td>
                                        </tr>
										<?php
											$no++;
										}
										mysqli_free_result($result);
									}
									mysqli_close($koneksi);
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                     <!-- End  Kitchen Sink -->
                </div>
                
            </div>
       
        
<?php
	include 'include/footer.php';
?>
		
		
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
<?php } ?>