
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PENGIRIMAN_BAHAN_OLAHAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Jumlah</td>
				<td><?php echo $jumlah; ?></td>
			</tr>
	
			<tr>
				<td>Bahan Olahan Id</td>
				<td><?php echo $bahan_olahan_id; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Logistik</td>
				<td><?php echo $id_users_logistik; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Produksi</td>
				<td><?php echo $id_users_produksi; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('permintaan_bahan_olahan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>