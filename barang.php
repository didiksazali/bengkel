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
                        Data Barang
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="add_barang.php" class="btn btn-primary"><i class="fa fa-plus"> Tambah Data
                                    Barang</i></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Satuan</th>
                                        <th>Stok</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $sqlquery = "SELECT * FROM barang";
                                    if ($result = mysqli_query($koneksi, $sqlquery)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?php echo $row["id_barang"]; ?></td>
                                                <td><?php echo $row["nama_barang"]; ?></td>
                                                <td><?php echo $row["harga_beli"]; ?></td>
                                                <td><?php echo $row["harga_jual"]; ?></td>
                                                <td><?php echo $row["satuan"]; ?></td>
                                                <td><?php echo $row["stok"]; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="edit_barang.php?id_barang=<?php echo $row['id_barang']; ?>"
                                                           class="btn btn-xs btn-success" title='Edit'> <i
                                                                    class="fa fa-edit"></i> </a>

                                                        <a onclick="return confirm('Anda yakin ingin menghapus data tersebut?');"
                                                           href="aksi_barang.php?act=delete&id_barang=<?php echo $row['id_barang']; ?>"
                                                           class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"
                                                                                             title='Hapus'></i> </a>
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
    <?php
}
?>
