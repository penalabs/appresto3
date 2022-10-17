
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA INVESTOR</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Investor</td>
				<td><?php echo $nama_investor; ?></td>
			</tr>
	
			<tr>
				<td>Alamat Investor</td>
				<td><?php echo $alamat_investor; ?></td>
			</tr>
	
			<tr>
				<td>Telp Investor</td>
				<td><?php echo $telp_investor; ?></td>
			</tr>
	
			<tr>
				<td>Id Users Owner</td>
				<td><?php echo $id_users_owner; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('investor') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>