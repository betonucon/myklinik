
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
				function htmlDecode(input) {
					let doc = new DOMParser().parseFromString(input, "text/html");
					return doc.documentElement.textContent;
				}
				var rekammedis=$('#data-table-fixed-header-rekammedis').DataTable({
                    lengthChange:false,
                    ordering:false,
                    paging:true,
                    scrollY:        300,
                    scrollCollapse: true,
                    scroller:       true,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },

                    responsive: false,
					ajax:"{{ url('rekammedis/getdatarm')}}?req={{$data->no_register}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'created_at', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
                        { data: 'created_at' ,render: function (data, type, row, meta) 
							{
								var dates = new Date(Date.parse(row.created_at));
								var month = parseInt(dates.getMonth())+1;
								dates = dates.getDate() + '-' + month  
										+ '-' + dates.getFullYear() +' '+ dates.getHours() + 
										':'+dates.getMinutes()+':'+dates.getSeconds();
								return dates;
							}  
						},
						{ data: 'kode_poli', render: function (data, type, row, meta) 
							{
								switch(row.kode_poli){
									case "P01" : return "UMUM";
									case "P02" : return "GIGI";
									case "P03" : return "KIA";
								}
								return  row.kode_poli;
							}  },
						{ data: 'nomor' },
						{ data: 'skrining_dasar', render: function (data, type, row, meta) 
							{
								return  htmlDecode(row.skrining_dasar);
							}  },
						{ data: 'keluhan' },
						{ data: 'diagnonsa_eng',  render: function (data, type, row, meta) 
							{
								return  row.diagnosa_eng;
							}  },
						{ data: 'diagnonsa_ind',  render: function (data, type, row, meta) 
							{
								return  row.diagnosa_ind;
							} },
						{ data: 'tindak_lanjut' },
						{ data: 'array_obat' },
						
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


		});

		
    </script>
