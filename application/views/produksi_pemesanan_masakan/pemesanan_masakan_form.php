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
						<td width='200'>Id Users Waiter <?php echo form_error('id_users_waiter') ?></td><td><input type="text" class="form-control" name="id_users_waiter" id="id_users_waiter" placeholder="Id Users Waiter" value="<?php echo $id_users_waiter; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Total <?php echo form_error('total') ?></td><td><input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Dibayar <?php echo form_error('dibayar') ?></td><td><input type="text" class="form-control" name="dibayar" id="dibayar" placeholder="Dibayar" value="<?php echo $dibayar; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="pemesanan_maakan_id" value="<?php echo $pemesanan_maakan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('produksi_pemesanan_masakan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>