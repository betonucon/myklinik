
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
        function load_data(){
			$.ajax({ 
                type: 'GET', 
                url: "{{ url('medis/getdataantrian')}}", 
                data: { id: 1 }, 
                dataType: 'json',
                beforeSend: function() {
                    $('#tampil-urutan').html("")
                    
                },
                success: function (data) {
                    
                    $('#nilai-antrian').html(data.antrian);
                    $('#nilai-selesai').html(data.selesai);
                    $('#nilai-total').html((data.antrian+data.selesai));
                    
                    
                }
			});
		}
        function show_data() {
            if ($('#data-table-fixed-header').length !== 0) {
                var table=$('#data-table-fixed-header').DataTable({
                    lengthMenu: [20, 40, 60],
                    lengthChange:false,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },
                    responsive: true,
					processing: true,
					serverSide: false,
                    ajax:"{{ url('medis/getdata')}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'act' },
						{ data: 'action' },
						{ data: 'nomor' },
						{ data: 'no_transaksi' },
						{ data: 'no_register' },
						{ data: 'nama_pasien' },
						{ data: 'nama_asuransi' },
                        { data: 'jenis_kelamin' },
                        { data: 'umur' },
						{ data: 'nm_poli',className: "text-center"  },
						
						
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
            load_data();
			$('.datetimepicker1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
			$('#change_date').click(function(){
				change_data($('#waktu_change').val());
			})
		});
        
		
    </script>
@endpush
@section('content')
    

        <div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Daftar Rawat Jalan</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Daftar Rawat Jalan <small></small></h1>
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
                                <div class="col-md-5" style="background: #fdf5cd; padding: 1%;">
                                    <table width="100%">
                                        <tr>
                                            <td colspan="4" style="font-size:20px">TGL
												<div class="input-group input-group-sm date datetimepicker1" id="">
                                                    <input type="text" id="waktu_change" name="waktu_change" value="{{date('d-m-Y',strtotime($waktu))}}" class="form-control datetimepicker1" >
                                                    <div class="btn btn-primary" id="change_date">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
											</td>
                                        </tr>
                                        <tr id="antrian">
                                            <td style="border:solid 1px #fff;color:#fff;background:blue;text-align:center" width="%">TOTAL PASIEN</td>
                                            <td style="border:solid 1px #fff;color:#fff;background:blue;text-align:center" width="30%">ANTRIAN</td>
                                            <td style="border:solid 1px #fff;color:#fff;background:blue;text-align:center" width="30%">SELESAI</td>
                                            
                                        </tr>
                                        <tr id="antrian1">
                                            <td style="font-weight:bold;font-size:16px;border:solid 1px #fff;color:#000;background:aqua;text-align:center" id="nilai-total">0</td>
                                            <td style="font-weight:bold;font-size:16px;border:solid 1px #fff;color:#000;background:aqua;text-align:center" id="nilai-antrian">0</td>
                                            <td style="font-weight:bold;font-size:16px;border:solid 1px #fff;color:#000;background:aqua;text-align:center" id="nilai-selesai">0</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                                <div class="col-md-3">
                                   
                                </div>
                                <div class="col-md-4" style="text-align: right;">
                                    <br>
                                    <input class="form-control" id="cari_data" placeholder="Cari......" type="text" />
                                </div>
                            </div>
                            
                            <table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header"  >
                                <thead>
                                    <tr role="row">
                                        <th width="5%">No</th>
                                        <th width="5%"></th>
                                        <th width="3%"></th>
                                        <th width="5%">Nomor</th>
                                        <th width="12%">No Transaksi</th>
                                        <th width="11%">No Register</th>
                                        <th >Pasien</th>
                                        <th width="13%">Metode</th>
                                        <th width="4%">J.K</th>
                                        <th width="5%">Umur</th>
                                        <th width="5%">Poli</th>
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
			<audio id="myAudio">
				<source src="{{url_plug()}}/img/ping.mp3" type="audio/mp3">
			</audio>
		</div>       
@endsection
@push('ajax')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script type="text/javascript">
            Pusher.logToConsole = false;

            var pusher = new Pusher('8222b3d50f9312cb70e7', {
                cluster: 'ap1',
                // forceTLS: true
            });
			var channel = pusher.subscribe('my-chanel');
                channel.bind('kirim-created', function(data) {
			
                var pesan = data.message;
                var bat = pesan.split('@');
                
                if(bat[2]=="{{Auth::user()->kode_poli}}"){
                    load_data();
                    var tables=$('#data-table-fixed-header').DataTable();
                        tables.ajax.url("{{ url('medis/getdata')}}").load();
                }
                
                
            });
			function tambah(id){
				location.assign("{{url('medis/view')}}?id="+id)
			} 
			function cari_status(statusnya){
				var tables=$('#data-table-fixed-header').DataTable();
                    tables.ajax.url("{{ url('medis/getdata')}}?statusnya="+statusnya).load();
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
                                        tables.ajax.url("{{ url('medis/getdata')}}").load();
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
                                url: "{{url('medis/delete')}}",
                                data: "id="+id,
                                success: function(msg){
                                    swal("Sukses diproses", "", "success")
                                    var tables=$('#data-table-fixed-header').DataTable();
                                        tables.ajax.url("{{ url('medis/getdata')}}").load();
                                }
                            });
                           
                        } else {
                            var tables=$('#data-table-fixed-header').DataTable();
                                tables.ajax.url("{{ url('medis/getdata')}}").load();
                        }
                    });
                    
                
            } 
            function proses_antrian(id){
                    var adu = document.getElementById("myAudio");
                    adu.play();
                    swal({
                        title: "Apakah Pasien Sudah Hadir ?",
                        text: "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: 'GET',
                                url: "{{url('medis/proses_antrian')}}",
                                data: "id="+id,
                                beforeSend: function() {
                                    document.getElementById("loadnya").style.width = "100%";
                                },
                                success: function(msg){
                                    document.getElementById("loadnya").style.width = "0px";
                                    swal("Pasien telah hadir", "", "success")
                                    var tables=$('#data-table-fixed-header').DataTable();
                                        tables.ajax.url("{{ url('medis/getdata')}}").load();
                                    load_data();
                                }
                            });
                           
                        } else {
                            document.getElementById("loadnya").style.width = "0px";
                            var tables=$('#data-table-fixed-header').DataTable();
                                tables.ajax.url("{{ url('medis/getdata')}}").load();
                            load_data();
                        }
                    });
                
                
            }
			function change_data(data) {
				const date = new Date();
				let day = date.getDate();
				let month = date.getMonth() + 1;
				let year = date.getFullYear();
				const currentDate = `${day}-${month}-${year}`;
				if(data != currentDate){
					document.getElementById('antrian').style.display = "none";
					document.getElementById('antrian1').style.display = "none";
				} else {
					document.getElementById('antrian').style.display = "";
					document.getElementById('antrian1').style.display = "";
				}
				if ($('#data-table-fixed-header').length !== 0) {
					var tables=$('#data-table-fixed-header').DataTable();
                    tables.ajax.url("{{ url('medis/getdata')}}?waktu="+data).load();
					$('#cari_data').keyup(function(){
					table.search($(this).val()).draw() ;
					})
				}
			}
        </script>
@endpush