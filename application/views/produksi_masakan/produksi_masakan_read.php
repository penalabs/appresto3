
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PRODUKSI_MASAKAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Bahan Olahan Id</td>
				<td><?php echo $bahan_olahan_id; ?></td>
			</tr>
	
			<tr>
				<td>Jumlah Bahan</td>
				<td><?php echo $jumlah_bahan; ?></td>
			</tr>
	
			<tr>
				<td>Detail Pemesanan Masakan Id</td>
				<td><?php echo $detail_pemesanan_masakan_id; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('produksi_masakan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>