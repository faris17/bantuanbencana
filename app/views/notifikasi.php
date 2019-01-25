<?php
if($this->session->getValue('success')){ ?>
	<div class='alert alert-success'> 
	<button class="close" data-dismiss="alert">×</button>
	<h4 class='alert-heading'>Success!</h4>
	 <span><?php echo $this->session->getValue('success'); ?></span>. </div>
	 <?php echo $this->session->deleteValue('success'); ?>
<?php } 
if ($this->session->getValue('error')){ ?>
<div class="alert alert-error">
  <button class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong> Terjadi Kesalahan.
</div>
<?php } ?>