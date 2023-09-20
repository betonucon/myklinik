
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
                                                    <div class="col-xl-7 " >
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><u>Informasi Keluhan Yang dialami</u></legend>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Keluhan Pasien <span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <textarea name="keluhan" value="" placeholder="Ketik...." rows="5" class="form-control form-control-sm">{{$data->keluhan}}</textarea>
                                                           </div>
                                                            
                                                        </div>
                                                        <div class="form-group row m-b-1" >
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Kode Diagnosa<span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                                            <div class="col-lg-9 col-xl-4">
                                                                <div class="input-group input-group-sm ">
                                                                    <input type="text" readonly name="kode_diagnosa"  id="kode_diagnosa" class="form-control">
                                                                    <div class="input-group-addon" onclick="show_diagnosa()">
                                                                        <i class="fa fa-search"></i>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Diagnosa English<span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input type="text" id="diagnosa_eng" name="diagnosa_eng" readonly  placeholder="Ketik...." class="form-control form-control-sm">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-4 text-lg-right col-form-label" style="padding:3px !important">Diagnosa Indonesia<span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <textarea name="diagnosa_ind" id="diagnosa_ind" placeholder="Ketik...." rows="5" class="form-control form-control-sm" readonly></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-xl-5 mb-4" style="border: solid 1px #ceced9; background: #f9f9f9; padding-top: 1%;">
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><u>Surat Keterangan Sakit / Keterangan Sehat</u></legend>
                                                        <div class="form-group row m-b-1">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Pilih Surat <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-7" style="padding: 0.3%; padding-left: 5%;">
                                                                <select class="form-control form-control-sm" onchange="pilih_surat(this.value)" name="surat_id">
                                                                    <option value="0">-- Pilih --</option>
                                                                    <option value="1">- Surat Keterangan Sakit</option>
                                                                    <option value="2">- Surat Keterangan Sehat</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1 skd">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Mulai <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-5" style="padding: 0.3%; padding-left: 5%;">
                                                                <div class="input-group input-group-sm date datetimepicker1" id="">
                                                                    <input type="text" name="mulai" id="" value="" class="form-control datetimepicker1">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1 skd">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Sampai <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-5" style="padding: 0.3%; padding-left: 5%;">
                                                                <div class="input-group input-group-sm date datetimepicker1" id="">
                                                                    <input type="text" name="sampai" id="" value="" class="form-control datetimepicker1">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1  sks">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Berat Badan <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-3" style="padding: 0.3%; padding-left: 5%;">
                                                                <input type="number" name="berat" value="{{$data->berat}}" placeholder="Ketik...." class="form-control form-control-sm typright"> 
                                                           </div>
                                                            <div class="col-lg-9 col-xl-1" style="padding: 0.3%; padding-left: 5%;">
                                                                <p style="font-size:16px">Kg</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-1  sks">
                                                            <label class="col-lg-5 text-lg-right col-form-label" style="padding:3px !important">Tinggi Badan <b>:</b></label>
                                                            <div class="col-lg-9 col-xl-3" style="padding: 0.3%; padding-left: 5%;">
                                                                <input type="number" name="tinggi" value="{{$data->tinggi}}" placeholder="Ketik...." class="form-control form-control-sm typright"> 
                                                           </div>
                                                            <div class="col-lg-9 col-xl-1" style="padding: 0.3%; padding-left: 5%;">
                                                                <p style="font-size:16px">Cm</p>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </form>	
                                            
                                        </div>
                                        <div class="tab-pane fade " id="default-tab-2" >
                                            <form  id="mydata" method="post" action="{{ url('user') }}" enctype="multipart/form-data" >
                                                @csrf
                                                
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
                        url: "{{ url('medis') }}",
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
                                location.assign("{{url('medis')}}")
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