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
        <h2>Transaksi_kas_investor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Nominal</th>
		<th>Id Users</th>
		<th>Investor Id</th>
		<th>Kas Id</th>
		
            </tr><?php
            foreach ($transaksi_kas_investor_data as $transaksi_kas_investor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $transaksi_kas_investor->tanggal ?></td>
		      <td><?php echo $transaksi_kas_investor->nominal ?></td>
		      <td><?php echo $transaksi_kas_investor->id_users ?></td>
		      <td><?php echo $transaksi_kas_investor->investor_id ?></td>
		      <td><?php echo $transaksi_kas_investor->kas_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>