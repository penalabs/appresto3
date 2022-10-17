
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_USER</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Full Name</td>
				<td><?php echo $full_name; ?></td>
			</tr>
	
			<tr>
				<td>Email</td>
				<td><?php echo $email; ?></td>
			</tr>
	
			<tr>
				<td>Password</td>
				<td><?php echo $password; ?></td>
			</tr>
	
			<tr>
				<td>Images</td>
				<td><?php echo $images; ?></td>
			</tr>
	
			<tr>
				<td>Id User Level</td>
				<td><?php echo $id_user_level; ?></td>
			</tr>
	
			<tr>
				<td>Is Aktif</td>
				<td><?php echo $is_aktif; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_user') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>