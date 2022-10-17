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
        <h2>Investasi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Investasi</th>
		<th>Nominal</th>
		<th>Tanggal</th>
		<th>Id Users Bendahara</th>
		<th>Id Users Generalmaanager</th>
		
            </tr><?php
            foreach ($investasi_data as $investasi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $investasi->nama_investasi ?></td>
		      <td><?php echo $investasi->nominal ?></td>
		      <td><?php echo $investasi->tanggal ?></td>
		      <td><?php echo $investasi->id_users_bendahara ?></td>
		      <td><?php echo $investasi->id_users_generalmaanager ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>