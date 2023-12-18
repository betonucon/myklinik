
@extends('layouts.app')
@push('datatable')
 
    <script type="text/javascript">
        /*
        Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
        Version: 4.6.0
        Author: Sean Ngu
        Website: http://www.seantheme.com/color-admin/admin/
        */
        
        

        function show_data() {
            
        };


        $(document).ready(function() {
			
                var table=$('#data-table-fixed-header-obat').DataTable({
                    lengthChange:false,
                    ordering:false,
                    paging:false,
					processing: true,
					serverSide: false,
                    scrollY:        300,
                    scrollCollapse: true,
                    scroller:       true,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },

                    responsive: false,
                    ajax:"{{ url('transaksiobat/getdata')}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
                        { data: 'pilih' },
						{ data: 'nama_obat' },
						{ data: 'satuan' },
                        { data: 'harga',className: "text-right"  },
                        { data: 'stok',className: "text-right"  },
						
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
                $('#cari_data_obat').keyup(function(){
                    table.search($(this).val()).draw() ;
                })

                var tabledetail=$('#data-table-fixed-header-detail').DataTable({
                    lengthChange:false,
                    ordering:false,
                    paging:false,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },

                    responsive: false,
                    ajax:"{{ url('transaksiobat/getdataobat')}}?no_transaksi={{$data->no_persediaan}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
                        { data: 'action' },
						{ data: 'kode_obat' },
						{ data: 'nama_obat' },
						{ data: 'satuan' },
                        { data: 'qty',className: "text-right"  },
                        { data: 'harga',className: "text-right"  },
                        { data: 'total',className: "text-right"  },
						
						
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
                    tabledetail.search($(this).val()).draw() ;
                })
            

		});

		
    </script>
@endpush
@section('content')
    

        <div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Persediaan / Order Obat</li>
			</ol>
			<h1 class="page-header">Formulir Persediaan / Order Obat<small></small></h1>
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
                            <form  id="mydata" method="post" action="{{ url('user') }}" enctype="multipart/form-data" >
                                 @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <div class="col-xl-12 ">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Formulir Order Stok Obat</legend>
                                    </div>
                                    <div class="col-xl-12 ">
                                        @if($id>0)
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Nomor Order <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-2">
                                                <input type="text" disabled value="{{$data->no_persediaan}}" placeholder="Ketik...." class="form-control">
                                            </div>
                                        </div>
                                        
                                        @endif
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Pengguna <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-4">
                                                <input type="text" disabled value="{{$name}}" placeholder="Ketik...." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Supplier <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input type="text" @if($data->status==1) disabled @endif name="supplier" value="{{$data->supplier}}" placeholder="Ketik...." class="form-control">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Tanggal <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-2">
                                                
                                                <div class="input-group date" @if($id==0) id="datetimepicker1" @endif>
                                                    <input type="text" name="tanggal" {{$readonly}} value="{{$data->tanggal}}" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                    
                                </div>
                            </form>	
						</div>
                        <div class="panel-body" style="margin-top:1%;background: #f5f5fb; padding: 1%;">
                            <div class="row">
                                <!-- begin col-8 -->
                                <div class="col-xl-12 ">
                                    <a href="javascript:;" onclick="kembali()" class="btn btn-danger m-r-5"><i class="fa fa-step-backward"></i> Kembali</a>
                                    @if($data->status!=1)
                                        @if($id>0)
                                        <a href="javascript:;"  onclick="simpan_data()"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Simpan & Ubah</a>
                                        
                                        <a href="javascript:;"  onclick="simpan_publish()"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Selesai</a>
                                        @else
                                        <a href="javascript:;"  onclick="simpan_data()"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Simpan</a>
                                        @endif
                                    @else
                                    <a href="javascript:;"  onclick="cetak()"  class="btn btn-secondary m-r-5"><i class="fa fa-save"></i> Cetak</a>
                                    @endif
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
					</div>
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
						<div class="row" style="margin-bottom:2%">
                            <div class="col-md-10">
                                <div class="panel-body">
                                    <div class="row" style="margin-bottom:2%">
                                        <div class="col-md-8" style="background: #fdf5cd; padding: 1%;">
                                        @if($data->status!=1 && $id>0)
                                            <a href="javascript:;"  onclick="tambah_obat()"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Tambah Obat</a>
                                        @endif
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <input class="form-control" id="cari_data" placeholder="Cari......" type="text" />
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header-detail"  >
                                        <thead>
                                            <tr role="row">
                                                <th width="5%">No</th>
                                                <th width="5%"></th>
                                                <th width="11%">Kode</th>
                                                <th>Nama Obat</th>
                                                <th width="11%">Satuan</th>
                                                <th width="5%">Qty</th>
                                                <th width="11%">Harga</th>
                                                <th width="12%">Total</th>
                                            </tr>
                                        </thead>
                                    </table>
                                        
                                </div>
                            </div>
                            
                        </div>
						<!-- end panel-body -->
					</div>
				</div>
			</div>
		</div>   
        <div class="modal fade" id="modal-order" aria-hidden="true" style="display: none;z-index: 2050;background: rgb(22 22 28 / 33%)">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Order Stok</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger m-b-0">
                            <form  id="mydataorder" method="post" action="{{ url('transaksiobat/obat') }}" enctype="multipart/form-data" >
                                 @csrf
                                 <input type="hidden" value="{{$data->no_persediaan}}" name="no_transaksi">
                                <div id="tampil-order"></div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Batal</a>
                        <a href="javascript:;" class="btn btn-danger" onclick="simpan_obat()">Proses</a>
                    </div>
                </div>
            </div>
        </div>    
        <div class="modal fade" id="modal-obat" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar Obat</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:2%">
                                        
                                        
                            <div class="col-md-12">
                                <input class="form-control" id="cari_data_obat" placeholder="Cari......" type="text" />
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header-obat"  >
                            <thead>
                                <tr role="row">
                                    <th width="2%">No</th>
                                    <th width="2%"></th>
                                    <th >Nama Obat</th>
                                    <th width="10%">Satuan</th>
                                    <th width="13%">Harga</th>
                                    <th width="9%">Stok</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Tutup</a>
                    </div>
                </div>
            </div>
        </div>    
