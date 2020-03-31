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
                                    <?php
                                    $no_faktur = $_GET["no_faktur"];
                                    $sqlquery = "SELECT s.*, s.tanggal as hari, m.*, u.*, p.*, b.*, j.* FROM service s INNER JOIN mekanik m ON s.id_mekanik = m.id_mekanik
                                                         INNER JOIN user u ON s.id_user = u.id_user INNER JOIN pendaftaran p ON s.nomor_pendaftaran = p.nomor_pendaftaran
                                                         INNER JOIN barang b ON s.id_barang = b.id_barang INNER JOIN jasa j ON s.id_jasa = j.id_jasa WHERE no_faktur = '$no_faktur'";
                                    if ($result = mysqli_query($koneksi, $sqlquery)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <form role="form" method="POST" action="aksi_service.php?act=update">
                                                <input type="hidden" name="no_faktur" id="no_faktur"
                                                       value="<?php echo $row["no_faktur"]; ?>">
                                                <div class="form-group">
                                                    <label>Jumlah Item</label>
                                                    <input class="form-control" placeholder="Jumlah Item"
                                                           name="jumlah_item" value="<?php echo $row["jumlah_item"]; ?>"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                </div>
                                                <div class="form-group">
                                                    <label>Biaya Jasa</label>
                                                    <select type="text" class="form-control" name="id_jasa"
                                                            value="<?php echo $row["id_jasa"]; ?>" autocomplete="off"
                                                            required>
                                                        <option></option>
                                                        <?php
                                                        $query = mysqli_query($koneksi, "SELECT * FROM jasa");
                                                        while ($data = mysqli_fetch_assoc($query)) {
                                                            ?>
                                                            <option value="<?php echo $data['id_jasa']; ?>" <?php if ($data["id_jasa"] == $row["id_jasa"]) {
                                                                echo "selected";
                                                            } ?> >
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
                                                    <select type="text" class="form-control" name="id_barang"
                                                            value="<?php echo $row["id_barang"]; ?>" autocomplete="off"
                                                            required>
                                                        <option></option>
                                                        <?php
                                                        $query = mysqli_query($koneksi, "SELECT * FROM barang");
                                                        while ($data = mysqli_fetch_assoc($query)) {
                                                            ?>
                                                            <option value="<?php echo $data['id_barang']; ?>" <?php if ($data["id_barang"] == $row["id_barang"]) {
                                                                echo "selected";
                                                            } ?> >
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
                                                    <input class="form-control" placeholder="Diskon" name="diskon"
                                                           value="<?php echo $row["diskon"]; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mekanik</label>
                                                    <select type="text" class="form-control" name="id_mekanik"
                                                            value="<?php echo $row["id_mekanik"]; ?>" autocomplete="off"
                                                            required>
                                                        <option></option>
                                                        <?php
                                                        $query = mysqli_query($koneksi, "SELECT * FROM mekanik");
                                                        while ($data = mysqli_fetch_assoc($query)) {
                                                            ?>
                                                            <option value="<?php echo $data['id_mekanik']; ?>" <?php if ($data["id_mekanik"] == $row["id_mekanik"]) {
                                                                echo "selected";
                                                            } ?> >
                                                                <?php echo $data['nama_mekanik'];
                                                                echo " (" . $data['id_mekanik'] . ")"; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
<!--                                                <div class="form-group">-->
<!--                                                    <label>ID User</label>-->
<!--                                                    <input class="form-control" placeholder="ID User" name="id_user"-->
<!--                                                           value="--><?php //echo $row["id_user"]; ?><!--" required>-->
<!--                                                </div>-->
                                                <div class="form-group">
                                                    <label>No Pendaftaran</label>
                                                    <select type="text" class="form-control" name="nomor_pendaftaran"
                                                            value="<?php echo $row["nomor_pendaftaran"]; ?>"
                                                            autocomplete="off"
                                                            required>
                                                        <option></option>
                                                        <?php
                                                        $query = mysqli_query($koneksi, "SELECT * FROM pendaftaran");
                                                        while ($data = mysqli_fetch_assoc($query)) {
                                                            ?>
                                                            <option value="<?php echo $data['nomor_pendaftaran']; ?>" <?php if ($data["nomor_pendaftaran"] == $row["nomor_pendaftaran"]) {
                                                                echo "selected";
                                                            } ?> >
                                                                <?php echo $data['nomor_pendaftaran'];
                                                                echo " (" . $data['nama_pelanggan'] . ")"; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
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