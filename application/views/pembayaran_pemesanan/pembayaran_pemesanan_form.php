<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PEMBAYARAN_PEMESANAN</h3>
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
						<td><input type="hidden" class="form-control" name="pemesanan_masakan_id" id="pemesanan_masakan_id" placeholder="Pemesanan Masakan Id" value="<?php echo $this->session->userdata('pemesanan_masakan_id'); ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Kasir <?php echo form_error('id_users_kasir') ?></td>
						<td>
						<?php echo cmb_dinamis_user('id_users_kasir', 'tbl_user','kasir', 'full_name', 'id_users', $id_users_kasir,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="pembayaran_pemesanan_id" value="<?php echo $pembayaran_pemesanan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pembayaran_pemesanan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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