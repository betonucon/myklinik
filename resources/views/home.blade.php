
@extends('layouts.app')
@push('datatable')
 
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
                url: "{{ url('home/getdatadashboard')}}", 
                data: { id: 1 }, 
                dataType: 'json',
                beforeSend: function() {
                    $('#tampil-urutan').html("")
                    
                },
                success: function (data) {
                    
                    $('#nilai-antrian').html(data.antrian);
                    $('#nilai-proses').html(data.proses);
                    $('#nilai-selesai').html(data.selesai);
                    $('#nilai-bayi').html(data.bayi);
                    $('#nilai-dewasa').html(data.dewasa);
                    $('#nilai-lansia').html(data.lansia);
                    $('#nilai-anak').html(data.anak);
                    $('#nilai-umum').html(data.umum);
                    $('#nilai-gigi').html(data.gigi);
                    $('#nilai-aki').html(data.aki);
                    
                    
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
                    ajax:"{{ url('user/getdata')}}",
                    dom: 'lrtip',
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'username' },
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
            }
        };


        $(document).ready(function() {
			show_data();
            load_data();
		});

		
    </script>
@endpush
@section('content')
    

        <div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard</h1>
			<!-- end page-header -->
            <div class="row">
                <div class="col-xl-8 col-md-8">
                    <div class="row">
                        <!-- begin col-3 -->
                        <div class="col-xl-4 col-md-6">
                            <div class="widget widget-stats bg-blue">
                                <div class="stats-icon"><i class="fa fa-users"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL PASIEN </h4>
                                    <p id="nilai-antrian"></p>	
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <!-- end col-3 -->
                        <!-- begin col-3 -->
                        <div class="col-xl-4 col-md-6">
                            <div class="widget widget-stats bg-info">
                                <div class="stats-icon"><i class="fa fa-users"></i></div>
                                <div class="stats-info">
                                    <h4>PROSES PELAYANAN</h4>
                                    <p id="nilai-proses"></p>	
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <!-- end col-3 -->
                        <!-- begin col-3 -->
                        <div class="col-xl-4 col-md-6">
                            <div class="widget widget-stats bg-orange">
                                <div class="stats-icon"><i class="fa fa-users"></i></div>
                                <div class="stats-info">
                                    <h4>SELESAI</h4>
                                    <p id="nilai-selesai"></p>	
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading ui-sortable-handle">
							<h4 class="panel-title">PROFIL</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
                        <div class="panel-body">
                            <div class="row" style="background: #e8e8f1; padding-top: 1%;padding-bottom: 1%;">
                                <div class="col-xl-4 col-md-4">
                                    <div id="gallery" class="gallery" >
				
                                        <div class="image gallery-group-1" style="width: 100%;">
                                            <div class="image-inner" style="margin-bottom: 2%;">
                                                <a href="{{url_plug()}}/assets/img/gallery/gallery-1.jpg" data-lightbox="gallery-group-1">
                                                    <div class="img" style="height: 140px;background-image: url({{url_plug()}}/img/poli2.png)"></div>
                                                </a>
                                                <p class="image-caption">
                                                    POLI IBU DAN ANAK
                                                </p>
                                            </div>
                                            <div class="image-inner" style="margin-bottom: 2%;">
                                                <a href="{{url_plug()}}/assets/img/gallery/gallery-1.jpg" data-lightbox="gallery-group-1">
                                                    <div class="img" style="height: 140px;background-image: url({{url_plug()}}/img/poli1.png)"></div>
                                                </a>
                                                <p class="image-caption">
                                                    POLI UMUM
                                                </p>
                                            </div>
                                            <div class="image-inner" style="margin-bottom: 2%;">
                                                <a href="{{url_plug()}}/assets/img/gallery/gallery-1.jpg" data-lightbox="gallery-group-1">
                                                    <div class="img" style="height: 140px;background-image: url({{url_plug()}}/img/poli3.png)"></div>
                                                </a>
                                                <p class="image-caption">
                                                    POLI GIGI
                                                </p>
                                            </div>
                                            <!-- <div class="image-info">
                                                <h5 class="title">Lorem ipsum dolor sit amet</h5>
                                                <div class="pull-right">
                                                    <small>by</small> <a href="javascript:;">Sean Ngu</a>
                                                </div>
                                                <div class="rating">
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                </div>
                                                <div class="desc">
                                                    Nunc velit urna, aliquam at interdum sit amet, lacinia sit amet ligula. Quisque et erat eros. Aenean auctor metus in tortor placerat, non luctus justo blandit.
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-8">
                                    <div class="alert alert-warning fade show" style="text-align:center">
                                        <h3>Klinik Bidan Uwen Yuheni Serang (Klinik Bidan Uwen Yuheni)</h3>
                                        <table width="100%" border="1">
                                            <tr>
                                                <td width="30%"><b>NAMA KLINIK</b></td>
                                                <td  width="5%"><b>:</b></td>
                                                <td>Klinik Bidan Uwen Yuheni Serang</td>
                                            </tr>
                                            <tr>
                                                <td><b>ALAMAT</b></td>
                                                <td><b>:</b></td>
                                                <td>Jl. K.H. Abdul Hadi No.06, Kebon Jahe, Kec. Serang, Kota Serang, Banten 42117</td>
                                            </tr>
                                            <tr>
                                                <td><b>NO TELEPON</b></td>
                                                <td><b>:</b></td>
                                                <td>0878-0936-3812</td>
                                            </tr>
                                            <tr>
                                                <td><b>LAYANAN</b></td>
                                                <td><b>:</b></td>
                                                <td>POLI UMUM , POLI GIGI , POLI IBU DAN ANAK</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <iframe style="background:#fff;padding:2%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0370816518707!2d106.15763547389443!3d-6.125712360061653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418ad3e67241b7%3A0x7da586cdec21b102!2sKlinik%20Bidan%20Uwen%20Yuheni%20Serang!5e0!3m2!1sen!2sid!4v1695200301980!5m2!1sen!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
						
					</div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading ui-sortable-handle">
							<h4 class="panel-title">KATEGORI PASIEN</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-valign-middle table-panel mb-0">
								<thead>
									<tr>	
										<th>USIA (Th)</th>
										<th>PASIEN</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="font-size:15px">0-1 (Bayi)</td>
										<td ><label class="label label-primary" style="font-size:15px" id="nilai-bayi"></label></td>
										
									</tr>
									<tr>
										<td style="font-size:15px">5-12 (Anak-Anak)</td>
										<td ><label class="label label-primary" style="font-size:15px" id="nilai-anak"></label></td>
										
									</tr>
									<tr>
										<td style="font-size:15px">13-59 (Dewasa)</td>
										<td ><label class="label label-primary" style="font-size:15px" id="nilai-dewasa"></label></td>
										
									</tr>
									<tr>
										<td style="font-size:15px">60 (Lansia)</td>
										<td ><label class="label label-primary" style="font-size:15px" id="nilai-lansia"></label></td>
										
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
                    <div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading ui-sortable-handle">
							<h4 class="panel-title">KUNJUNGAN POLI</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-valign-middle table-panel mb-0">
								<thead>
									<tr>	
										<th>POLI</th>
										<th>PASIEN</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="font-size:15px;background:#7eeda1;font-weight:bold">UMUM</td>
										<td ><label class="label label-warning" style="font-size:15px" id="nilai-umum"></label></td>
										
									</tr>
									<tr>
										<td style="font-size:15px;background:#cfed5e;font-weight:bold">GIGI</td>
										<td ><label class="label label-warning" style="font-size:15px" id="nilai-gigi"></label></td>
										
									</tr>
									<tr>
										<td style="font-size:15px;background:aqua;font-weight:bold">IBU DAN ANAK</td>
										<td ><label class="label label-warning" style="font-size:15px" id="nilai-aki"></label></td>
										
									</tr>
									
									
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
			
		</div>       
