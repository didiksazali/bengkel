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
                        <?php
                        $no_faktur = $_GET["no_faktur"];
                        $no = 1;
                        $sqlquery = "SELECT s.*, s.tanggal as hari, m.*, u.*, p.*, b.*, j.* FROM service s INNER JOIN mekanik m ON s.id_mekanik = m.id_mekanik
                                     INNER JOIN user u ON s.id_user = u.id_user INNER JOIN pendaftaran p ON s.nomor_pendaftaran = p.nomor_pendaftaran
                                     INNER JOIN barang b ON s.id_barang = b.id_barang INNER JOIN jasa j ON s.id_jasa = j.id_jasa WHERE no_faktur = '$no_faktur'";
                        if ($result = mysqli_query($koneksi, $sqlquery)) {
                        $row = mysqli_fetch_assoc($result);

                        ?>
                        <div class="panel-body">

                            <div class="table-responsive col-md-8">
                                <table>
                                    <tr>
                                        <td>
                                            No Faktur
                                        </td>
                                        <td>&nbsp; : &nbsp;</td>
                                        <td><?php echo $row["no_faktur"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal
                                        </td>
                                        <td>&nbsp; : &nbsp;</td>
                                        <td><?php echo tgl_indo($hari_ini); ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No Polisi
                                        </td>
                                        <td>&nbsp; : &nbsp;</td>
                                        <td><?php echo $row["no_pol"]; ?></td>
                                    </tr>
                                </table>
                                </br>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Jasa</th>
                                        <th>Nama Jasa</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?php echo $row["no_faktur"];?></td>
                                        <td><?php echo $row["nama_jasa"];?></td>
                                        <td><?php echo rupiah($row["tarif"]);?></td>
                                    </tr>
                                    <?php
//                                    $no++;
//                                    }
                                    ?>
                                    <?php
//                                    mysqli_free_result($result);
                                    }
//                                    mysqli_close($koneksi);
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive col-md-12">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <?php
                                    $no_faktur2 = $_GET["no_faktur"];
                                    $no2 = 1;
                                    $total_semua = 0;
                                    $sqlquery2 = "SELECT s.*, s.tanggal as hari, m.*, u.*, p.*, b.*, j.* FROM service s INNER JOIN mekanik m ON s.id_mekanik = m.id_mekanik
                                     INNER JOIN user u ON s.id_user = u.id_user INNER JOIN pendaftaran p ON s.nomor_pendaftaran = p.nomor_pendaftaran
                                     INNER JOIN barang b ON s.id_barang = b.id_barang INNER JOIN jasa j ON s.id_jasa = j.id_jasa WHERE no_faktur = '$no_faktur2'";
                                    if ($result2 = mysqli_query($koneksi, $sqlquery2)) {
                                    while ($row2 = mysqli_fetch_assoc($result2)){
                                    $jumlah = $row2["jumlah_item"] * $row2["harga_jual"];
                                    $jumlah_jasa = $row2["tarif"];
                                    $total_semua += $jumlah;
                                    ?>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Item</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $no2; ?></td>
                                        <td><?php echo $row2["id_barang"]; ?></td>
                                        <td><?php echo $row2["nama_barang"]; ?></td>
                                        <td><?php echo $row2["jumlah_item"]; ?></td>
                                        <td><?php echo rupiah($row2["harga_jual"]); ?></td>
                                        <td><?php echo rupiah($jumlah); ?></td>
                                    </tr>
                                    <?php
                                    $no++;

                                    ?>
                                    <tr>
                                        <td colspan='5'><b>Grand Total</b></td>
                                        <td colspan='2'><?php echo rupiah($total_semua + $jumlah_jasa); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan='5'><b>Diskon</b></td>
                                        <td colspan='2'><?php echo $row2["diskon"]; ?>%</td>
                                    </tr>
                                    <tr>
                                        <td colspan='5'><b>Total Biaya</b></td>
                                        <td colspan='2'><?php echo rupiah(($total_semua + $jumlah_jasa)/$row2["diskon"]); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class='pull-right'>
                                    <table>
                                        <tr>
                                            <td>
                                                Kasir
                                            </td>
                                            <td>&nbsp; : &nbsp;</td>
                                            <td><?php echo $_SESSION["nama_user"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Mekanik
                                            </td>
                                            <td>&nbsp; : &nbsp;</td>
                                            <td><?php echo $row2["nama_mekanik"];
                                                }
                                                }?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <p>
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
    <?php
}
?>