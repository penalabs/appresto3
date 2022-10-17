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
        <h2>Pengeluran_biaya_operasional_cabang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Operasional</th>
		<th>Tanggal</th>
		<th>Harga</th>
		<th>Id Users Adminresto</th>
		<th>Resto Id</th>
		<th>Kas Id</th>
		
            </tr><?php
            foreach ($pengeluran_biaya_operasional_cabang_data as $pengeluran_biaya_operasional_cabang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengeluran_biaya_operasional_cabang->nama_operasional ?></td>
		      <td><?php echo $pengeluran_biaya_operasional_cabang->tanggal ?></td>
		      <td><?php echo $pengeluran_biaya_operasional_cabang->harga ?></td>
		      <td><?php echo $pengeluran_biaya_operasional_cabang->id_users_adminresto ?></td>
		      <td><?php echo $pengeluran_biaya_operasional_cabang->resto_id ?></td>
		      <td><?php echo $pengeluran_biaya_operasional_cabang->kas_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>