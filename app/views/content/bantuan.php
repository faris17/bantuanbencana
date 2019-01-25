<?php $this->output('tampilan/header'); ?>
 <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
		<h1 class="my-4">Data bantuan</h1>
			<?php $this->output('notifikasi'); ?>
			<a href="<?php echo $settingUrl->siteUrl('admin/bantuan/add'); ?>">
			<button class="btn btn-info">Tambah</button></a>
			
			<div class="col-md-12" style="padding-top:20px">
			 <table class="table" id="dataTables">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Bantuan</th>
					<th>Nama Bantuan</th>
					<th>Tanggal Bantuan</th>
					<th>Keterangan</th>
					<th>Instansi</th>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<th>Action</th>";
					} ?>
				</tr>	
			</thead>
			<tbody>
				<?php $no=1; 
				if($bantuan !=""){
				foreach($bantuan as $row){ ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->kodebantuan; ?></td>
					<td><?php echo $row->namabantuan; ?></td>
					<td><?php echo $row->tanggalbantuan; ?></td>
					<td><?php echo $row->keterangan; ?></td>
					<td><?php echo $row->namainstansi; ?></td>
					<?php if($this->session->getValue('level')=='admin'){
					echo "<td><a href='/bantuan/public/index.php/admin/bantuan/edit/$row->idbantuan'><button class='btn btn-info' type='button' style='width:80px'><i class='icon-pencil'></i> Edit </button></a>";
					echo " <a href='/bantuan/public/index.php/admin/bantuan/delete/$row->idbantuan' onclick='return confirm(ingin delete ?)'><button class='btn btn-danger' type='button' style='width:80px'><i class='icon-trash' ></i> Delete </button></a></td>";
					} ?>
				</tr>
				<?php }} ?>
			</tbody>
		 </table>
		</div>
			
		</div>
		
<?php $this->output('tampilan/rightmenu'); ?>