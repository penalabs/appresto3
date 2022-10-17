
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA MENU_MASAKAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Masakan</td>
				<td><?php echo $nama_masakan; ?></td>
			</tr>
	
			<tr>
				<td>Stok</td>
				<td><?php echo $stok; ?></td>
			</tr>
	
			<tr>
				<td>Gambar</td>
				<td><?php echo $gambar; ?></td>
			</tr>
	
			<tr>
				<td>Harga</td>
				<td><?php echo $harga; ?></td>
			</tr>
	
			<tr>
				<td>Id Users</td>
				<td><?php echo $id_users; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('menu_masakan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>