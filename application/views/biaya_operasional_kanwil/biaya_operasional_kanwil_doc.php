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
        <h2>Biaya_operasional_kanwil List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Operasional</th>
		<th>Tanggal</th>
		<th>Nominal</th>
		<th>Id Users Bendahara</th>
		<th>Kanwil Id</th>
		<th>Kas Id</th>
		
            </tr><?php
            foreach ($biaya_operasional_kanwil_data as $biaya_operasional_kanwil)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $biaya_operasional_kanwil->nama_operasional ?></td>
		      <td><?php echo $biaya_operasional_kanwil->tanggal ?></td>
		      <td><?php echo $biaya_operasional_kanwil->nominal ?></td>
		      <td><?php echo $biaya_operasional_kanwil->id_users_bendahara ?></td>
		      <td><?php echo $biaya_operasional_kanwil->kanwil_id ?></td>
		      <td><?php echo $biaya_operasional_kanwil->kas_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>