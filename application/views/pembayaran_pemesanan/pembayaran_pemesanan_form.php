<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PEMBAYARAN_PEMESANAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>

					<tr>
						<td width='200'>No Antrian </td><td><input type="text" class="form-control" name="no_antrian" id="no_antrian" placeholder="No Antrian" value="0" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nominal <?php echo form_error('nominal') ?></td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pemesanan Masakan Id <?php echo form_error('pemesanan_masakan_id') ?></td><td><input type="text" class="form-control" name="pemesanan_masakan_id" id="pemesanan_masakan_id" placeholder="Pemesanan Masakan Id" value="<?php echo $pemesanan_masakan_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Kasir <?php echo form_error('id_users_kasir') ?></td><td><input type="text" class="form-control" name="id_users_kasir" id="id_users_kasir" placeholder="Id Users Kasir" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="pembayaran_pemesanan_id" value="<?php echo $pembayaran_pemesanan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pembayaran_pemesanan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>
<script>
	$( document ).ready(function() {
			$('#no_antrian').on('keypress', function() {
            alert( this.value );

                    $.ajax({
                            url: '<?php echo base_url();?>index.php/pembayaran_pemesanan/get_data_pemesanan',
                            type: 'POST',
                            dataType: 'json',
                            data: { 
                                    'no_antrian':  this.value, 
                                },
                            success: function(response){
                                console.log(response);

                                $("#pemesanan_masakan_id").val("");

                                $("#pemesanan_masakan_id").val(response.pemesanan_maakan_id);

                            }
                        });
            });
		});
	</script>
<script>
$('#tanggal').datetimepicker({
    format: 'YYYY-MM-DD hh:mm:ss'
});
</script>