@endsection
@push('ajax')
        
        <script type="text/javascript">
			
			function tambah(id){
				$('#modal-form').modal('show')
				$('#tampil-form').load("{{url('user/modal')}}?id="+id)
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
                                        tables.ajax.url("{{ url('user/getdata')}}").load();
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
                                    url: "{{url('user/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('user/getdata')}}").load();
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
                                    url: "{{url('user/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('user/getdata')}}").load();
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
                                    url: "{{url('user/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('user/getdata')}}").load();
                                    }
                                });
                                
                            }
                        
                    });
                }
                
            } 
            function kembali_diproses(id,act){
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
                                    url: "{{url('user/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('user/getdata')}}").load();
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
                                    url: "{{url('user/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('user/getdata')}}").load();
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
                                    url: "{{url('user/delete')}}",
                                    data: "id="+id+"&act="+act,
                                    success: function(msg){
                                        Swal.fire({
                                            title: "Sukses diproses",
                                            type: "warning",
                                            icon: "success",
                                            
                                            align:"center",
                                            
                                        });
                                        var tables=$('#data-table-fixed-header').DataTable();
                                            tables.ajax.url("{{ url('user/getdata')}}").load();
                                    }
                                });
                                
                            }
                        
                    });
                }
                
            } 
        </script>
@endpush