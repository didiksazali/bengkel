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
                                <h3 align="center">Periode Waktu</h3>
                                </br>
                            </div>

                            <div class="panel-body">
                                <form role="form" method="POST" action="laporan.php">
                                Periode : <input type="text" id="tanggal" style="width: 100px" placeholder="Tanggal Awal" name="tanggal_awal" required> s/d
                                <input type="text" id="tanggal2" style="width: 100px" placeholder="Tanggal Akhir" name="tanggal_akhir" required> <button type="submit" class="btn btn-success">Tampilkan</button>
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
