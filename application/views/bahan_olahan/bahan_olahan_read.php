
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA BAHAN_OLAHAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Bahan</td>
				<td><?php echo $nama_bahan; ?></td>
			</tr>
	
			<tr>
				<td>Satuan</td>
				<td><?php echo $satuan; ?></td>
			</tr>
	
			<tr>
				<td>Stok</td>
				<td><?php echo $stok; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('bahan_olahan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>