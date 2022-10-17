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
        <h2>Pengiriman_peralatan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Jumlah</th>
		<th>Peralatan Id</th>
		<th>Id Users Logistik</th>
		<th>Id Users Adminresto</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($pengiriman_peralatan_data as $pengiriman_peralatan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengiriman_peralatan->tanggal ?></td>
		      <td><?php echo $pengiriman_peralatan->jumlah ?></td>
		      <td><?php echo $pengiriman_peralatan->peralatan_id ?></td>
		      <td><?php echo $pengiriman_peralatan->id_users_logistik ?></td>
		      <td><?php echo $pengiriman_peralatan->id_users_adminresto ?></td>
		      <td><?php echo $pengiriman_peralatan->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>