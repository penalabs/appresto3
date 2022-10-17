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
        <h2>Menu_masakan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Masakan</th>
		<th>Stok</th>
		<th>Gambar</th>
		<th>Harga</th>
		<th>Id Users</th>
		
            </tr><?php
            foreach ($daftar_menu_masakan_data as $daftar_menu_masakan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $daftar_menu_masakan->nama_masakan ?></td>
		      <td><?php echo $daftar_menu_masakan->stok ?></td>
		      <td><?php echo $daftar_menu_masakan->gambar ?></td>
		      <td><?php echo $daftar_menu_masakan->harga ?></td>
		      <td><?php echo $daftar_menu_masakan->id_users ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>