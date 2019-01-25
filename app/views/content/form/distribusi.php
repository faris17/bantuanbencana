<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			<h1 class="my-4"><?php echo $title ; ?> Pendistribusian Bantuan</h1>
			<a href="<?php echo $settingUrl->siteUrl('admin/distribusi'); ?>">
			<-Back</a>
			<?php $this->output('notifikasi'); ?>
		<div class="col-md-8">
			<?php if(isset($edit)) { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/distribusi/edit'); ?>" method="post" enctype="multipart/form-data" >
			<?php } else { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/distribusi/add'); ?>" method="post" enctype="multipart/form-data" >	
			<?php } ?>
		
			  <div class="control-group">
				<label class="control-label" for="inputText">Tanggal</label>
				<div class="controls">
				  <input class="form-control" name="tanggal" type="text" id="tanggal" value="<?php if(isset($row->tanggaldistribusi))echo $row->tanggaldistribusi; else { echo date('d/m/Y',strtotime(date('Y-m-d')));}?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Nama Penerima Bantuan</label>
				<div class="controls">
				  <input class="form-control" name="namalengkap" type="text" id="namalengkap" value="<?php if(isset($row->namalengkap))echo $row->namalengkap; ?>">
				</div>
			  </div>
			  <div id="getnamabantuan">
			  <div class="control-group">
				<label class="control-label" for="inputText">Bantuan Pertama</label>
				<div class="controls">
				   <input  name="bantuan_1" type="text" id="namabantuan1" value="<?php if(isset($row->namabantuan))echo $row->namabantuan; ?>">
				   <input name="jumlahdistribusi1" type="number"  min='1'  value='1' >
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Bantuan Kedua</label>
				<div class="controls">
				   <input name="bantuan_2" type="text" id="namabantuan2" value="<?php if(isset($row->namabantuan))echo $row->namabantuan; ?>">
				   <input name="jumlahdistribusi2" type="number"  min='1'  value='1' >
				</div>
			  </div>
			   <div class="control-group">
				<label class="control-label" for="inputText">Bantuan Ketiga</label>
				<div class="controls">
				   <input name="bantuan_3" type="text" id="namabantuan3" value="<?php if(isset($row->namabantuan))echo $row->namabantuan; ?>">
				   <input name="jumlahdistribusi3" type="number" min='1' value='1' >
				</div>
			  </div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputText">Kebutuhan Mendesak </label>
				<div class="controls">
				   <input class="form-control" name="kebutuhanmendesak" type="text" id="kebutuhanmendesak" value="<?php if(isset($row->namakebutuhan))echo $row->kebutuhanmendesak; ?>">
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
				  <input type="hidden" name="id" value="<?php if(isset($row->distribusi)) echo $row->distribusi; ?>">
				  <button type="submit" name="update" value="Update" class="btn btn-info">Update</button>
				<?php } 
				 else { ?>
					<button type="submit" name="save" value="Save" class="btn btn-info">Save</button> 
				<?php }
				?>
			</div>
			</form>
		</div><br>
</div>
<?php $this->output('tampilan/rightmenu'); ?>