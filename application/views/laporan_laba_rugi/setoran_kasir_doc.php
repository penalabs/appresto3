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
        <h2>Setoran_kasir List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nominal</th>
		<th>Tanggal</th>
		<th>Id Users Bendahara</th>
		<th>Id Users Kasir</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($laporan_laba_rugi_data as $laporan_laba_rugi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $laporan_laba_rugi->nominal ?></td>
		      <td><?php echo $laporan_laba_rugi->tanggal ?></td>
		      <td><?php echo $laporan_laba_rugi->id_users_bendahara ?></td>
		      <td><?php echo $laporan_laba_rugi->id_users_kasir ?></td>
		      <td><?php echo $laporan_laba_rugi->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>