            <ul class="nav"><li class="nav-header">MENU</li>
                    <li>
						<a href="{{url('/')}}">
							<i class="fa fa-th-large"></i>
							<span>DASHBOARD </span> 
						</a>
					</li>
					@if(Auth::user()->role_id==1 || Auth::user()->role_id==2)
						@if(Auth::user()->role_id==1)
						<li @if((Request::is('user')==1 || Request::is('user/*')==1)  ) class="active"  @endif>
							<a href="{{url('/user')}}">
								<i class="fas fa-users"></i>
								<span>USER AKSES </span> 
							</a>
						</li>
						
						<li class="has-sub @if((Request::is('transaksiobat')==1 || Request::is('transaksiobat/*')==1)  ) active  @endif">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-th-large"></i>
								<span>TRANSAKSI OBAT </span>
							</a>
							<ul class="sub-menu">
								<li><a href="{{url('transaksiobat')}}"><i class="fas fa-check-circle fa-sm"></i> STOK OBAT</a></li>
								<li><a href="{{url('transaksiobat/persediaan')}}"><i class="fas fa-check-circle fa-sm"></i> ORDER OBAT</a></li>
								<li><a href="{{url('transaksiobat/permintaan')}}"><i class="fas fa-check-circle fa-sm"></i> PERMINTAAN OBAT</a></li>
							</ul>
						</li>
						@endif
						@if(Auth::user()->role_id==2)
						<li class="has-sub @if((Request::is('master')==1 || Request::is('master/*')==1)  ) active  @endif">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-bars"></i>
								<span>MASTER DATA </span>
							</a>
							<ul class="sub-menu">
								<li><a href="{{url('master/obat')}}"><i class="fas fa-check-circle fa-sm"></i> OBAT</a></li>
								<li><a href="{{url('master/poli')}}"><i class="fas fa-check-circle fa-sm"></i> POLY</a></li>
								<li><a href="{{url('master/dokter')}}"><i class="fas fa-check-circle fa-sm"></i> DOKTER / MEDIS</a></li>
								<li><a href="{{url('master/asuransi')}}"><i class="fas fa-check-circle fa-sm"></i> METODE BAYAR</a></li>
							</ul>
						</li>
						@endif
						
					@endif
					@if(Auth::user()->role_id==2)
					<li class="has-sub @if((Request::is('rawatjalan')==1 || Request::is('rawatjalan/*')==1)  ) active  @endif">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-building"></i>
							<span>RAWAT JALAN </span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{url('rawatjalan')}}"><i class="fas fa-check-circle fa-sm"></i> PENDAFTARAN</a></li>
							<li><a href="{{url('rawatjalan/pasien')}}"><i class="fas fa-check-circle fa-sm"></i> PASIEN</a></li>
							<li><a href="{{url('rawatjalan/rekamedis')}}"><i class="fas fa-check-circle fa-sm"></i> REKAM MEDIS</a></li>
							
						</ul>
					</li>
					@endif
					@if(Auth::user()->role_id==3)
					<li class="has-sub @if((Request::is('rawatjalan')==1 || Request::is('rawatjalan/*')==1 || Request::is('medis')==1 || Request::is('medis/*')==1)  ) active  @endif">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-th-large"></i>
							<span>PEMERIKSAAN  </span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{url('medis')}}"><i class="fas fa-check-circle fa-sm"></i> PEMERIKSAAN</a></li>
							<li><a href="{{url('rawatjalan/pasien')}}"><i class="fas fa-check-circle fa-sm"></i> PASIEN</a></li>
							<li><a href="{{url('rawatjalan/rekamedis')}}"><i class="fas fa-check-circle fa-sm"></i> REKAM MEDIS</a></li>
							
						</ul>
					</li>
					@endif
					@if(Auth::user()->role_id==4)
					<li  @if((Request::is('master/obat')==1 || Request::is('master/obat/*')==1)  ) class="active"  @endif>
						<a href="{{url('master/obat')}}">
							<i class="fas fa-cubes"></i>
							<span>DAFTAR OBAT </span> 
						</a>
					</li>
					<li class="has-sub @if((Request::is('transaksiobat')==1 || Request::is('transaksiobat/*')==1)  ) active  @endif">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-th-large"></i>
							<span>TRANSAKSI OBAT </span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{url('transaksiobat')}}"><i class="fas fa-check-circle fa-sm"></i> STOK OBAT</a></li>
							<li><a href="{{url('transaksiobat/persediaan')}}"><i class="fas fa-check-circle fa-sm"></i> ORDER OBAT</a></li>
							<li><a href="{{url('transaksiobat/permintaan')}}"><i class="fas fa-check-circle fa-sm"></i> PERMINTAAN OBAT</a></li>
						</ul>
					</li>
					<li  @if((Request::is('apotik')==1 || Request::is('apotik/*')==1)  ) class="active"  @endif>
						<a href="{{url('apotik')}}">
							<i class="fas fa-cubes"></i>
							<span>PERMINTAAN OBAT </span> 
						</a>
					</li>
					@endif
					
					
				</ul>