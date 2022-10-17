
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PENYUSUTAN_INVESTASI</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nominal</td>
				<td><?php echo $nominal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Investasi Id</td>
				<td><?php echo $investasi_id; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('penyusutan_investasi') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>