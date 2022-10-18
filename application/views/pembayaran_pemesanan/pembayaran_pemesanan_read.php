
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PEMBAYARAN_PEMESANAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Nominal</td>
				<td><?php echo $nominal; ?></td>
			</tr>
	
			<tr>
				<td>Pemesanan Masakan Id</td>
				<td><?php echo $pemesanan_masakan_id; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Kasir</td>
				<td><?php echo $id_users_kasir; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('pembayaran_pemesanan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>