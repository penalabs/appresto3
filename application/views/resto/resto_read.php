
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA RESTO</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Resto</td>
				<td><?php echo $nama_resto; ?></td>
			</tr>
	
			<tr>
				<td>Alamat Resto</td>
				<td><?php echo $alamat_resto; ?></td>
			</tr>
	
			<tr>
				<td>Telp Resto</td>
				<td><?php echo $telp_resto; ?></td>
			</tr>
	
			<tr>
				<td>Kanwil Id</td>
				<td><?php echo $kanwil_id; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('resto') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>