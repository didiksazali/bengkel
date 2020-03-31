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
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Laporan Pendaftaran
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 align="center">BENGKEL FAJAR JAYA</h2>
                            <h3 align="center">Jl. Ketitiran No. 100, Pekanbaru - Riau</h3>
                            </br>
                        </div>

                        <div class="panel-body">
                            <?php
                            $tgl_awal = $_POST['tanggal_awal'];
                            $tgl_akhir = $_POST['tanggal_akhir'];
                            $no = 1;
                            $total_semua = 0;
                            $sqlquery = "SELECT * FROM pendaftaran WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY nomor_pendaftaran DESC";
                            if ($result = mysqli_query($koneksi, $sqlquery)) {
                            $row = mysqli_fetch_assoc($result);

                            ?>
                            Periode : <?php echo tgl_indo($tgl_awal); ?> s/d <?php echo tgl_indo($tgl_akhir); }?>
                            <br>
                            </br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Pendaftaran</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No Polisi</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Keluhan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $tgl_awal = $_POST['tanggal_awal'];
                                    $tgl_akhir = $_POST['tanggal_akhir'];
                                    $no = 1;
                                    $total_semua = 0;
                                    $sqlquery = "SELECT * FROM pendaftaran WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY nomor_pendaftaran DESC";
                                    if ($result = mysqli_query($koneksi, $sqlquery)) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?php echo $row["nomor_pendaftaran"]; ?></td>
                                        <td><?php echo $row["nama_pelanggan"]; ?></td>
                                        <td><?php echo $row["no_pol"]; ?></td>
                                        <td><?php echo $row["jenis_kendaraan"]; ?></td>
                                        <td><?php echo $row["keluhan"]; ?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                    <?php
                                    mysqli_free_result($result);
                                    }
                                    mysqli_close($koneksi);
                                    ?>
                                    </tbody>
                                </table>
                                <p>
                                    <div class='pull-right'>
                                        Pekanbaru, <?php echo tgl_indo($hari_ini); ?><br>
                                        <b>
                                            <center>Petugas</center>
                                        </b>
                                <p>&nbsp;</p>
                                <b>
                                    <center><?php echo $_SESSION['nama_user']; ?></center>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>

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
    <?php
}
?>