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
                        Formulir Data Service
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
                                    <form role="form" method="POST" action="aksi_service.php?act=input">
                                        <div class="form-group">
                                            <label>Jumlah Item</label>
                                            <input class="form-control" placeholder="Jumlah Item" name="jumlah_item"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Jasa</label>
                                            <select type="text" class="form-control" name="id_jasa" autocomplete="off"
                                                    required>
                                                <option></option>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT * FROM jasa");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?php echo $data['id_jasa']; ?>">
                                                        <?php echo $data['nama_jasa'];
                                                        echo " (" . $data['tarif'] . ")"; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya Barang</label>
                                            <select type="text" class="form-control" name="id_barang" autocomplete="off"
                                                    required>
                                                <option></option>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT * FROM barang");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?php echo $data['id_barang']; ?>">
                                                        <?php echo $data['nama_barang'];
                                                        echo " (" . $data['harga_jual'] . ")"; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Diskon</label>
                                            <input class="form-control" placeholder="Diskon" name="diskon" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mekanik</label>
                                            <select type="text" class="form-control" name="id_mekanik"
                                                    autocomplete="off"
                                                    required>
                                                <option></option>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT * FROM mekanik");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?php echo $data['id_mekanik']; ?>">
                                                        <?php echo $data['nama_mekanik'];
                                                        echo " (" . $data['id_mekanik'] . ")"; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
<!--                                        <div class="form-group">-->
<!--                                            <label>ID User</label>-->
<!--                                            <input class="form-control" placeholder="ID User" name="id_user" required>-->
<!--                                        </div>-->
                                        <div class="form-group">
                                            <label>No Pendaftaran</label>
                                            <select type="text" class="form-control" name="nomor_pendaftaran"
                                                    autocomplete="off"
                                                    required>
                                                <option></option>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT * FROM pendaftaran");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?php echo $data['nomor_pendaftaran']; ?>">
                                                        <?php echo $data['nomor_pendaftaran'];
                                                        echo " (" . $data['nama_pelanggan'] . ")"; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
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