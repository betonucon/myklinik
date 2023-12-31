
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
			

		});

		
    </script>
@endpush
@section('content')
    

        <div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Obat</li>
			</ol>
			<h1 class="page-header">Formulir Obat<small></small></h1>
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
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Formulir data obat</legend>
                                    </div>
                                    <div class="col-xl-12 ">
                                        @if($id>0)
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Kode Obat <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-2">
                                                <input type="text" disabled value="{{$data->kode_obat}}" placeholder="Ketik...." class="form-control">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Nama Obat <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input type="text" name="nama_obat" value="{{$data->nama_obat}}" placeholder="Ketik...." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Satuan <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                            
                                                <select class="form-control" name="satuan">
                                                    <option value="">-- Pilih --</option>
                                                    @foreach(get_satuan() as $gt)
                                                        <option value="{{$gt->satuan}}" @if($data->satuan==$gt->satuan) selected @endif >- {{$gt->satuan}}</option>
                                                    @endforeach
                                                </select>
                                                    
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Harga <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-2">
                                                <input type="text" name="harga" value="{{$data->harga}}" placeholder="Ketik...." class="form-control typeuang">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-2 text-lg-right col-form-label">Keterangan <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-10">
                                                <input type="text" name="keterangan" value="{{$data->keterangan}}" placeholder="Ketik...." class="form-control">
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
                                    <a href="javascript:;"  onclick="simpan_data()"  class="btn btn-primary m-r-5"><i class="fa fa-save"></i> Submit</a>
                                    
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>       
@endsection
@push('ajax')
        
        <script type="text/javascript">
			
			function tambah(id){
				location.assign("{{url('obat/view')}}?id="+id)
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
                        url: "{{ url('master/obat') }}",
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
                                location.assign("{{url('master/obat')}}")
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
                                    url: "{{url('master/obat/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('master/obat/getdata')}}").load();
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
                                    url: "{{url('master/obat/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('master/obat/getdata')}}").load();
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
                                    url: "{{url('master/obat/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('master/obat/getdata')}}").load();
                                    }
                                });
                                
                            }
                        
                    });
                }
                
            } 
            
        </script>
@endpush