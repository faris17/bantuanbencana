<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
		<h1 class="my-4">Akun Users</h1>
			<?php $this->output('notifikasi'); ?>
			<a href="<?php echo $settingUrl->siteUrl('admin/users/add'); ?>">Tambah</a>
		<div class="col-md-12">
			 <table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<th>Action</th>";
					} ?>
				</tr>	
			</thead>
			<tbody>
				<?php $no=1; 
				
				foreach($user as $row){ ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->username; ?></td>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<td><a href='/bantuan/public/index.php/admin/users/edit/$row->idusers'><button class='btn btn-info' type='button'><i class='icon-pencil'></i> Edit </button></a>";
					echo " <a href='/bantuan/public/index.php/admin/users/delete/$row->idusers' onclick='return confirm(ingin delete ?)'><button class='btn btn-danger' type='button'><i class='icon-trash'></i> Delete </button></a></td>";
					} ?>
				</tr>
				<?php } ?>
			</tbody>
		 </table>
		</div>
</div>
<?php $this->output('tampilan/rightmenu'); ?>