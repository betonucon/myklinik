            <ul class="nav"><li class="nav-header">MENU</li>
                    <li>
						<a href="{{url('/')}}">
							<i class="fab fa-simplybuilt"></i>
							<span>DASHBOARD </span> 
						</a>
					</li>
                    <li @if((Request::is('user')==1 || Request::is('user/*')==1)  ) class="active"  @endif>
						<a href="{{url('/user')}}">
							<i class="fas fa-users"></i>
							<span>USER AKSES </span> 
						</a>
					</li>
					<li class="has-sub @if((Request::is('master')==1 || Request::is('master/*')==1)  ) active  @endif">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-th-large"></i>
							<span>MASTER DATA </span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{url('master/obat')}}"><i class="fas fa-check-circle fa-sm"></i> OBAT</a></li>
							<li><a href="{{url('master/poli')}}"><i class="fas fa-check-circle fa-sm"></i> POLY</a></li>
							<li><a href="{{url('master/dokter')}}"><i class="fas fa-check-circle fa-sm"></i> DOKTER / MEDIS</a></li>
							<li><a href="{{url('master/asuransi')}}"><i class="fas fa-check-circle fa-sm"></i> METODE BAYAR</a></li>
						</ul>
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
					<li class="has-sub">
						<a href="javascript:;">
							<span class="badge pull-right">10</span>
							<i class="fa fa-hdd"></i>
							<span>Email</span>
						</a>
						<ul class="sub-menu">
							<li><a href="email_inbox.html">Inbox</a></li>
							<li><a href="email_compose.html">Compose</a></li>
							<li><a href="email_detail.html">Detail</a></li>
						</ul>
					</li>
					<li>
						<a href="widget.html">
							<i class="fab fa-simplybuilt"></i>
							<span>Widgets <span class="label label-theme">NEW</span></span> 
						</a>
					</li>
					
				</ul>