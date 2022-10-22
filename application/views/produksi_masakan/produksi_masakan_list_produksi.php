<div class="content-wrapper">
    <section class="content">
        <div class="row">



        <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA DETIAL_PEMESANAN_MASAKAN</h3>
                    </div>
        
                        <div class="box-body">
                        <div style="padding-bottom: 10px;"'>
                        <?php echo anchor(site_url('produksi_detial_pemesanan_masakan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                        <?php echo anchor(site_url('produksi_detial_pemesanan_masakan/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                        <?php echo anchor(site_url('produksi_detial_pemesanan_masakan/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
                        <table class="table table-bordered table-striped" id="mytable2">
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





            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PRODUKSI_MASAKAN</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('produksi_masakan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('produksi_masakan/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('produksi_masakan/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Tanggal</th>
		    <th>Bahan Olahan Id</th>
		    <th>Jumlah Bahan</th>
		    <th>Detail Pemesanan Masakan Id</th>
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
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?php echo base_url();?>index.php/produksi_masakan/json", "type": "POST",
                        "data" : {
                            "detail_pemesanan_masakan_id" : "<?php echo $this->session->userdata('detail_pemesanan_masakan_id');?>",
                        }
                    },
                    columns: [
                        {
                            "data": "produksi_masakan_id",
                            "orderable": false
                        },{"data": "tanggal"},{"data": "bahan_olahan_id"},{"data": "jumlah_bahan"},{"data": "detail_pemesanan_masakan_id"},{"data": "status"},
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




                var t = $("#mytable2").dataTable({
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
                    ajax: {"url": "<?php echo base_url();?>index.php/produksi_masakan/json2", "type": "POST"},
                    columns: [
                        {
                            "data": "detail_pemesanan_masakan_id",
                            "orderable": false
                        },{"data": "pemesanan_masakan_id"},{"data": "menu_masakan_id"},{"data": "tanggal"},{"data": "harga"},{"data": "jumlah_pesan"},{"data": "subtotal"},{"data": "status"},
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




            });
        </script>