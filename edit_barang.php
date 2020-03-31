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
                        Formulir Data Barang
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
                                    <?php
                                    $id_barang = $_GET["id_barang"];
                                    $sqlquery = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
                                    if ($result = mysqli_query($koneksi, $sqlquery)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <form role="form" method="POST" action="aksi_barang.php?act=update">
                                                <input type="hidden" name="id_barang" id="id_barang"
                                                       value="<?php echo $row["id_barang"]; ?>">
                                                <div class="form-group">
                                                    <label>Nama Barang</label>
                                                    <input class="form-control" placeholder="Nama Barang"
                                                           name="nama_barang" value="<?php echo $row["nama_barang"]; ?>"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Beli</label>
                                                    <input class="form-control" placeholder="Harga Beli"
                                                           name="harga_beli" value="<?php echo $row["harga_beli"]; ?>"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Jual</label>
                                                    <input class="form-control" placeholder="Harga Jual"
                                                           name="harga_jual" value="<?php echo $row["harga_jual"]; ?>"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Satuan</label>
                                                    <input class="form-control" placeholder="Satuan" name="satuan"
                                                           value="<?php echo $row["satuan"]; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stok</label>
                                                    <input class="form-control" placeholder="Stok" name="stok"
                                                           value="<?php echo $row["stok"]; ?>" required>
                                                </div>

                                                <button type="submit" class="btn btn-success">Ubah</button>
                                                <button type="reset" class="btn btn-warning">Batal</button>
                                            </form>
                                            <?php
                                        }
                                        mysqli_free_result($result);
                                    }
                                    mysqli_close($koneksi);
                                    ?>
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