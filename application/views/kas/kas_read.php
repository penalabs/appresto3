
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA KAS</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Kas</td>
				<td><?php echo $nama_kas; ?></td>
			</tr>
	
			<tr>
				<td>Saldo</td>
				<td><?php echo $saldo; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('kas') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>