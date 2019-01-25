<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			
			
			<h1 class="my-4"><?php echo $title ; ?> instansi</h1>
			<a href="<?php echo $settingUrl->siteUrl('admin/instansi'); ?>">
			<-Back</a>
			<?php $this->output('notifikasi'); ?>
		<div class="col-md-8">
			<?php if(isset($edit)) { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/instansi/edit'); ?>" method="post">
			<?php } else { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/instansi/add'); ?>" method="post" >	
			<?php } 
			//munculkan foto
			if(isset($row->foto)){ 
			?>
			<img src="<?php echo "/bantuan/upload/$row->foto"; ?>" width="300px" height="200px" />
			<?php } ?>
		
			  <div class="control-group">
				<label class="control-label" for="inputText">Nama Instansi</label>
				<div class="controls">
				  <input class="form-control" name="namainstansi" type="text" id="namainstansi" placeholder="Nama Instansi" value="<?php if(isset($row->namainstansi))echo $row->namainstansi; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Alamat Instansi</label>
				<div class="controls">
				  <input class="form-control" name="alamatinstansi" type="text" id="alamatinstansi" placeholder="Alamat Instansi" value="<?php if(isset($row->alamatinstansi))echo $row->alamatinstansi; ?>">
				</div>
			  </div>
			  
			  <br>
			  <div class="control-group">
				<?php if(isset($edit)){ ?>
				  <input type="hidden" name="idinstansi" value="<?php if(isset($row->idinstansi)) echo $row->idinstansi; ?>">
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