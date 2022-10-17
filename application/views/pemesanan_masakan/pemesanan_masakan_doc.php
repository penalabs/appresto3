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
        <h2>Pemesanan_masakan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Antrian</th>
		<th>Nama Pembeli</th>
		<th>Id Users Waiter</th>
		
            </tr><?php
            foreach ($pemesanan_masakan_data as $pemesanan_masakan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pemesanan_masakan->no_antrian ?></td>
		      <td><?php echo $pemesanan_masakan->nama_pembeli ?></td>
		      <td><?php echo $pemesanan_masakan->id_users_waiter ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>