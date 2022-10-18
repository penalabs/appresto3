<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA MENU_MASAKAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Masakan <?php echo form_error('nama_masakan') ?></td><td><input type="text" class="form-control" name="nama_masakan" id="nama_masakan" placeholder="Nama Masakan" value="<?php echo $nama_masakan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Stok <?php echo form_error('stok') ?></td><td><input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Gambar <?php echo form_error('gambar') ?></td><td>
							<input type="file" class="form-control" name="gambar" id="gambar" />
						</td>
					</tr>
	
					<tr>
						<td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="menu_masakan_id" value="<?php echo $menu_masakan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('menu_masakan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>