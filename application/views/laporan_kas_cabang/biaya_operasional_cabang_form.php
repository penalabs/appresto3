<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA BIAYA_OPERASIONAL_CABANG</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Operasional <?php echo form_error('nama_operasional') ?></td><td><input type="text" class="form-control" name="nama_operasional" id="nama_operasional" placeholder="Nama Operasional" value="<?php echo $nama_operasional; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nominal <?php echo form_error('nominal') ?></td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Bendahara <?php echo form_error('id_users_bendahara') ?></td><td><input type="text" class="form-control" name="id_users_bendahara" id="id_users_bendahara" placeholder="Id Users Bendahara" value="<?php echo $id_users_bendahara; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Resto Id <?php echo form_error('resto_id') ?></td><td><input type="text" class="form-control" name="resto_id" id="resto_id" placeholder="Resto Id" value="<?php echo $resto_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kas Id <?php echo form_error('kas_id') ?></td><td><input type="text" class="form-control" name="kas_id" id="kas_id" placeholder="Kas Id" value="<?php echo $kas_id; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="biaya_operasional_id" value="<?php echo $biaya_operasional_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('laporan_kas_cabang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>