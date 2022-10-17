<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA BIAYA_OPERASIONAL_CABANG</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Catatan Biaya <?php echo form_error('catatan_biaya') ?></td><td><input type="text" class="form-control" name="catatan_biaya" id="catatan_biaya" placeholder="Catatan Biaya" value="<?php echo $catatan_biaya; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nominal <?php echo form_error('nominal') ?></td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" /></td>
					</tr>
	

	
					<tr>
						<td width='200'>Id Users Bendahara <?php echo form_error('id_users_bendahara') ?></td>
						<td>
						<?php echo cmb_dinamis_investasi_user('id_users_bendahara', 'tbl_user','bendahara', 'full_name', 'id_users', $id_users_bendahara,'DESC') ?>

						</td>
					</tr>

					<tr>
						<td width='200'>Id Users Adminresto <?php echo form_error('id_users_adminresto') ?></td>
						<td>
						<?php echo cmb_dinamis_investasi_user('id_users_adminresto', 'tbl_user','adminresto', 'full_name', 'id_users', $id_users_adminresto,'DESC') ?>

						</td>
					</tr>
					
					<tr>
						<td width='200'>Resto Id <?php echo form_error('resto_id') ?></td>
						<td><?php echo cmb_dinamis('resto_id', 'resto', 'nama_resto', 'resto_id', $resto_id,'DESC') ?>
						</td>
					</tr>
					
	
					<tr>
						<td width='200'>Kas Id <?php echo form_error('kas_id') ?></td>
						<td><?php echo cmb_dinamis('kas_id', 'kas', 'nama_kas', 'kas_id', $kas_id,'DESC') ?>
						</td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="belum diberikan"/></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="biaya_operasional_id" value="<?php echo $biaya_operasional_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pemberian_biaya_operasional_cabang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>
<script>
$('#tanggal').datetimepicker({
    format: 'YYYY-MM-DD hh:mm:ss'
});
</script>