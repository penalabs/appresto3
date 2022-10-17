
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PENGADAAN_BAHAN_MENTAH</h3>
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
				<td>Bahan Mentah Id</td>
				<td><?php echo $bahan_mentah_id; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Logistik</td>
				<td><?php echo $id_users_logistik; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('pengadaan_bahan_mentah') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>