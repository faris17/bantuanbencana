<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			
			
			<h1 class="my-4"><?php echo $title ; ?> Bantuan</h1>
			<a href="<?php echo $settingUrl->siteUrl('admin/bantuan'); ?>">
			<-Back</a>
			<?php $this->output('notifikasi'); ?>
		<div class="col-md-8">
			<?php if(isset($edit)) { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/bantuan/edit'); ?>" method="post" enctype="multipart/form-data" >
			<?php } else { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/bantuan/add'); ?>" method="post" enctype="multipart/form-data" >	
			<?php } 
			//munculkan foto
			if(isset($row->foto)){ 
			?>
			<img src="<?php echo "/bantuan/upload/$row->foto"; ?>" width="300px" height="200px" />
			<?php } ?>
		
			  <div class="control-group">
				<label class="control-label" for="inputText">Kode Bantuan</label>
				<div class="controls">
				  <input class="form-control" name="kode" type="text" id="inputText" placeholder="Kode Bantuan" value="<?php if(isset($row->kodebantuan))echo $row->kodebantuan; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Nama Bantuan</label>
				<div class="controls">
				  <input class="form-control" name="namabantuan" type="text" id="tempatlahir" placeholder="Nama Bantuan" value="<?php if(isset($row->namabantuan))echo $row->namabantuan; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Tanggal Bantuan</label>
				<div class="controls">
				  <input class="form-control" name="tanggalbantuan" type="text" id="tanggal" placeholder="D-M-YYY" value="<?php if(isset($row->tanggalbantuan))echo $row->tanggalbantuan; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Instansi</label>
				<div class="controls">
				  <select name="instansi" class="form-control">
				  <?php foreach($instansi as $ins){ ?>
					<option <?php if(isset($row->instansi_idinstansi)and $ins->idinstansi==$row->instansi_idinstansi) echo "selected='selected'"; ?> value="<?php echo $ins->idinstansi;?>"><?php echo $ins->namainstansi; ?></option>
				  <?php } ?>
				  </select>
				</div>
			  </div>
			   <div class="control-group">
				<label class="control-label" for="inputText">Jumlah Bantuan</label>
				<div class="controls">
				  <input class="form-control" name="jumlahbantuan" type="text" id="jumlahbantuan" placeholder="Jumlah Bantuan" value="<?php if(isset($row->jumlahbantuan))echo $row->jumlahbantuan; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Satuan</label>
				<div class="controls">
				  <input class="form-control" name="satuan" type="text" id="satuan" placeholder="satuan" value="<?php if(isset($row->satuan))echo $row->satuan; ?>">
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
				  <input type="hidden" name="id" value="<?php if(isset($row->idbantuan)) echo $row->idbantuan; ?>">
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