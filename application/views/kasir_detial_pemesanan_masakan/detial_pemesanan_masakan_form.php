<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA DETIAL_PEMESANAN_MASAKAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Pemesanan Masakan Id <?php echo form_error('pemesanan_masakan_id') ?></td><td><input type="text" class="form-control" name="pemesanan_masakan_id" id="pemesanan_masakan_id" placeholder="Pemesanan Masakan Id" value="<?php echo $this->session->userdata('pemesanan_masakan_id'); ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Menu Masakan Id <?php echo form_error('menu_masakan_id') ?></td>
						<td>
						<?php echo cmb_dinamis2('menu_masakan_id','menu_masakan_id', 'menu_masakan', 'nama_masakan', 'menu_masakan_id', $menu_masakan_id,'DESC') ?>

						</td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Harga <?php echo form_error('harga') ?></td><td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jumlah Pesan <?php echo form_error('jumlah_pesan') ?></td><td><input type="text" class="form-control" name="jumlah_pesan" id="jumlah_pesan" placeholder="Jumlah Pesan" value="<?php echo $jumlah_pesan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Subtotal <?php echo form_error('subtotal') ?></td><td><input type="text" class="form-control" name="subtotal" id="subtotal" placeholder="Subtotal" value="<?php echo $subtotal; ?>" /></td>
					</tr>
	
					<tr>
						<td><input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="dipesan" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="detail_pemesanan_masakan_id" value="<?php echo $detail_pemesanan_masakan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kasir_detial_pemesanan_masakan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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
<script>
	$( document ).ready(function() {
		$('#menu_masakan_id').on('change', function() {
		//alert( this.value );

				$.ajax({
						url: '<?php echo base_url();?>index.php/detial_pemesanan_masakan/get_harga',
						type: 'POST',
						dataType: 'json',
						data: { 
								'menu_masakan_id':  this.value, 
							},
						success: function(response){
							console.log(response);


							//alert(response.harga)
							$("#harga").val(response.harga);
						}
		
					});

		});

		$('#jumlah_pesan').on('change', function() {
			var subtotal=$("#harga").val()*this.value;
			$("#subtotal").val(subtotal);
		});
	});
	
</script>