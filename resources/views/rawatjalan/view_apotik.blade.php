
@extends('layouts.app')
@push('datatable')
 
    <script type="text/javascript">
        /*
        Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
        Version: 4.6.0
        Author: Sean Ngu
        Website: http://www.seantheme.com/color-admin/admin/
        */
        
        

        $(document).ready(function() {
			var tableobat=$('#data-table-fixed-header-obat').DataTable({
                    lengthChange:false,
                    ordering:false,
                    paging:false,
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
                    tableobat.search($(this).val()).draw() ;
                })
			var tablediag=$('#data-table-fixed-header-diagnosa').DataTable({
                    lengthChange:false,
                    ordering:false,
                    paging:false,
                    scrollY:        300,
                    scrollCollapse: true,
                    scroller:       true,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },

                    responsive: false,
                    ajax:"{{ url('master/diagnosa/getdata')}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'no_kepala', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
                        { data: 'pilih' },
						{ data: 'kode_diagnosa' },
                        { data: 'diagnosa_ecd' },
						{ data: 'diagnosa_ind' },
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
                $('#cari_data_diagnosa').keyup(function(){
                    table.search($(this).val()).draw() ;
                })

                var tabledetail=$('#data-table-fixed-header-detail').DataTable({
                    lengthChange:false,
                    ordering:false,
                    paging:false,
                    scrollY:        300,
                    scrollCollapse: true,
                    scroller:       true,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },

                    responsive: false,
                    ajax:"{{ url('medis/getdataobat')}}?no_transaksi={{$data->no_transaksi}}",
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

                $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust()
                        .fixedColumns().relayout();
                });

		});

		
    </script>
