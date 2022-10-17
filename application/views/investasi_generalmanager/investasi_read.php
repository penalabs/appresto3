
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA INVESTASI</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Investasi</td>
				<td><?php echo $nama_investasi; ?></td>
			</tr>
	
			<tr>
				<td>Nominal</td>
				<td><?php echo $nominal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Bendahara</td>
				<td><?php echo $id_users_bendahara; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Generalmaanager</td>
				<td><?php echo $id_users_generalmaanager; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('investasi') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>