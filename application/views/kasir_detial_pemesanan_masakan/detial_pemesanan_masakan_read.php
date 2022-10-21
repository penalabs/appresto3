
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA DETIAL_PEMESANAN_MASAKAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Pemesanan Masakan Id</td>
				<td><?php echo $pemesanan_masakan_id; ?></td>
			</tr>
	
			<tr>
				<td>Menu Masakan Id</td>
				<td><?php echo $menu_masakan_id; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Harga</td>
				<td><?php echo $harga; ?></td>
			</tr>
	
			<tr>
				<td>Jumlah Pesan</td>
				<td><?php echo $jumlah_pesan; ?></td>
			</tr>
	
			<tr>
				<td>Subtotal</td>
				<td><?php echo $subtotal; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('kasir_detial_pemesanan_masakan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>