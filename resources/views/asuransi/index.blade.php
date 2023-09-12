
@extends('layouts.app')
@push('datatable')
    <link href="{{url_plug()}}/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/abpetkov-powerange/dist/powerange.min.css" rel="stylesheet" />
    <script src="{{url_plug()}}/assets/plugins/switchery/switchery.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/abpetkov-powerange/dist/powerange.min.js"></script>
    <script src="{{url_plug()}}/assets/js/demo/form-slider-switcher.demo.js"></script>
    <script type="text/javascript">
        /*
        Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
        Version: 4.6.0
        Author: Sean Ngu
        Website: http://www.seantheme.com/color-admin/admin/
        */
        
        function show_data() {
            if ($('#data-table-fixed-header').length !== 0) {
                var table=$('#data-table-fixed-header').DataTable({
                    lengthMenu: [20, 40, 60],
                    lengthChange:false,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },
                    responsive: false,
                    ajax:"{{ url('master/asuransi/getdata')}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'status' },
						{ data: 'action' },
						{ data: 'nama_asuransi' },
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
                $('#cari_data').keyup(function(){
                    table.search($(this).val()).draw() ;
                })
            }
        };


        $(document).ready(function() {
			show_data();

		});

		
    </script>
@endpush
@section('content')
    

        <div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Metode Bayar</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">List Metode Bayar / Jenis Asuransi<small></small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				
				<div class="col-xl-12 ui-sortable">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<!-- begin panel-heading -->
						<div class="panel-heading ui-sortable-handle">
							<h4 class="panel-title">&nbsp;</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<!-- end panel-heading -->
						<!-- begin alert -->
						
						<div class="panel-body">
							<div class="row" style="margin-bottom:2%">
                                <div class="col-md-8">
                                    <a href="javascript:;" onclick="tambah(`{{encoder(0)}}`)" class="btn btn-primary m-r-5"><i class="fa fa-plus"></i> Tambah</a>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" id="cari_data" placeholder="Cari......" type="text" />
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header"  >
                                <thead>
                                    <tr role="row">
                                        <th width="5%">No</th>
                                        <th width="5%"></th>
                                        <th width="5%"></th>
                                        <th>Nama Asuransi</th>
                                    </tr>
                                </thead>
                            </table>
								
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-10 -->
			</div>
			<!-- end row -->
		</div>       
@endsection
@push('ajax')
        
        <script type="text/javascript">
			
			function tambah(id){
				location.assign("{{url('master/asuransi/view')}}?id="+id)
			} 
            function hanyaAngka(evt) {
				
				var charCode = (evt.which) ? evt.which : event.keyCode
				if ((charCode > 47 && charCode < 58 ) || (charCode > 96 && charCode < 123 ) || charCode==95 ){
					
					return true;
				}else{
					return false;
				}
		    }
            function simpan_data(){
            
                var form=document.getElementById('mydataform');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('user') }}",
                        data: new FormData(form),
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function() {
                            document.getElementById("loadnya").style.width = "100%";
                        },
                        success: function(msg){
                            var bat=msg.split('@');
                            if(bat[1]=='ok'){
                                document.getElementById("loadnya").style.width = "0px";
                                Swal.fire({
                                    title:"Notifikasi",
                                    html:'Create User Succes ',
                                    icon:"success",
                                    confirmButtonText: 'Close',
                                    confirmButtonClass:"btn btn-info w-xs mt-2",
                                    buttonsStyling:!1,
                                    showCloseButton:!0
                                });
                                $('#modal-form').modal('hide')
				                $('#tampil-form').html("")
                                var tables=$('#data-table-fixed-header').DataTable();
                                        tables.ajax.url("{{ url('master/asuransi/getdata')}}").load();
                            }else{
                                document.getElementById("loadnya").style.width = "0px";
                                Swal.fire({
                                    title:"Notifikasi",
                                    html:'<div style="background:#f2f2f5;padding:1%;text-align:left;font-size:13px">'+msg+'</div>',
                                    icon:"error",
                                    confirmButtonText: 'Close',
                                    confirmButtonClass:"btn btn-danger w-xs mt-2",
                                    buttonsStyling:!1,
                                    showCloseButton:!0
                                });
                            }
                            
                            
                        }
                    });
            }
            function delete_data(id){
                    swal({
                            title: "Yakin menghapus data ini ?",
                            text: "data akan hilang dari daftar  ini",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'GET',
                                url: "{{url('master/asuransi/delete')}}",
                                data: "id="+id,
                                success: function(msg){
                                    swal("Sukses diproses", "", "success")
                                    var tables=$('#data-table-fixed-header').DataTable();
                                        tables.ajax.url("{{ url('master/asuransi/getdata')}}").load();
                                }
                            });
                           
                        } else {
                            var tables=$('#data-table-fixed-header').DataTable();
                                tables.ajax.url("{{ url('master/asuransi/getdata')}}").load();
                        }
                    });
                    
                
            } 
            function switch_data(id,act){
                if(act==1){
                    

                    swal({
                            title: "Aktifkan Metode Bayar?",
                            text: "Jika diaktifkan maka pengguna dapat menggunakan Metode Bayar ini",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'GET',
                                url: "{{url('master/asuransi/switch_status')}}",
                                data: "id="+id+"&act="+act,
                                success: function(msg){
                                    swal("Sukses diproses", "", "success")
                                    var tables=$('#data-table-fixed-header').DataTable();
                                        tables.ajax.url("{{ url('master/asuransi/getdata')}}").load();
                                }
                            });
                           
                        } else {
                            var tables=$('#data-table-fixed-header').DataTable();
                                tables.ajax.url("{{ url('master/asuransi/getdata')}}").load();
                        }
                    });
                }
                if(act==0){
                    swal({
                            title: "Non aktifkan Metode Bayar?",
                            text: "Jika nonaktifkan maka pengguna tidak dapat menggunakan Metode Bayar ini",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'GET',
                                url: "{{url('master/asuransi/switch_status')}}",
                                data: "id="+id+"&act="+act,
                                success: function(msg){
                                    swal("Sukses diproses", "", "success")
                                    var tables=$('#data-table-fixed-header').DataTable();
                                        tables.ajax.url("{{ url('master/asuransi/getdata')}}").load();
                                }
                            });
                           
                        } else {
                            var tables=$('#data-table-fixed-header').DataTable();
                                tables.ajax.url("{{ url('master/asuransi/getdata')}}").load();
                        }
                    });
                }
                
            }
        </script>
@endpush