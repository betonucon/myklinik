            <ul class="nav">
				<li class="nav-header">MENU</li>
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
							<li class="nav-header">MASTER</li>
							<li  @if((Request::is('pasien')==1 || Request::is('pasien/*')==1)  ) class="active"  @endif>
								<a href="{{url('pasien')}}">
									<i class="fas fa-users"></i>
									<span>DAFTAR PASIEN </span> 
								</a>
							</li>
							
							<li  @if((Request::is('master/dokter')==1 || Request::is('master/dokter/*')==1)  ) class="active"  @endif>
								<a href="{{url('master/dokter')}}">
									<i class="fas fa-users"></i>
									<span>DAFTAR DOKTER </span> 
								</a>
							</li>
							<li  @if((Request::is('master/asuransi')==1 || Request::is('master/asuransi/*')==1)  ) class="active"  @endif>
								<a href="{{url('master/asuransi')}}">
									<i class="fas fa-money-bill-alt"></i>
									<span>METODE BAYAR </span> 
								</a>
							</li>
							<li class="nav-header">TRANSAKSI</li>
							<li  @if((Request::is('rawatjalan')==1 || Request::is('rawatjalan/*')==1)  ) class="active"  @endif>
								<a href="{{url('rawatjalan')}}">
									<i class="fas fa-list-alt"></i>
									<span>PENDAFTARAN </span> 
								</a>
							</li>
						
						@endif
						
					@endif
					
					@if(Auth::user()->role_id==3)
					<li  @if((Request::is('rawatjalan/pasien')==1 || Request::is('rawatjalan/pasien/*')==1)  ) class="active"  @endif>
						<a href="{{url('rawatjalan/pasien')}}">
							<i class="fas fa-users"></i>
							<span>DAFTAR PASIEN </span> 
						</a>
					</li>
					<li  @if((Request::is('medis')==1 || Request::is('medis/*')==1)  ) class="active"  @endif>
						<a href="{{url('medis')}}">
							<i class="fas fa-medkit"></i>
							<span>PEMERIKSAAN PASIEN </span> 
						</a>
					</li>
					<li  @if((Request::is('rawatjalan/rekamedis')==1 || Request::is('rawatjalan/rekamedis/*')==1)  ) class="active"  @endif>
						<a href="{{url('rawatjalan/rekamedis')}}">
							<i class="fas fa-server"></i>
							<span>REKAMEDIS </span> 
						</a>
					</li>
					
					@endif
					@if(Auth::user()->role_id==4)
					<li  @if((Request::is('master/obat')==1 || Request::is('master/obat/*')==1)  ) class="active"  @endif>
						<a href="{{url('master/obat')}}">
							<i class="fas fa-cubes"></i>
							<span>DAFTAR OBAT </span> 
						</a>
					</li>
					<li  @if(Request::is('transaksiobat')==1  ) class="active"  @endif>
						<a href="{{url('transaksiobat')}}">
							<i class="fas fa-retweet"></i>
							<span>STOK OBAT </span> 
						</a>
					</li>
					<li  @if((Request::is('transaksiobat/persediaan')==1 || Request::is('transaksiobat/persediaan/*')==1)  ) class="active"  @endif>
						<a href="{{url('transaksiobat/persediaan')}}">
							<i class="fas fa-shopping-cart"></i>
							<span>ORDER OBAT </span> 
						</a>
					</li>
					
					<li  @if((Request::is('apotik')==1 || Request::is('apotik/*')==1)  ) class="active"  @endif>
						<a href="{{url('apotik')}}">
							<i class="fas fa-share-square"></i>
							<span>PERMINTAAN OBAT </span> 
						</a>
					</li>
					@endif
					
					
				</ul>