<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA SETORAN_KASIR</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nominal <?php echo form_error('nominal') ?></td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Bendahara <?php echo form_error('id_users_bendahara') ?></td>
						<td>
						<?php $where = array('tbl_user_level.nama_level' => 'bendahara');?>
						<?php echo cmb_dinamis_user('id_users_bendahara', 'tbl_user','bendahara', 'full_name', 'id_users', $id_users_bendahara,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Kasir <?php echo form_error('id_users_kasir') ?></td>
						<td>
						<?php $where = array('tbl_user_level.nama_level' => 'kasir');?>
						<?php echo cmb_dinamis_user('id_users_kasir', 'tbl_user','kasir', 'full_name', 'id_users', $id_users_kasir,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="setoran_id" value="<?php echo $setoran_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('setoran_kasir') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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