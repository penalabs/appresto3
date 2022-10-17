<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KANWIL</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Kanwil <?php echo form_error('nama_kanwil') ?></td><td><input type="text" class="form-control" name="nama_kanwil" id="nama_kanwil" placeholder="Nama Kanwil" value="<?php echo $nama_kanwil; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alamat Kanwil <?php echo form_error('alamat_kanwil') ?></td><td><input type="text" class="form-control" name="alamat_kanwil" id="alamat_kanwil" placeholder="Alamat Kanwil" value="<?php echo $alamat_kanwil; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Telp Kanwil <?php echo form_error('telp_kanwil') ?></td><td><input type="text" class="form-control" name="telp_kanwil" id="telp_kanwil" placeholder="Telp Kanwil" value="<?php echo $telp_kanwil; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="kanwil_id" value="<?php echo $kanwil_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kanwil') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>