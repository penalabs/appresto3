<div class="content-wrapper">
    <section class="content">
        <div class="row">

        <div class="col-xs-6">
            <div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"> DATA PEMESANAN_MASAKAN</h3>
			</div>
			<form action="<?php echo base_url();?>index.php/kasir_detial_pemesanan_masakan/filter" method="get">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>No Antrian </td><td><input type="text" class="form-control" name="no_antrian" id="no_antrian" placeholder="No Antrian" value="1" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Pembeli </td><td><input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" placeholder="Nama Pembeli" value="" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Waiter </td><td><input type="text" class="form-control" name="id_users_waiter" id="id_users_waiter" placeholder="Id Users Waiter" value="" /></td>
					</tr>
	
					<tr>
						<td width='200'>Total </td><td><input type="text" class="form-control" name="total" id="total" placeholder="Total" value="" /></td>
					</tr>
	
					<tr>
						<td width='200'>Dibayar </td><td><input type="text" class="form-control" name="dibayar" id="dibayar" placeholder="Dibayar" value="" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status </td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> FILTER</button> 
							
						</td>
					</tr>
	
				</table>
			</form>
		    </div>
            </div>

            <div class="col-xs-6">
            <div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"> DATA PEMBAYARAN</h3>
			</div>
			<form action="#" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Pemesanan masakan id </td><td><input type="text" class="form-control" name="pemesanan_masakan_id" id="pemesanan_masakan_id" placeholder="Pemesanan masakan id" value="" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal </td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="" /></td>
					</tr>

                    <tr>
						<td width='200'>Nominal </td><td><input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Users Kasir </td><td><input type="text" class="form-control" name="id_users_kasir" id="id_users_kasir" placeholder="Id Users Kasir" value="<?php echo $this->session->userdata('id_users');?>" /></td>
					</tr>
	
	
					<tr>
						<td></td>
						<td>
							
							<button type="button" id="bayar" onclick="bayarku();" class="btn btn-danger"><i class="fa fa-floppy-o"></i> BAYAR</button> 
							
						</td>
					</tr>
	
				</table>
			</form>
		    </div>
            </div>





            <div class="col-xs-12">


            





                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA DETIAL_PEMESANAN_MASAKAN</h3>
                    </div>
        
        <div class="box-body">


        






        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('kasir_detial_pemesanan_masakan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('kasir_detial_pemesanan_masakan/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('kasir_detial_pemesanan_masakan/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Pemesanan Masakan Id</th>
		    <th>Menu Masakan Id</th>
		    <th>Tanggal</th>
		    <th>Harga</th>
		    <th>Jumlah Pesan</th>
		    <th>Subtotal</th>
		    <th>Status</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

        <link href=
        "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
                rel="stylesheet">
 
        <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
                </script>
        <script type="text/javascript">
            function load_table(pemesanan_masakan_id) {
                $("#mytable").empty();
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "kasir_detial_pemesanan_masakan/json", "type": "POST",
                        'data': {
                            pemesanan_masakan_id: pemesanan_masakan_id,
                        },
                    },
                    columns: [
                        {
                            "data": "detail_pemesanan_masakan_id",
                            "orderable": false
                        },{"data": "pemesanan_masakan_id"},{"data": "nama_masakan"},{"data": "tanggal"},{"data": "harga"},{"data": "jumlah_pesan"},{"data": "subtotal"},{"data": "status"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            };
        </script>
        <script>
        $( document ).ready(function() {
            $('#no_antrian').on('change', function() {
            //alert( this.value );

                    $.ajax({
                            url: '<?php echo base_url();?>index.php/kasir_detial_pemesanan_masakan/get_harga',
                            type: 'POST',
                            dataType: 'json',
                            data: { 
                                    'no_antrian':  this.value, 
                                },
                            success: function(response){
                                console.log(response);

                                $("#nama_pembeli").val("");
                                $("#id_users_waiter").val("");
                                $("#total").val("");
                                $("#dibayar").val("");
                                $("#status").val("");
                                $("#pemesanan_masakan_id").val("");
                                //alert(response.harga)
                                $("#nama_pembeli").val(response.nama_pembeli);
                                $("#id_users_waiter").val(response.id_users_waiter);
                                $("#total").val(response.total);
                                $("#dibayar").val(response.dibayar);
                                $("#status").val(response.status);

                                $("#pemesanan_masakan_id").val(response.pemesanan_maakan_id);

                                load_table(response.pemesanan_maakan_id);
                                alert(response.pemesanan_maakan_id);
                            }
                        });
            });



            $('#tanggal').datetimepicker({
        format: 'YYYY-MM-DD hh:mm:ss'
    });

        });


        function bayarku() {
            alert( 1 );

                    $.ajax({
                            url: '<?php echo base_url();?>index.php/kasir_detial_pemesanan_masakan/bayar',
                            type: 'POST',
                            dataType: 'json',
                            data: { 
                                    'pemesanan_maakan_id':   $('#pemesanan_maakan_id').val(), 
                                    'tanggal':   $('#tanggal').val(), 
                                    'nominal':   $('#nominal').val(), 
                                    'id_users_kasir':   $('#id_users_kasir').val(), 
                                },
                            success: function(response){
                                console.log(response);


                                alert(response.pesan);

                            }
            
                        });

            };

        
    </script>

    <script>
 
    </script>