@endpush
@section('content')
    

        <div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Pemeriksaan</li>
			</ol>
			<h1 class="page-header">Formulir Pemeriksaan<small></small></h1>
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
                            <div class="row">
                                <div class="col-md-12" style="background: #e3e3ef;;padding-top:2%">
                                    
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#default-tab-1" data-toggle="tab" class="nav-link active">
                                                <span class="d-sm-none"><i class="fa fa-list-ol"></i> PROFIL PASIEN</span>
                                                <span class="d-sm-block d-none"><i class="fa fa-list-ol"></i> PROFIL PASIEN</span>
                                            </a>
                                        </li>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                                                <span class="d-sm-none"><i class="fa fa-list-ol"></i> RESEP OBAT</span>
                                                <span class="d-sm-block d-none"><i class="fa fa-list-ol"></i> RESEP OBAT</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="default-tab-1" >
                                            <form  id="mydata" method="post" action="{{ url('user') }}" enctype="multipart/form-data" >
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="id" value="{{$id}}">
                                                    <input type="hidden" name="diagnosa_id" id="diagnosa_id">
                                                    <div class="col-xl-12 ">
                                                        
                                                    </div>
                                                    <div class="col-xl-7 mb-4">
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">NO REGISTER : {{$data->no_register}}</legend>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">NIK / Nomor KTP <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->nik}}
                                                            </div>
                                                        </div>
                                                        @if($data->asuransi_id==2)
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">No BPJS</label>
                                                            <div class="col-lg-9 col-xl-8"  style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->nama_asuransi}}
                                                            </div>
                                                        </div>
                                                       @endif
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Nama Pasien <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7"  style="padding: 0.3%; padding-left: 5%;">
                                                                Tn. {{$data->nama_pasien}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Alamat Pasien <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7">
                                                                {{$data->alamat}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Tanggal Lahir <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->tgl_lahir}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Usia Pasien <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->umur}} Th
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Jenis Kelamin  <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                ( {{$data->jenis_kelamin}} ) / {{$data->jk}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Jenis Asuransi  <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                               {{$data->nama_asuransi}}
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    <div class="col-xl-5 mb-4" style="border: solid 1px #ceced9; background: #f9f9f9; padding-top: 1%;">
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><u>Formulir Rawat Jalan</u></legend>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Poli Tujuan <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->nama_poli}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Tensi Darah <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->tensi}} mmHg
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Suhu Badan <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                {!!$data->suhunya!!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Berat Badan <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->berat}} Kg
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    <div class="col-xl-12 " >
                                                        <hr>
                                                    </div>
                                                    <div class="col-xl-9 " >
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><u>Informasi Keluhan Yang dialami</u></legend>
                                                        <div class="row">
                                                            <div class="col-md-1">

                                                            </div>
                                                            <div class="col-md-5">
                                                                <u><b>Keluhan Pasien</b></u><br>
                                                                
                                                                {!!$data->keluhan!!}
                                                            </div>
                                                            <div class="col-md-1">

                                                            </div>
                                                            <div class="col-md-5">
                                                                <u><b>Diagnosa Pasien</b></u><br>
                                                            
                                                                Kode Diagnosa : {{$data->kode_diagnosa}}<br>( {!!$data->diagnosa_eng!!} ) </br>{!!$data->diagnosa_ind!!}
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </form>	
                                            
                                        </div>
                                        <div class="tab-pane fade " id="default-tab-2" >
                                            <div class="row" style="margin-bottom:2%">
                                                <div class="col-md-8" style="background: #fdf5cd; padding: 1%;">
                                                <a href="javascript:;"  onclick="tambah_obat()()"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Tambah Obat</a>
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
                                        <div class="tab-pane fade" id="default-tab-3">
                                            
                                        </div>
                                    </div>
                                    <div class="panel-body" style="margin-top:1%;background: #f5f5fb; padding: 1%;">
                                        <div class="row">
                                            <!-- begin col-8 -->
                                            <div class="col-xl-12 ">
                                                <a href="javascript:;" onclick="kembali()" class="btn btn-danger m-r-5"><i class="fa fa-step-backward"></i> Kembali</a>
                                                <a href="javascript:;"  onclick="simpan_proses_data(1)"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Submit</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            
						</div>
                        
					</div>
				</div>
			</div>
		</div>
        <div class="modal fade" id="modal-konfirmasi" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Notifikasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger m-b-0">
                            <h5><i class="fa fa-info-circle"></i> Perhatian</h5>
                            <p>Pastikan data yang diinputkan sudah sesuai, Data akan diproses / dikirimkan kan ke bagian medis (POLI)</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Batal</a>
                        <a href="javascript:;" class="btn btn-primary" id="simpan_1" onclick="simpan_data()">Proses dan Kirim</a>
                        <a href="javascript:;" class="btn btn-primary" id="simpan_2"  onclick="simpan_data_lama()">Proses dan Kirim</a>
                    </div>
                </div>
            </div>
        </div>          
                  
        <div class="modal fade" id="modal-diagnosa" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" style="max-width:80%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar Diagnosa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:2%">
                                        
                                        
                            <div class="col-md-5">
                               
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" onchange="pilih_serial(this.value)" id="serial">
                                    <option value="">-- Pilih --</option>
                                    @foreach(get_serial() as $gt)
                                        <option value="{{$gt->srl}}"  >{{$gt->nama_serial}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" id="cari_data_obat" placeholder="Cari......" type="text" />
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header-diagnosa"  >
                            <thead>
                                <tr role="row">
                                    <th width="2%">No</th>
                                    <th width="2%"></th>
                                    <th width="5%">Kode</th>
                                    <th width="20%">English_name</th>
                                    <th >Indonesia_name</th>
                                    
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
                                 <input type="hidden" value="{{$data->no_transaksi}}" name="no_transaksi">
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
           
            $('.skd').hide();
            $('.sks').hide();
            
			$('#non_kepala').hide();
			$('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
			function show_diagnosa(){
				$('#modal-diagnosa').modal('show');
                var tables=$('#data-table-fixed-header-diagnosa').DataTable();
                    tables.ajax.url("{{ url('master/diagnosa/getdata')}}").load();
			} 
            function tambah_obat(){
                $('#modal-obat').modal('show');
                var tables=$('#data-table-fixed-header-obat').DataTable();
                        tables.ajax.url("{{ url('transaksiobat/getdata')}}").load();
                
            }
            function pilih(id,kode_obat,stok){
				if(stok==0){
                    swal({
                        title: 'Opps, Stok tidak mencukupi',
                        text: '',
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
                }else{
                    $('#modal-order').modal('show');
                    $('#tampil-order').load("{{url('medis/modal_stok')}}?id="+id+"&no_transaksi={{$data->no_transaksi}}&kode_obat="+kode_obat);
                }
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
                                    url: "{{url('medis/delete_detail')}}",
                                    data: "id="+id,
                                    success: function(msg){
                                        swal("Sukses diproses", "", "success")
                                        var tables=$('#data-table-fixed-header-detail').DataTable();
                                            tables.ajax.url("{{ url('medis/getdataobat')}}?no_transaksi={{$data->no_transaksi}}").load();
                                    }
                                });
                           
                        } else {
                            var tables=$('#data-table-fixed-header-detail').DataTable();
                                            tables.ajax.url("{{ url('medis/getdataobat')}}?no_transaksi={{$data->no_transaksi}}").load();
                        }
                    });
                    
                
                
                
            } 
			function pilih_serial(serial){
				var tables=$('#data-table-fixed-header-diagnosa').DataTable();
                    tables.ajax.url("{{ url('master/diagnosa/getdata')}}?serial="+serial).load();
			} 
			function pilih_surat(id){
				if(id==1){
                        $('.skd').show();
                        $('.sks').hide();
                }else{
                    if(id==2){
                        $('.skd').hide();
                        $('.sks').show();
                    }else{
                        $('.skd').hide();
                        $('.sks').hide();
                    }
                }
			} 
			function show_pasien_all(){
				$('#modal-pasien-all').modal('show');
                var tables=$('#data-table-fixed-header-pasien-all').DataTable();
                    tables.ajax.url("{{ url('pasien/getdata')}}").load();
			} 
			function simpan_proses_data(id){
				$('#modal-konfirmasi').modal('show');
                if(id==1){
                    $('#simpan_1').show();
                    $('#simpan_2').hide();
                }else{
                    $('#simpan_2').show();
                    $('#simpan_1').hide();
                }
			} 
            
			
            function pilih_diagnosa(kode_diagnosa,diagnosa_id,diagnosa_eng,diagnosa_ind){
                $('#modal-diagnosa').modal('hide');
				$('#kode_diagnosa').val(kode_diagnosa)
				$('#diagnosa_id').val(diagnosa_id)
				$('#diagnosa_eng').val(diagnosa_eng)
				$('#diagnosa_ind').val(diagnosa_ind)
			} 
			
			function kembali(){
				location.assign("{{url('medis')}}")
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
                        url: "{{ url('apotik') }}",
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
                                location.assign("{{url('apotik')}}")
                            }else{
                                document.getElementById("loadnya").style.width = "0px";
                                $('#modal-konfirmasi').modal('hide');
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
                    url: "{{ url('medis/obat') }}",
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
                            var tables=$('#data-table-fixed-header-obat').DataTable();
                                tables.ajax.url("{{ url('transaksiobat/getdata')}}").load();
                            var tables=$('#data-table-fixed-header-detail').DataTable();
                                 tables.ajax.url("{{ url('medis/getdataobat')}}?no_transaksi={{$data->no_transaksi}}").load();
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
            
            
        </script>
@endpush