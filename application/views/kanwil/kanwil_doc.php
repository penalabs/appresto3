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
        <h2>Kanwil List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Kanwil</th>
		<th>Alamat Kanwil</th>
		<th>Telp Kanwil</th>
		
            </tr><?php
            foreach ($kanwil_data as $kanwil)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kanwil->nama_kanwil ?></td>
		      <td><?php echo $kanwil->alamat_kanwil ?></td>
		      <td><?php echo $kanwil->telp_kanwil ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>