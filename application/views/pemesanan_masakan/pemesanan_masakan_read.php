
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PEMESANAN_MASAKAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>No Antrian</td>
				<td><?php echo $no_antrian; ?></td>
			</tr>
	
			<tr>
				<td>Nama Pembeli</td>
				<td><?php echo $nama_pembeli; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Waiter</td>
				<td><?php echo $id_users_waiter; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('pemesanan_masakan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>