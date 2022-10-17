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
        <h2>Bahan_mentah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Bahan</th>
		<th>Satuan</th>
		<th>Stok</th>
		
            </tr><?php
            foreach ($bahan_mentah_data as $bahan_mentah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $bahan_mentah->nama_bahan ?></td>
		      <td><?php echo $bahan_mentah->satuan ?></td>
		      <td><?php echo $bahan_mentah->stok ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>