@endpush
@section('content')
    

        <div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Pasien</li>
			</ol>
			<h1 class="page-header">Formulir Pasien<small></small></h1>
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
                            <form  id="mydata" method="post" action="{{ url('pasien') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <div class="col-xl-12 ">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Data Rekam Medis Pasien</legend>
                                    </div>
                                    <div class="col-xl-12 mb-4">
                                        
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">No Register<span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-2">
                                                <input type="text"  disabled value="{{$data->no_register}}" placeholder="Ketik...." class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">NIK / Nomor KTP<span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-5">
                                                <input type="number" name="nik" value="{{$data->nik}}" placeholder="Ketik...." class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">No BPJS</label>
                                            <div class="col-lg-9 col-xl-5">
                                                <input type="number" name="no_bpjs" value="{{$data->no_bpjs}}" placeholder="Ketik...." class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Nama Pasien <span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input type="text" name="nama_pasien" value="{{$data->nama_pasien}}" placeholder="Ketik...." class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Alamat Pasien <span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-8">
                                                <textarea name="alamat" value="{{$data->alamat}}" placeholder="Ketik...." rows="3" class="form-control form-control-sm">{{$data->alamat}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Tanggal Lahir<span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                                
                                                <div class="input-group input-group-sm date datetimepicker1" id="">
                                                    <input type="text" name="tgl_lahir" id="" value="{{$data->tgl_lahir}}" class="form-control datetimepicker1">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Jenis Kelamin <span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-4">
                                            
                                                <select class="form-control form-control-sm" name="jenis_kelamin">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="L" @if($data->jenis_kelamin=='L') selected @endif >- Laki-Laki</option>
                                                    <option value="P" @if($data->jenis_kelamin=='P') selected @endif >- Perempuan</option>
                                                    
                                                </select>
                                                    
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-1">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Status Dalam Keluarga <span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-4">
                                            
                                                <select class="form-control form-control-sm" onchange="pilih_status_keluarga(this.value)" name="status_keluarga">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1" @if($data->status_keluarga==1) selected @endif >- Kepala Keluarga</option>
                                                    <option value="2" @if($data->status_keluarga==2) selected @endif >- Istri</option>
                                                    <option value="3" @if($data->status_keluarga==3) selected @endif >- Anak</option>
                                                    
                                                </select>
                                                    
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row m-b-1" id="non_kepala">
                                            <label class="col-lg-3 text-lg-right col-form-label" style="padding:3px !important">Register Utama<span class="text-danger" style="font-size:18px;margin-top:0px">*</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                                <div class="input-group input-group-sm ">
                                                    <input type="text" readonly name="no_kepala" value="{{$data->no_kepala}}" id="no_kepala" class="form-control">
                                                    <div class="input-group-addon" onclick="show_pasien()">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-9 col-xl-3">
                                                
                                                    <input type="text"  name="nama_kepala" value="{{$data->nama_kepala}}" id="nama_kepala" class="form-control form-control-sm">
                                                    
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
                            </form>	
						</div>
						<table class="table table-striped table-bordered table-td-valign-middle dataTable no-footer" id="data-table-fixed-header-rekammedis"  >
                            <thead>
                                <tr role="row">
                                    <th width="2%">No</th>
                                    <th width="2%">Tanggal Berobat</th>
                                    <th width="2%">Poli</th>
                                    <th width="2%">Nomor Antrean</th>
                                    <th width="10%">Skrining Dasar</th>
                                    <th width="15%">Keluhan Dan Anamnesa</th>
                                    <th width="10%">Diagnosa Inggris</th>
                                    <th width="10%">Diagnosa Indonesia</th>
                                    <th width="10%">Therapy atau Tindakkan yang Dilakukan Tenaga Kesehatan</th>
                                    <th width="10%">Resep Obat</th>
                                    
                                </tr>
                            </thead>
                        </table>
                        <div class="panel-body" style="margin-top:1%;background: #f5f5fb; padding: 1%;">
                            <div class="row">
                                <!-- begin col-8 -->
                                <div class="col-xl-12 ">
                                    <a href="javascript:;" onclick="kembali()" class="btn btn-danger m-r-5"><i class="fa fa-step-backward"></i> Kembali</a>
                                    <a href="javascript:;"  onclick="simpan_data()"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Submit</a>
                                    
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>   
        <div class="modal fade" id="modal-pasien" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar Kepala keluarga</h4>
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
			
            @if($data->status_keluarga==1)
                $('#non_kepala').hide();
            @else
                $('#non_kepala').show();
            @endif

            $('.datetimepicker1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
			function tambah(id){
				location.assign("{{url('master/dokter/view')}}?id="+id)
			} 
            function show_pasien(){
				$('#modal-pasien').modal('show');
                var tables=$('#data-table-fixed-header-pasien').DataTable();
                    tables.ajax.url("{{ url('rawatjalan/getdatakepala')}}").load();
			} 
			
			function pilih_status_keluarga(id){
				if(id==2 || id==3){
                    $('#non_kepala').show();
                }else{
                    $('#non_kepala').hide();
                }
			} 
			function pilih(no_kepala,nama_kepala){
                $('#modal-pasien').modal('hide');
				$('#no_kepala').val(no_kepala)
				$('#nama_kepala').val(nama_kepala)
			} 
			function kembali(){
				location.assign("{{url('master/dokter')}}")
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
                        url: "{{ url('pasien') }}",
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
                                location.assign("{{url('pasien')}}")
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
            function delete_data(id,act){
                if(act==2){
                    Swal.fire({
                        title: "Yakin menghapus user ini ?",
                        text: "data akan hilang dari data user  ini",
                        type: "warning",
                        icon: "error",
                        showCancelButton: true,
                        align:"center",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes",
                        closeOnConfirm: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'GET',
                                    url: "{{url('master/dokter/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('master/dokter/getdata')}}").load();
                                    }
                                });
                                
                            }
                        
                    });
                }
                if(act==1){
                    Swal.fire({
                        title: "Yakin non aktifkan user ini ?",
                        text: "",
                        type: "warning",
                        icon: "info",
                        showCancelButton: true,
                        align:"center",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes",
                        closeOnConfirm: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'GET',
                                    url: "{{url('master/dokter/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('master/dokter/getdata')}}").load();
                                    }
                                });
                                
                            }
                        
                    });
                }
                if(act==3){
                    Swal.fire({
                        title: "Yakin mengaktifkan user ini ?",
                        text: "",
                        type: "warning",
                        icon: "info",
                        showCancelButton: true,
                        align:"center",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes",
                        closeOnConfirm: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'GET',
                                    url: "{{url('master/dokter/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('master/dokter/getdata')}}").load();
                                    }
                                });
                                
                            }
                        
                    });
                }
                
            } 
            
        </script>
@endpush