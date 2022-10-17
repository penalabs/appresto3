<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA RESTO</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Resto <?php echo form_error('nama_resto') ?></td><td><input type="text" class="form-control" name="nama_resto" id="nama_resto" placeholder="Nama Resto" value="<?php echo $nama_resto; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alamat Resto <?php echo form_error('alamat_resto') ?></td><td><input type="text" class="form-control" name="alamat_resto" id="alamat_resto" placeholder="Alamat Resto" value="<?php echo $alamat_resto; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Telp Resto <?php echo form_error('telp_resto') ?></td><td><input type="text" class="form-control" name="telp_resto" id="telp_resto" placeholder="Telp Resto" value="<?php echo $telp_resto; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama kanwil<?php echo form_error('kanwil_id') ?></td>
						<td>
						<select name="kanwil_id" id="kanwil_id" class="form-control">
							<?php
							$query = $this->db->get('kanwil');
							foreach ($query->result() as $row)
							{
							?>
							<option value="<?php echo $row->kanwil_id; ?>"><?php echo $row->nama_kanwil; ?></option>
							<?php
							}
							?>
						</select>
							
						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="resto_id" value="<?php echo $resto_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('resto') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>