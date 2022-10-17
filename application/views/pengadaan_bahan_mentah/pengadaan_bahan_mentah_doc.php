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
        <h2>Pengadaan_bahan_mentah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Jumlah</th>
		<th>Bahan Mentah Id</th>
		<th>Id Users Logistik</th>
		
            </tr><?php
            foreach ($pengadaan_bahan_mentah_data as $pengadaan_bahan_mentah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengadaan_bahan_mentah->tanggal ?></td>
		      <td><?php echo $pengadaan_bahan_mentah->jumlah ?></td>
		      <td><?php echo $pengadaan_bahan_mentah->bahan_mentah_id ?></td>
		      <td><?php echo $pengadaan_bahan_mentah->id_users_logistik ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>