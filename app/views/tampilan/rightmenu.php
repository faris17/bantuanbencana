 <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
		  <?php if($this->session->getValue('level')=='admin') { ?>
          <div class="card my-4">
            <h5 class="card-header" id="hide_rightmenu">Menu Admin</h5>
            <div class="card-body">
             <div class="row">
			 <div class="col-lg-8">
				<h5>Table</h5>
				 <ul class="list-unstyled mb-0">
                    <li><a href="<?php echo $settingUrl->siteUrl('admin/biodata'); ?>">Biodata</a></li>
                    <li><a href="<?php echo $settingUrl->siteUrl('admin/instansi'); ?>">Instansi</a></li>
                    <li class="active"><a   href="<?php echo $settingUrl->siteUrl('admin/kebutuhan'); ?>">Kebutuhan Mendesak</a></li>
                    <li><a href="<?php echo $settingUrl->siteUrl('admin/bantuan'); ?>">Bantuan</a></li>
				 </ul>
			 </div>
			 <div class="col-lg-4">
				<h5>Setting</h5>
				 <ul class="list-unstyled mb-0">
                    <li>
                      <a href="<?php echo $settingUrl->siteUrl('admin/users'); ?>">Users</a>
                    </li>
				 </ul>
			 </div>
			 </div>
            </div>
          </div>
		  <?php } ?>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Kegiatan</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="<?php echo $settingUrl->siteUrl('admin/distribusi'); ?>">Distribusi</a>
                    </li>
                    <li>
                      <a href="<?php echo $settingUrl->siteUrl('admin/distribusi/upload'); ?>">Upload Gambar</a>
                    </li>
                    
                  </ul>
                </div>
               
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Informasi Bantuan</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    
    
    <script src="<?php echo $settingUrl->baseUrl(); ?>assets/vendor/popper/popper.min.js"></script>
    <script src="<?php echo $settingUrl->baseUrl(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo $settingUrl->baseUrl(); ?>assets/css/jquery.dataTables.min.css" />
	
  	
  	<script type="text/javascript" src="<?php echo $settingUrl->baseUrl(); ?>assets/js/jquery.dataTables.min.js"></script>  
  	<script type="text/javascript" src="<?php echo $settingUrl->baseUrl(); ?>assets/js/dataTables.bootstrap.js"></script>
	<script src="<?php echo $settingUrl->baseUrl(); ?>assets/js/chosen.jquery.js" type="text/javascript"></script>
    <script src="<?php echo $settingUrl->baseUrl(); ?>assets/js/init.js" type="text/javascript" charset="utf-8"></script>
	<script>
		$(document).ready(function(){
			$("#tanggal").datepicker({
				dateFormat:"d/m/yy"
			});
			$("#dataTables").DataTable();
			
			//fungsi autocomplete
			$("#namalengkap").autocomplete({
				minLength: 3,
				source: 
				function(req, add){
					$.ajax({
						url: "<?php echo $settingUrl->siteUrl('admin/biodata/getnama'); ?>",
						dataType: 'json',
						type: 'POST',
						data: req,
						success:    
						function(data){
							if(data.response =="true"){
								add(data.message);								
							}
						},
					});
				}
			});
			
			<?php for($i=1; $i<=3; $i++){ ?>
			$("#namabantuan<?php echo $i; ?>").autocomplete({
				minLength: 3,
				source: 
				function(req, add){
					$.ajax({
						url: "<?php echo $settingUrl->siteUrl('admin/bantuan/getnama'); ?>",
						dataType: 'json',
						type: 'POST',
						data: req,
						success:    
						function(data){
							if(data.response =="true"){
								add(data.message);								
							}
						},
					});
				}
			});
			<?php } ?>
			
			$("#kebutuhanmendesak").autocomplete({
				minLength: 3,
				source: 
				function(req, add){
					$.ajax({
						url: "<?php echo $settingUrl->siteUrl('admin/kebutuhan/getnama'); ?>",
						dataType: 'json',
						type: 'POST',
						data: req,
						success:    
						function(data){
							if(data.response =="true"){
								add(data.message);								
							}
						},
					});
				}
			});
			
		});
	</script>
  </body>

</html>