@endsection
@push('ajax')
        
        <script type="text/javascript">
			$('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
			function tambah_obat(){
                $('#modal-obat').modal('show');
                var tables=$('#data-table-fixed-header-obat').DataTable();
                        tables.ajax.url("{{ url('transaksiobat/getdata')}}").load();
                
            }
			function pilih(id,kode_obat,stok){
				
                    $('#modal-order').modal('show');
                    $('#tampil-order').load("{{url('transaksiobat/modal_stok')}}?id="+id+"&no_transaksi={{$data->no_persediaan}}&kode_obat="+kode_obat);
			} 
			function kembali(){
				location.assign("{{url('transaksiobat/persediaan')}}")
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
            
                var form=document.getElementById('mydata');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('transaksiobat') }}",
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
                                swal({
                                    title: 'Sukses diproses',
                                    text: '',
                                    icon: 'success',
                                    buttons: {
                                        cancel: {
                                            text: 'Tutup',
                                            value: null,
                                            visible: true,
                                            className: 'btn btn-default',
                                            closeModal: true,
                                        },
                                        
                                    }
                                });
                                @if($id>0)
                                    location.reload();
                                @else
                                    location.assign("{{url('transaksiobat/viewpersediaan')}}?id="+bat[2])
                                @endif
                            }else{
                                document.getElementById("loadnya").style.width = "0px";
                                
                                swal({
                                    title: 'Opps Error!',
                                    html:true,
                                    text:'ss',
                                    icon: 'error',
                                    buttons: {
                                        cancel: {
                                            text: 'Tutup',
                                            value: null,
                                            visible: true,
                                            className: 'btn btn-default',
                                            closeModal: true,
                                        },
                                        
                                    }
                                });
                                $('.swal-text').html('<div style="width:100%;background:#f2f2f5;padding:2%;text-align:left;font-size:13px">'+msg+'</div>')
                            }
                            
                            
                        }
                    });
            }
            function simpan_publish(){
            
                var form=document.getElementById('mydata');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('transaksiobat/publish') }}",
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
                                swal({
                                    title: 'Sukses diproses',
                                    text: '',
                                    icon: 'success',
                                    buttons: {
                                        cancel: {
                                            text: 'Tutup',
                                            value: null,
                                            visible: true,
                                            className: 'btn btn-default',
                                            closeModal: true,
                                        },
                                        
                                    }
                                });
                                
                                    location.reload();
                                
                            }else{
                                document.getElementById("loadnya").style.width = "0px";
                                
                                swal({
                                    title: 'Opps Error!',
                                    html:true,
                                    text:'ss',
                                    icon: 'error',
                                    buttons: {
                                        cancel: {
                                            text: 'Tutup',
                                            value: null,
                                            visible: true,
                                            className: 'btn btn-default',
                                            closeModal: true,
                                        },
                                        
                                    }
                                });
                                $('.swal-text').html('<div style="width:100%;background:#f2f2f5;padding:2%;text-align:left;font-size:13px">'+msg+'</div>')
                            }
                            
                            
                        }
                    });
            }
            function simpan_obat(){
            
                var form=document.getElementById('mydataorder');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('transaksiobat/obat') }}",
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
                                swal({
                                    title: 'Sukses diproses',
                                    text: '',
                                    icon: 'success',
                                    buttons: {
                                        cancel: {
                                            text: 'Tutup',
                                            value: null,
                                            visible: true,
                                            className: 'btn btn-default',
                                            closeModal: true,
                                        },
                                        
                                    }
                                });
                                $('#modal-order').modal('hide');
                                $('#tampil-order').html("");
                                var tables=$('#data-table-fixed-header-detail').DataTable();
                                     tables.ajax.url("{{ url('transaksiobat/getdataobat')}}?no_transaksi={{$data->no_persediaan}}").load();
                            }else{
                                document.getElementById("loadnya").style.width = "0px";
                                
                                swal({
                                    title: 'Opps Error!',
                                    html:true,
                                    text:'ss',
                                    icon: 'error',
                                    buttons: {
                                        cancel: {
                                            text: 'Tutup',
                                            value: null,
                                            visible: true,
                                            className: 'btn btn-default',
                                            closeModal: true,
                                        },
                                        
                                    }
                                });
                                $('.swal-text').html('<div style="width:100%;background:#f2f2f5;padding:2%;text-align:left;font-size:13px">'+msg+'</div>')
                            }
                            
                            
                        }
                    });
            }

            
            function delete_detail(id){
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
                                    url: "{{url('transaksiobat/delete_detail')}}",
                                    data: "id="+id,
                                    success: function(msg){
                                        swal("Sukses diproses", "", "success")
                                        var tables=$('#data-table-fixed-header-detail').DataTable();
                                            tables.ajax.url("{{ url('transaksiobat/getdataobat')}}?no_transaksi={{$data->no_persediaan}}").load();
                                    }
                                });
                           
                        } else {
                            var tables=$('#data-table-fixed-header-detail').DataTable();
                                            tables.ajax.url("{{ url('transaksiobat/getdataobat')}}?no_transaksi={{$data->no_persediaan}}").load();
                        }
                    });
                    
                
                
                
            } 
            
        </script>
@endpush