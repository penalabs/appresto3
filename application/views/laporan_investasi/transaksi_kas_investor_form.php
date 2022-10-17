<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TRANSAKSI_KAS_INVESTOR</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nominal <?php echo form_error('nominal') ?></td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" /></td>
					</tr>
	

					<tr>
						<td width='200'>Id Users <?php echo form_error('id_users') ?></td>
						<td>
						<?php echo cmb_dinamis_user('id_users', 'tbl_user','superadmin','full_name', 'id_users', $id_users,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="investor_id" id="investor_id" placeholder="Investor Id" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
					

					<tr>
						<td width='200'>Kas Id <?php echo form_error('kas_id') ?></td>
						<td>
						<?php echo cmb_dinamis('kas_id', 'kas','nama_kas', 'kas_id', $kas_id,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('laporan_investasi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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