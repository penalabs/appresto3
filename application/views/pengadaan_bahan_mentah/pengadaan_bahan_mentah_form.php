<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PENGADAAN_BAHAN_MENTAH</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td>
					</tr>
	
					
					<tr>
						<td width='200'>Bahan Mentah Id <?php echo form_error('bahan_mentah_id') ?></td>
						<td>
						<?php echo cmb_dinamis('bahan_mentah_id', 'bahan_mentah', 'nama_bahan', 'bahan_mentah_id', $bahan_mentah_id,'DESC') ?>

						</td>
					</tr>

	
					<tr>
						<td><input type="hidden" class="form-control" name="id_users_logistik" id="id_users_logistik" placeholder="Id Users Logistik" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
					
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="pengadaan_bahan_mentah_id" value="<?php echo $pengadaan_bahan_mentah_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pengadaan_bahan_mentah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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