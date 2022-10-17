<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA INVESTOR</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Investor <?php echo form_error('nama_investor') ?></td><td><input type="text" class="form-control" name="nama_investor" id="nama_investor" placeholder="Nama Investor" value="<?php echo $nama_investor; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alamat Investor <?php echo form_error('alamat_investor') ?></td><td><input type="text" class="form-control" name="alamat_investor" id="alamat_investor" placeholder="Alamat Investor" value="<?php echo $alamat_investor; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Telp Investor <?php echo form_error('telp_investor') ?></td><td><input type="text" class="form-control" name="telp_investor" id="telp_investor" placeholder="Telp Investor" value="<?php echo $telp_investor; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Owner <?php echo form_error('id_users_owner') ?></td>
						<td>
						<?php echo cmb_dinamis_user('id_users_owner', 'tbl_user','owner', 'full_name', 'id_users', $id_users_owner,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="investor_id" value="<?php echo $investor_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('investor') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>