<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			
			
			<h1 class="my-4"><?php echo $title ; ?> Biodata</h1>
			<a href="<?php echo $settingUrl->siteUrl('admin/biodata'); ?>">
			<-Back</a>
			<?php $this->output('notifikasi'); ?>
		<div class="col-md-8">
			<?php if(isset($edit)) { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/biodata/edit'); ?>" method="post" enctype="multipart/form-data" >
			<?php } else { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/biodata/add'); ?>" method="post" enctype="multipart/form-data" >	
			<?php } 
			//munculkan foto
			if(isset($row->foto)){ 
			?>
			<img src="<?php echo "/bantuan/upload/$row->foto"; ?>" width="300px" height="200px" />
			<?php } ?>
		
			  <div class="control-group">
				<label class="control-label" for="inputText">Nama Lengkap</label>
				<div class="controls">
				  <input class="form-control" name="nama" type="text" id="inputText" placeholder="Nama Lengkap" value="<?php if(isset($row->namalengkap))echo $row->namalengkap; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Tempat Lahir</label>
				<div class="controls">
				  <input class="form-control" name="tempatlahir" type="text" id="tempatlahir" placeholder="Tempat Lahir" value="<?php if(isset($row->tempatlahir))echo $row->tempatlahir; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Tanggal Lahir</label>
				<div class="controls">
				  <input class="form-control" name="tanggallahir" type="text" id="tanggal" placeholder="D-M-YYY" value="<?php if(isset($row->tanggallahir))echo $row->tanggallahir; ?>">
				</div>
			  </div>
			   <div class="control-group"><br>
				<label class="control-label" for="inputForm">Status</label>
				  <label  class="radio">
				  <input name="status" type="radio" value="married" <?php if(isset($row->status) and $row->status =="married") echo "checked='checked'"; ?> />      Menikah
				  </label>
				
				  <label class="radio">
				  <input name="status" type="radio" value="single" <?php if(isset($row->status) and $row->status =="single") echo "checked='checked'"; ?> /> Lajang
				  </label>
			  </div>
			  <div class="control-group"><br>
				<label class="control-label" for="inputForm">Gender</label>
				 <label  class="radio">
				  <input name="jk" type="radio" value="laki" <?php if(isset($row->jk) and $row->jk =="laki") echo "checked='checked'"; ?> />      Laki-Laki
				  </label>
				
				  <label class="radio">
				  <input name="jk" type="radio" value="wanita" <?php if(isset($row->jk) and $row->jk =="wanita") echo "checked='checked'"; ?> /> Wanita
				  </label>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Jumlah Keluarga</label>
				  <input class="form-control" name="jumlahkeluarga" type="number" id="jumlahkeluarga" placeholder="" value="<?php if(isset($row->jumlahkeluarga))echo $row->jumlahkeluarga; ?>">
			  </div>
			   <div class="control-group">
				<label class="control-label" for="inputText">Foto</label>
				<div class="controls">
				  <input class="form-control" name="file" type="file" id="file" placeholder="">
				</div>
			  </div>
			   <div class="control-group">
				<label class="control-label" for="inputText">Keterangan</label>
				<div class="controls">
<textarea class="form-control" name="keterangan">
</textarea>
				</div>
			  </div>
			  <br>
			  <div class="control-group">
				<?php if(isset($edit)){ ?>
				  <input type="hidden" name="id" value="<?php if(isset($row->idbiodata)) echo $row->idbiodata; ?>">
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