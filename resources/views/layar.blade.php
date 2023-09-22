
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
		
		<!-- begin #content -->
		<div id="content" class="content" style="padding: 10px;">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12" style="background: #fff;border: double 6px #3c3cb3;font-size:170px; font-weight:bold;text-align:center">
							<div class="panel">
						
								<div class="panel-body" id="nomor-aktif" style="color: #31317c;height: 190px; border-bottom: solid 3px; padding-bottom: 4% !important; padding: 1px; font-family: sans-serif; font-size: 140px;">
									
								</div>
								<div class="panel-body" id="nama_pasien" style="color: #31317c;text-transform:uppercase;font-size:53px;height:70px;padding: 1px; font-family: sans-serif;color:blue">
									
								</div>
							</div>
						
						</div>
					</div>
					<div class="row" style="padding-top: 1%;" id="tampil-urutan">
						
						
						
						
					</div>
				
				</div>
				<div class="col-md-8">
				<marquee style=" text-transform: uppercase; font-size: 15px; background: yellow; padding: 1%; font-weight: bold; ">Klinik Bidan Uwen Yuheni Serang  *  Jl. K.H. Abdul Hadi No.06, Kebon Jahe, Kec. Serang, Kota Serang, Banten 42117 * Nomor telepon: 0878-0936-3812.</marquee>
					<div class="panel">
						
						<div class="panel-body" style="padding: 3px;">
							@if($kode_poli=='P01')
							<iframe width="100%" height="790" src="https://www.youtube.com/embed/kShW7sDabTE?autoplay=1&amp;mute=1&loop=1&playlist=kShW7sDabTE" title="NUSSA : SONG COMPILATION VOL. 1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							@endif
							@if($kode_poli=='P02')
							<iframe width="100%" height="790" src="https://www.youtube.com/embed/nroyp6xuHII?autoplay=1&amp;mute=1&loop=1&playlist=nroyp6xuHII" title="NUSSA : SONG COMPILATION VOL. 1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							@endif
							@if($kode_poli=='P03')
							<iframe width="100%" height="790" src="https://www.youtube.com/embed/0RH_RarRDNo?autoplay=1&amp;mute=1&loop=1&playlist=0RH_RarRDNo" title="NUSSA : SONG COMPILATION VOL. 1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							@endif
							
						</div>
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>
		
	</div>
	<!-- end page container -->
	<audio id="myAudio">
        <source src="{{url_plug()}}/img/ping.mp3" type="audio/mp3">
    </audio>
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
				$('#nama_pasien').html(data.singkatan);
				
				$.each(data.item, function(i, result){
					$("#tampil-urutan").append('<div class="col-md-3"  style="margin-bottom:1%;color:yellow;font-size:25px; font-weight:bold;text-align:center;background:#32326c;border: double 4px #3c3cb3; border-right: 0px;s">'
						+result.nomor
						+'</div>'
						+'<div class="col-md-9"  style="margin-bottom:1%;color:yellow;text-transform:uppercase;font-size:25px; font-weight:bold;text-align:left;background:#32326c;border: double 4px #3c3cb3; border-left: 0px;">'
						+result.singkatan
						+'</div>');
					});
					
				}
			
			});
		}

		$(document).ready(function() {
			load_data()
			// var adu = document.getElementById("myAudio");
			// adu.play();
		});

		Pusher.logToConsole = false;

        var pusher = new Pusher('8222b3d50f9312cb70e7', {
            cluster: 'ap1',
            // forceTLS: true
        });

        var channel = pusher.subscribe('my-chanel');
        channel.bind('kirim-created', function(data) {
			var adu = document.getElementById("myAudio");
            var pesan = data.message;
            var bat = pesan.split('@');
			if(bat[2]=="{{$kode_poli}}"){
				if(bat[3]==22){
					adu.play();
				}
				load_data();
			}
			
            
        });
	</script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>