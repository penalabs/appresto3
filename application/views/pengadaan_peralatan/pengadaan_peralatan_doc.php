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
        <h2>Pengadaan_peralatan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Peralatan Id</th>
		<th>Tanggal</th>
		<th>Harga</th>
		<th>Id Users Logistik</th>
		
            </tr><?php
            foreach ($pengadaan_peralatan_data as $pengadaan_peralatan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengadaan_peralatan->peralatan_id ?></td>
		      <td><?php echo $pengadaan_peralatan->tanggal ?></td>
		      <td><?php echo $pengadaan_peralatan->harga ?></td>
		      <td><?php echo $pengadaan_peralatan->id_users_logistik ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>