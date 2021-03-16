<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p>
				
        
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Untuk sunting
            $('#EditKategori').on('show.bs.modal', function (event) {
                var div     = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal   = $(this)

                // Isi nilai pada field
                modal.find('#id').attr("value",div.data('id'));
                modal.find('#nama').attr("value",div.data('nama'));
                modal.find('#ket').html(div.data('ket'));
                
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            // Untuk sunting
            $('#HapusKategori').on('show.bs.modal', function (event) {
                var div     = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal   = $(this)

                // Isi nilai pada field
                modal.find('#id_hapus').attr("value",div.data('id'));
                modal.find('#nama_hapus').attr("value",div.data('nama'));
                
            });
        });
    </script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
	<script>
        $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
        setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
    </script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/select2.full.js"></script>
    <script>
        $(document).ready(function(){
            $(".barang2").select2({
                width: '100%',
                dropdownParent: $("#EditMasuk"),
                readonly: true
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".barang").select2({
                width: '100%',
                dropdownParent: $("#ModalBarang")
            });
        });
    </script>
    <script>
        $(".issue").select2({
            width:'100%',
            dropdownParent: $("#ModalIssue")
        });
    </script>
    <script>
        $(".issue2").select2({
            width:'100%',
            dropdownParent: $("#EditIssue")
        });
    </script>
    <!-- Morris Chart Js -->
    <script src="<?php echo base_url(); ?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris/morris.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/Lightweight-Chart/jquery.chart.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="<?php echo base_url(); ?>text/javascript" src="assets/js/Chart.min.js"></script>  
    <script type="<?php echo base_url(); ?>text/javascript" src="assets/js/chartjs.js"></script> 

</body>

</html>