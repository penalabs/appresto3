<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PEMESANAN_MASAKAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>No Antrian <?php echo form_error('no_antrian') ?></td><td><input type="text" class="form-control" name="no_antrian" id="no_antrian" placeholder="No Antrian" value="<?php echo $no_antrian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Pembeli <?php echo form_error('nama_pembeli') ?></td><td><input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" placeholder="Nama Pembeli" value="<?php echo $nama_pembeli; ?>" /></td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="id_users_waiter" id="id_users_waiter" placeholder="Id Users Waiter" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="pemesanan_maakan_id" value="<?php echo $pemesanan_maakan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pemesanan_masakan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>