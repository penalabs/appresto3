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
        <h2>Resto List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Resto</th>
		<th>Alamat Resto</th>
		<th>Telp Resto</th>
		<th>Kanwil Id</th>
		
            </tr><?php
            foreach ($resto_data as $resto)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $resto->nama_resto ?></td>
		      <td><?php echo $resto->alamat_resto ?></td>
		      <td><?php echo $resto->telp_resto ?></td>
		      <td><?php echo $resto->kanwil_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>