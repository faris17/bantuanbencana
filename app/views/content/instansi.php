<?php $this->output('tampilan/header'); ?>
 <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
		<h1 class="my-4">Data Instansi</h1>
			<?php $this->output('notifikasi'); ?>
			<a href="<?php echo $settingUrl->siteUrl('admin/instansi/add'); ?>">
			<button class="btn btn-info">Tambah</button></a>
			
			<div class="col-md-12" style="padding-top:20px">
			 <table class="table" id="dataTables">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Instansi</th>
					<th>Alamat Instansi</th>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<th>Action</th>";
					} ?>
				</tr>	
			</thead>
			<tbody>
				<?php $no=1; 
				if($instansi !=""){
				foreach($instansi as $row){ ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->namainstansi; ?></td>
					<td><?php echo $row->alamatinstansi; ?></td>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<td><a href='/bantuan/public/index.php/admin/instansi/edit/$row->idinstansi'><button class='btn btn-info' type='button' style='width:80px'><i class='icon-pencil'></i> Edit </button></a>";
					echo " <a href='/bantuan/public/index.php/admin/instansi/delete/$row->idinstansi' onclick='return confirm(ingin delete ?)'><button class='btn btn-danger' type='button' style='width:80px'><i class='icon-trash' ></i> Delete </button></a></td>";
					} ?>
				</tr>
				<?php }} ?>
			</tbody>
		 </table>
		</div>
			
		</div>
		
<?php $this->output('tampilan/rightmenu'); ?>