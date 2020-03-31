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
                            Laporan Service
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 align="center">Faktur Service</h3>
                                </br>
                            </div>

                            <div class="panel-body">
                                <form role="form" action="laporan_service.php">
                                    <div class="form-group col-md-3">
                                        <label>No Faktur</label>
                                        <select type="text" class="form-control" name="no_faktur" autocomplete="off" required>
                                            <option></option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM service");
                                            while ($data = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <option value="<?php echo $data['no_faktur']; ?>">
                                                    <?php echo $data['no_faktur']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <br>
                                        <button href="laporan_service.php?no_faktur=<?php echo $row["no_faktur"];?>" type="submit" class="btn btn-success">Tampilkan</button>
                                    </div>
                                </form>

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
    <!-- Datepicker -->
    <script src="assets/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>




<!-- page script -->
<script type="text/javascript">

    function allowNumbersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }

    $(document).ready(function () {
        $('.tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose:true,
            todayHighlight: true
        });

        $('.jampicker').clockpicker({
            autoclose: true
        });


    });



</script>
   
</body>
</html>
<?php } ?>
