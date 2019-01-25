<?php $this->output('tampilan/header'); ?>
<script>
	$(function(){
		
		$("#keluarga").autocomplete({
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
	});
	
</script>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			
			
			<h1 class="my-4"><?php echo $title ; ?> Kebutuhan</h1>
			<a href="<?php echo $settingUrl->siteUrl('admin/kebutuhan'); ?>">
			<-Back</a>
			<?php $this->output('notifikasi'); ?>
		<div class="col-md-8">
			<?php if(isset($edit)) { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/kebutuhan/edit'); ?>" method="post" enctype="multipart/form-data" >
			<?php } else { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/kebutuhan/add'); ?>" method="post" enctype="multipart/form-data" >	
			<?php } ?>
		
			  <div class="control-group">
				<label class="control-label" for="inputText">Nama Kebutuhan</label>
				<div class="controls">
				  <input class="form-control" name="namakebutuhan" type="text" id="namakebutuhan" placeholder="Nama Kebutuhan" value="<?php if(isset($row->namakebutuhan))echo $row->namakebutuhan; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Terpenuhi</label>
				<div class="controls">
				  <select name="terpenuhi" class="form-control">
					<option <?php if(isset($row->terpenuhi)and $row->terpenuhi=='ya') echo "selected='selected'"; ?> value="ya">Iya</option>
					<option <?php if(isset($row->terpenuhi)and $row->terpenuhi=='tidak') echo "selected='selected'"; ?> value="tidak">Tidak</option>
					<option <?php if(isset($row->terpenuhi)and $row->terpenuhi=='Kurang') echo "selected='selected'"; ?> value="kurang">Kurang</option>
				  </select>
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Tanggal Terbantunya</label>
				<div class="controls">
				  <input class="form-control" name="tanggalterbantunya" type="text" id="tanggal" placeholder="D-M-YYY" value="<?php if(isset($row->tanggalterbantunya))echo $row->tanggalterbantunya; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Nama Keluarga Yang Menerima Bantuan</label>
				<div class="controls">
				  <input  class="form-control" name="namakeluarga" type="text" id="keluarga" placeholder="Nama Keluarga" value="<?php if(isset($row->namalengkap))echo $row->namalengkap; ?>" />
				</div>
			  </div>
			   <div class="control-group">
				<label class="control-label" for="inputText">Keterangan</label>
				<div class="controls">
<textarea class="form-control" name="keterangan">
<?php if(isset($row->keterangan)) echo $row->keterangan;?>
</textarea>
				</div>
			  </div>
			  <br>
			  <div class="control-group">
				<?php if(isset($edit)){ ?>
				  <input type="hidden" name="id" value="<?php if(isset($row->idkebutuhanmendesak)) echo $row->idkebutuhanmendesak; ?>">
				  <button type="submit" name="update" value="Update" class="btn btn-info">Update</button>
				<?php } 
				 else { ?>
					<button type="submit" name="save" value="Save" class="btn btn-info">Save</button> 
				<?php  }
				?>
				
			</div>
			</form>
		</div><br>
</div>
<?php $this->output('tampilan/rightmenu'); ?>