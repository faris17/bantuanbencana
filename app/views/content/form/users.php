<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			<h1 class="my-4"><?php echo $title ; ?> Users</h1>
		<?php $this->output('notifikasi'); ?>
		<div class="col-md-8">
			<?php if(isset($edit)) { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/users/edit'); ?>" method="post">
			<?php } else { ?>
			<form class="form-horizontal" class="form-control" action="<?php echo $settingUrl->siteUrl('admin/users/add'); ?>" method="post">	
			<?php } ?>
			
			  <div class="control-group">
				<label class="control-label" for="inputText">Username</label>
				<div class="controls">
				  <input class="form-control" name="username" type="text" id="inputText" placeholder="Username" value="<?php if(isset($user->username))echo $user->username; ?>">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				  <input class="form-control" name="password" type="password" id="inputPassword" placeholder="Password" value="">
				  <?php if(isset($user->password) and $user->password !="") {  ?>
				  <span>Biarkan Kosong bila tidak ingin mengganti password</span>
				  <?php } ?>
				  
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputForm">Level</label>
				<div class="controls">
				  <select class="form-control" name="level">
					<option value="admin" <?php if(isset($user->level) and $user->level =="admin") echo "selected='selected'"; ?>>
					Admin</option>
					<option value="petugas" <?php if(isset($user->level) and $user->level =="petugas") echo "selected='selected'"; ?>>
					Petugas</option>
				   </select>
				</div>
			  </div>
			  <br>
			  <div class="control-group">
				<?php if(isset($edit)){ ?>
				  <input type="hidden" name="id" value="<?php if(isset($user->idusers)) echo $user->idusers; ?>">
				  <button type="submit" name="update" value="Update" class="btn btn-info">Update</button>
				<?php } 
				 else { ?>
					<button type="submit" name="save" value="Save" class="btn btn-info">Save</button> 
				<?php  }
				?>
				
			  </div>
			</form>
		</div>
</div>
<?php $this->output('tampilan/rightmenu'); ?>