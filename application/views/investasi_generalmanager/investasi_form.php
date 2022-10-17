<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA INVESTASI</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Investasi <?php echo form_error('nama_investasi') ?></td><td><input type="text" class="form-control" name="nama_investasi" id="nama_investasi" placeholder="Nama Investasi" value="<?php echo $nama_investasi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nominal <?php echo form_error('nominal') ?></td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Masa Pemanfaatan <?php echo form_error('masa_pemanfaatan') ?></td><td><input type="text" class="form-control" name="masa_pemanfaatan" id="masa_pemanfaatan" placeholder="Masa pemanfaatan" value="<?php echo $masa_pemanfaatan; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Kas Id <?php echo form_error('kas_id') ?></td>
						<td><?php echo cmb_dinamis('kas_id', 'kas', 'nama_kas', 'kas_id', $kas_id,'DESC') ?>
						</td>
					</tr>
					<tr>
						<td width='200'>Id Users Bendahara <?php echo form_error('id_users_bendahara') ?></td>
						<td>
						<?php $where = array('tbl_user_level.nama_level' => 'bendahara');?>
						<?php echo cmb_dinamis_investasi_user('id_users_bendahara', 'tbl_user','bendahara', 'full_name', 'id_users', $id_users_bendahara,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Generalmaanager <?php echo form_error('id_users_generalmaanager') ?></td>
						<td>

						<?php echo cmb_dinamis_investasi_user('id_users_generalmaanager', 'tbl_user','generalmanager', 'full_name', 'id_users', $id_users_generalmaanager,'DESC') ?>

							
						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="investasi_id" value="<?php echo $investasi_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('investasi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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