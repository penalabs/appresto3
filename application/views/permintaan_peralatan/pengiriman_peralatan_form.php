<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PENGIRIMAN_PERALATAN</h3>
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
						<td width='200'>Peralatan Id <?php echo form_error('peralatan_id') ?></td>
						<td>
						<?php echo cmb_dinamis('peralatan_id', 'peralatan', 'nama_peralatan', 'peralatan_id', $peralatan_id,'DESC') ?>

						</td>
					</tr>
	

					<tr>
						<td width='200'>Id Users Logistik <?php echo form_error('id_users_logistik') ?></td>
						<td>
						<?php echo cmb_dinamis_user('id_users_logistik', 'tbl_user','logistik', 'full_name', 'id_users', $id_users_logistik,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td><input type="text" class="form-control" name="id_users_adminresto" id="id_users_adminresto" placeholder="Id Users Adminresto" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="pengiriman_peralatan_id" value="<?php echo $pengiriman_peralatan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('permintaan_peralatan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>