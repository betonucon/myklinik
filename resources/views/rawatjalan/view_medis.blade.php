
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
			var table=$('#data-table-fixed-header-pasien').DataTable({
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
                    ajax:"{{ url('rawatjalan/getdatakepala')}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'no_kepala', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
                        { data: 'pilih' },
						{ data: 'no_kepala' },
						{ data: 'nama_kepala' },
						
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

			var tableall=$('#data-table-fixed-header-pasien-all').DataTable({
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
                    ajax:"{{ url('pasien/getdata')}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'no_kepala', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
                        { data: 'pilih' },
						{ data: 'no_register' },
                        { data: 'nama_pasien' },
						{ data: 'nik' },
						{ data: 't_lahir' },
						{ data: 'umur' },
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
                $('#cari_data_pasien_all').keyup(function(){
                    table.search($(this).val()).draw() ;
                })

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
                                    PEMRIKSAAN / PASIEN / {{$data->nomor}}
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#default-tab-1" data-toggle="tab" class="nav-link active">
                                                <span class="d-sm-none"><i class="fa fa-list-ol"></i> PROFIL PASIEN</span>
                                                <span class="d-sm-block d-none"><i class="fa fa-list-ol"></i> PROFIL PASIEN</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#default-tab-2" data-toggle="tab" class="nav-link ">
                                                <span class="d-sm-none"><i class="fa fa-list-ol"></i> DIAGNOSA DAN HASIL</span>
                                                <span class="d-sm-block d-none"><i class="fa fa-list-ol"></i> DIAGNOSA DAN HASIL</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#default-tab-3" data-toggle="tab" class="nav-link">
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
                                                    <div class="col-xl-12 ">
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">NO REGISTER : {{$data->no_register}}</legend>
                                                    </div>
                                                    <div class="col-xl-12 mb-4">
                                                       
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">NIK / Nomor KTP <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-8" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->nik}}
                                                            </div>
                                                        </div>
                                                        @if($data->asuransi_id==2)
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">No BPJS</label>
                                                            <div class="col-lg-9 col-xl-8"  style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->nama_asuransi}}
                                                            </div>
                                                        </div>
                                                       @endif
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Nama Pasien <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-8"  style="padding: 0.3%; padding-left: 5%;">
                                                                Tn. {{$data->nama_pasien}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Alamat Pasien <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                {{$data->alamat}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Tanggal Lahir <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-8" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->tgl_lahir}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Usia Pasien <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-8" style="padding: 0.3%; padding-left: 5%;">
                                                                {{$data->umur}} Th
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Jenis Kelamin  <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-8" style="padding: 0.3%; padding-left: 5%;">
                                                                ( {{$data->jenis_kelamin}} ) / {{$data->jk}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Jenis Asuransi  <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-8" style="padding: 0.3%; padding-left: 5%;">
                                                               {{$data->nama_asuransi}}
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </form>	
                                            
                                        </div>
                                        <div class="tab-pane fade active" id="default-tab-2" >
                                            <form  id="mydata" method="post" action="{{ url('user') }}" enctype="multipart/form-data" >
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="id" value="{{$id}}">
                                                    <div class="col-xl-12 ">
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Formulir Hasil Diagnosa dan Hasil Pemeriksaan</legend>
                                                    </div>
                                                    <div class="col-xl-12 mb-4">
                                                    
                                                            <div class="form-group row m-b-1">
                                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Alamat Pasien <span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <textarea name="alamat" value="{{$data->alamat}}" placeholder="Ketik...." rows="3" class="form-control form-control-sm"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </form>	
                                            
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
        <div class="modal fade" id="modal-pasien-all" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" style="max-width:80%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar pasien</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:2%">
                                <div class="col-md-8">
                               
                               </div>
                               <div class="col-md-4">
                                   <input class="form-control" id="cari_data_pasien_all" placeholder="Cari......" type="text" />
                               </div>     
                                        
                            
                        </div>
                        <table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header-pasien-all"  >
                            <thead>
                                <tr role="row">
                                    <th width="2%">No</th>
                                    <th width="2%"></th>
                                    <th width="10%">No Reg</th>
                                    <th>Nama Pasien</th>
                                    <th width="12%">NIK</th>
                                    <th width="10%">T.Lahir</th>
                                    <th width="8%">Umur</th>
                                    
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
        <div class="modal fade" id="modal-pasien" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar pasien</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:2%">
                                        
                                        
                            <div class="col-md-8">
                               
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" id="cari_data_obat" placeholder="Cari......" type="text" />
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header-pasien"  >
                            <thead>
                                <tr role="row">
                                    <th width="2%">No</th>
                                    <th width="2%"></th>
                                    <th width="18%">No Register</th>
                                    <th >Nama Kepala Keluarga</th>
                                    
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
			$('#non_kepala').hide();
			$('.datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
			function show_pasien(){
				$('#modal-pasien').modal('show');
                var tables=$('#data-table-fixed-header-pasien').DataTable();
                    tables.ajax.url("{{ url('rawatjalan/getdatakepala')}}").load();
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
            
			function pilih_status_keluarga(id){
				if(id==2 || id==3){
                    $('#non_kepala').show();
                }else{
                    $('#non_kepala').hide();
                }
			} 
            function pilih_pasien(no_register,nik,nama_pasien,no_bpjs){
                $('#modal-pasien-all').modal('hide');
				$('#no_register').val(no_register)
				$('#nik').val(nik)
				$('#nama_pasien').val(nama_pasien)
				$('#no_bpjs').val(no_bpjs)
			} 
			function pilih(no_kepala,nama_kepala){
                $('#modal-pasien').modal('hide');
				$('#no_kepala').val(no_kepala)
				$('#nama_kepala').val(nama_kepala)
			} 
			function kembali(){
				location.assign("{{url('master/obat')}}")
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
                        url: "{{ url('rawatjalan/edit') }}",
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
                                location.assign("{{url('rawatjalan')}}")
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
            function simpan_data_lama(){
            
                var form=document.getElementById('mydatalama');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('rawatjalan/lama') }}",
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
                                location.assign("{{url('rawatjalan')}}")
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
            
            
        </script>
@endpush