<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PRODUKSI_MASAKAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Bahan Olahan Id <?php echo form_error('bahan_olahan_id') ?></td>
						<td>
						<?php echo cmb_dinamis('bahan_olahan_id', 'bahan_olahan', 'nama_bahan', 'bahan_olahan_id', $bahan_olahan_id,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td width='200'>Jumlah Bahan <?php echo form_error('jumlah_bahan') ?></td><td><input type="text" class="form-control" name="jumlah_bahan" id="jumlah_bahan" placeholder="Jumlah Bahan" value="<?php echo $jumlah_bahan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Detail Pemesanan Masakan Id <?php echo form_error('detail_pemesanan_masakan_id') ?></td><td><input type="text" class="form-control" name="detail_pemesanan_masakan_id" id="detail_pemesanan_masakan_id" placeholder="Detail Pemesanan Masakan Id" value="<?php echo $this->session->userdata('detail_pemesanan_masakan_id'); ?>" /></td>
					</tr>
	
					<tr>
						<?php
						
						if($status==="antrian"){
							$status="produksi selesai";
						}else if($status==""){
							$status="antrian";
						}
						?>
						
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status;?>" /></td>
						

					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="produksi_masakan_id" value="<?php echo $produksi_masakan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('produksi_masakan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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