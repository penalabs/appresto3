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
        <h2>Penyusutan_investasi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nominal</th>
		<th>Tanggal</th>
		<th>Investasi Id</th>
		
            </tr><?php
            foreach ($penyusutan_investasi_data as $penyusutan_investasi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penyusutan_investasi->nominal ?></td>
		      <td><?php echo $penyusutan_investasi->tanggal ?></td>
		      <td><?php echo $penyusutan_investasi->investasi_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>