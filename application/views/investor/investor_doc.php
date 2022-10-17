<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Investor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Investor</th>
		<th>Alamat Investor</th>
		<th>Telp Investor</th>
		<th>Id Users Owner</th>
		
            </tr><?php
            foreach ($investor_data as $investor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $investor->nama_investor ?></td>
		      <td><?php echo $investor->alamat_investor ?></td>
		      <td><?php echo $investor->telp_investor ?></td>
		      <td><?php echo $investor->id_users_owner ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>