
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PENGIRIMAN_PERALATAN</h3>
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
				<td>Peralatan Id</td>
				<td><?php echo $peralatan_id; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Logistik</td>
				<td><?php echo $id_users_logistik; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Adminresto</td>
				<td><?php echo $id_users_adminresto; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('pengiriman_peralatan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>