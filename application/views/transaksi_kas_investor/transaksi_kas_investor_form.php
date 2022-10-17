<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TRANSAKSI_KAS_INVESTOR</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>" ></td>
					</tr>
	
					<tr>
						<td width='200'>Nominal <?php echo form_error('nominal') ?></td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" /></td>
					</tr>
	
					<input type="hidden" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $this->session->userdata('id_users'); ?> " />
	
					<tr>
						<td width='200'>Investor Id <?php echo form_error('investor_id') ?></td>
						<td>
						<select name="investor_id" id="investor_id" class="form-control">
							<?php
							$query = $this->db->get('investor');
							foreach ($query->result() as $row)
							{
							?>
							<option value="<?php echo $row->investor_id; ?>"><?php echo $row->nama_investor; ?></option>
							<?php
							}
							?>
						</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Kas Id <?php echo form_error('kas_id') ?></td>
						<td>
						<select name="kas_id" id="kas_id" class="form-control">
							<?php
							$query = $this->db->get('kas');
							foreach ($query->result() as $row)
							{
							?>
							<option value="<?php echo $row->kas_id; ?>"><?php echo $row->nama_kas; ?></option>
							<?php
							}
							?>
						</select>
						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('transaksi_kas_investor') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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