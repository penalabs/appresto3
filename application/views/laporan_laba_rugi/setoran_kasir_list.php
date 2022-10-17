<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA LAPORAN LABA RUGI</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('laporan_laba_rugi/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('laporan_laba_rugi/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('laporan_laba_rugi/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
       
        <form action="#" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal mulai <?php echo form_error('tanggal_mulai') ?></td><td><input type="text" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal akhir<?php echo form_error('tanggal_akhir') ?></td><td><input type="text" class="form-control" name="tanggal_akhir" id="tanggal_akhir" placeholder="Tanggal Akhir" /></td>
					</tr>

	
					<tr>
						<td><h1><div id="laba_bersih">LABA BERSIH</div></h1></td>
						<td>
							<button type="button" onclick="hello()" class="btn btn-danger"><i class="fa fa-floppy-o"></i> FILTER</button> 
						</td>
					</tr>
	
				</table>
			</form>
        
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Nominal</th>
		    <th>Tanggal</th>
		    <th>Id Users Bendahara</th>
		    <th>Id Users Kasir</th>
		    <th>Status</th>
		    
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
            $(document).ready(function() {
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
                    destroy: true,
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "laporan_laba_rugi/json", "type": "POST"},
                    columns: [
                        {
                            "data": "setoran_id",
                            "orderable": false
                        },{"data": "nominal"},{"data": "tanggal"},{"data": "nama_bendahara"},{"data": "nama_kasir"},{"data": "status"},
                       
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

                
            });

            
            $('#tanggal_mulai').datetimepicker({
                format: 'YYYY-MM-DD hh:mm:ss'
                });
                $('#tanggal_akhir').datetimepicker({
                    format: 'YYYY-MM-DD hh:mm:ss'
                });

            function hello() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url(); ?>index.php/laporan_laba_rugi/get_laba_rugi",
                    cache: false,
                    dataType: 'json',
                    success: function(data) {
                       //s alert(data.laba_bersih);
                        $("#laba_bersih").html(data.laba_bersih);
                    }
                });


                alert('Hello');
                var tanggal_mulai=$('#tanggal_mulai').val();
                var tanggal_akhir=$('#tanggal_akhir').val();
                alert(tanggal_mulai);
                alert(tanggal_akhir);
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
                    destroy: true,
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "laporan_laba_rugi/json_filter", "type": "POST",
                        'data': {
                            tanggal_mulai: tanggal_mulai,
                            tanggal_akhir: tanggal_akhir,
                            },
                    },
                    columns: [
                        {
                            "data": "setoran_id",
                            "orderable": false
                        },{"data": "nominal"},{"data": "tanggal"},{"data": "nama_bendahara"},{"data": "nama_kasir"},{"data": "status"},
                       
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

               
            }
        </script>