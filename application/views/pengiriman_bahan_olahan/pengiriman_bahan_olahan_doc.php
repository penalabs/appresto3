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
        <h2>Pengiriman_bahan_olahan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Jumlah</th>
		<th>Bahan Olahan Id</th>
		<th>Id Users Logistik</th>
		<th>Id Users Produksi</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($pengiriman_bahan_olahan_data as $pengiriman_bahan_olahan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengiriman_bahan_olahan->tanggal ?></td>
		      <td><?php echo $pengiriman_bahan_olahan->jumlah ?></td>
		      <td><?php echo $pengiriman_bahan_olahan->bahan_olahan_id ?></td>
		      <td><?php echo $pengiriman_bahan_olahan->id_users_logistik ?></td>
		      <td><?php echo $pengiriman_bahan_olahan->id_users_produksi ?></td>
		      <td><?php echo $pengiriman_bahan_olahan->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>