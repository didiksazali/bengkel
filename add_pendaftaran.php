<?php
session_start();
if (!empty($_SESSION['username']) AND !empty($_SESSION['password'])) {
    include 'config.php';
    include 'include/header.php';
    include 'include/sidebar.php';
    ?>

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Formulir Data Pelanggan
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
                                    <form role="form" method="POST" action="aksi_pendaftaran.php?act=input">
                                        <div class="form-group">
                                            <label>No Polisi</label>
                                            <input class="form-control" placeholder="No Polisi" name="no_pol" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan</label>
                                            <input class="form-control" placeholder="Nama Pelanggan"
                                                   name="nama_pelanggan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kendaraan</label>
                                            <input class="form-control" placeholder="Jenis Kendaraan"
                                                   name="jenis_kendaraan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keluhan</label>
                                            <input class="form-control" placeholder="Keluhan" name="keluhan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input class="form-control" placeholder="Status" name="status" required>
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


            <!-- /.col-lg-12 -->
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
    <?php
}
?>