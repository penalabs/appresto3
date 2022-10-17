<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PENGADAAN_PERALATAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Peralatan Id <?php echo form_error('peralatan_id') ?></td>
						<td>
						<?php echo cmb_dinamis('peralatan_id', 'peralatan', 'nama_peralatan', 'peralatan_id', $peralatan_id,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="id_users_logistik" id="id_users_logistik" placeholder="Id Users Logistik" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="pengadaan_peralatan_id" value="<?php echo $pengadaan_peralatan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pengadaan_peralatan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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