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
        <h2>Pembayaran_pemesanan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Nominal</th>
		<th>Pemesanan Masakan Id</th>
		<th>Id Users Kasir</th>
		
            </tr><?php
            foreach ($pembayaran_pemesanan_data as $pembayaran_pemesanan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pembayaran_pemesanan->tanggal ?></td>
		      <td><?php echo $pembayaran_pemesanan->nominal ?></td>
		      <td><?php echo $pembayaran_pemesanan->pemesanan_masakan_id ?></td>
		      <td><?php echo $pembayaran_pemesanan->id_users_kasir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>