
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Page with Top Menu</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	
	<div id="page-container" style="padding-top: 0px;" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
		<!-- begin #header -->
		<!-- <div id="header" class="header navbar-default">
			
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
				<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
		</div> -->
		<!-- end #header -->
		
		<!-- begin #content -->
		<div id="content" class="content" style="padding: 10px;">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12" style="font-size:170px; font-weight:bold;text-align:center">
							<div class="panel">
						
								<div class="panel-body" id="nomor-aktif" style="height:270px;padding: 1px; font-family: sans-serif;">
									
								</div>
							</div>
						
						</div>
					</div>
					<div class="row" style="padding: 2%;" id="tampil-urutan">
						
						
						
						
					</div>
				
				</div>
				<div class="col-md-8">
				<marquee style=" text-transform: uppercase; font-size: 15px; background: yellow; padding: 1%; font-weight: bold; ">Klinik Bidan Uwen Yuheni Serang  *  Jl. K.H. Abdul Hadi No.06, Kebon Jahe, Kec. Serang, Kota Serang, Banten 42117 * Nomor telepon: 0878-0936-3812.</marquee>
					<div class="panel">
						
						<div class="panel-body" style="padding: 3px;">
						
							<iframe width="100%" height="530" src="https://www.youtube.com/embed/0RH_RarRDNo?autoplay=1&mute=1" title="NUSSA : SONG COMPILATION VOL. 1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>
		
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{url_plug()}}/assets/js/app.min.js"></script>
	<script src="{{url_plug()}}/assets/js/theme/default.min.js"></script>
	<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
	<script >
		function load_data(){
			$.ajax({ 
			type: 'GET', 
			url: "{{ url('rawatjalan/getdatalayar')}}?kode_poli={{$kode_poli}}", 
			data: { id: 1 }, 
			dataType: 'json',
			beforeSend: function() {
				$('#tampil-urutan').html("")
				
			},
			success: function (data) {
				
				$('#nomor-aktif').html(data.nomor_aktif);
				
				$.each(data.item, function(i, result){
					$("#tampil-urutan").append('<div class="col-md-3"  style="font-size:30px; font-weight:bold;text-align:center;background:#fff;border:solid 1px #aaaab7">'
						+result.nomor
						+'</div>');
					});
					
				}
			
			});
		}

		$(document).ready(function() {
			load_data()
		});

		Pusher.logToConsole = false;

        var pusher = new Pusher('8222b3d50f9312cb70e7', {
            cluster: 'ap1',
            // forceTLS: true
        });

        var channel = pusher.subscribe('my-chanel');
        channel.bind('kirim-created', function(data) {
			
            var pesan = data.message;
            var bat = pesan.split('@');
			if(bat[2]=="{{$kode_poli}}"){
				load_data()
			}
			
            
        });
	</script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>