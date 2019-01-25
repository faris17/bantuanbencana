<?php $this->output('tampilan/header'); ?>
 <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
		<br>
		<a href="<?php echo $settingUrl->siteUrl('admin/distribusi/add'); ?>">
			<button class='btn btn-primary'>Tambah</button>
		</a>
		<h1 class="my-4">Data Distribusi</h1>
			<div class="col-md-12" style="padding-top:20px">
			<table class="table" id="dataTables">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kebutuhan</th>
					<th>Terpenuhi</th>
					<th>Tanggal Terbantu ?</th>
					<th>Keluarga</th>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<th>Action</th>";
					} ?>
				</tr>	
			</thead>
			<tbody>
				<?php $no=1; 
				if($kebutuhan !=""){
				foreach($kebutuhan as $row){ ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->namakebutuhan; ?></td>
					<td><?php echo $row->terpenuhi; ?></td>
					<td><?php echo date('d-m-Y',strtotime($row->tanggalterbantunya)); ?></td>
					<td><?php echo $row->namalengkap; ?></td>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<td><a href='/bantuan/public/index.php/admin/kebutuhan/edit/$row->idkebutuhanmendesak'><button class='btn btn-info' type='button' style='width:80px'><i class='icon-pencil'></i> Edit </button></a>";
					echo " <a href='/bantuan/public/index.php/admin/kebutuhan/delete/$row->idkebutuhanmendesak' onclick='return confirm(ingin delete ?)'><button class='btn btn-danger' type='button' style='width:80px'><i class='icon-trash' ></i> Delete </button></a></td>";
					} ?>
				</tr>
				<?php }} ?>
			</tbody>
			</table>
			</div>
		</div>
		
<?php $this->output('tampilan/rightmenu'); ?>