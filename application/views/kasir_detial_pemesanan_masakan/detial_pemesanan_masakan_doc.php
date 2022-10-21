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
        <h2>Detial_pemesanan_masakan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Pemesanan Masakan Id</th>
		<th>Menu Masakan Id</th>
		<th>Tanggal</th>
		<th>Harga</th>
		<th>Jumlah Pesan</th>
		<th>Subtotal</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($kasir_detial_pemesanan_masakan_data as $kasir_detial_pemesanan_masakan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kasir_detial_pemesanan_masakan->pemesanan_masakan_id ?></td>
		      <td><?php echo $kasir_detial_pemesanan_masakan->menu_masakan_id ?></td>
		      <td><?php echo $kasir_detial_pemesanan_masakan->tanggal ?></td>
		      <td><?php echo $kasir_detial_pemesanan_masakan->harga ?></td>
		      <td><?php echo $kasir_detial_pemesanan_masakan->jumlah_pesan ?></td>
		      <td><?php echo $kasir_detial_pemesanan_masakan->subtotal ?></td>
		      <td><?php echo $kasir_detial_pemesanan_masakan->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>