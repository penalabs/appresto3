
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PERALATAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Peralatan</td>
				<td><?php echo $nama_peralatan; ?></td>
			</tr>
	
			<tr>
				<td>Stok</td>
				<td><?php echo $stok; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('peralatan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>