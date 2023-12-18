<html>
    <head>
        <title>CETAK</title>
        <style>
            html{
                color:#000;
                margin:5px 5px 5px 5px;
                font-family: sans-serif;
            }
            
            table{
                border-collapse:collapse;
            }
            .tth{
                text-align:center;
                font-size:20px;
            }
            .tthl{
                text-align:left;
                font-size:13px;
            }
            .tthlg{
                text-align:left;
                font-weight:bold;
                font-size:13px;
            }
            .tthlb{
                text-align:left;
                font-size:13px;
            }
            .ttd{
                border:solid 1px #000;
                padding:0px 4px 0px 4px;
                font-size:13px;
               
            }
            .ttdr{
                border:solid 1px #000;
                padding:0px 4px 0px 4px;
                font-size:13px;
                text-align:right;
            }
            .ttdro{
                border-right:solid 1px #000;
                padding:0px 4px 0px 4px;
                font-size:13px;
                text-align:right;
            }
            .ttdc{
                border:solid 1px #000;
                padding:0px 4px 0px 4px;
                font-size:13px;
                text-align:center;
            }
            .ttdh{
                text-align:center;
                text-transform:uppercase;
                border:solid 1px #000;
                padding:4px 4px 4px 4px;
                font-size:13px;
               
            }
            .boody{
                width:97%;
                border:solid 1px #fff;
                height:500px;
                display:block;
                padding:2px 2px 2px 2px;
            }
        </style>
    </head>
    <body>
       
        <div class="boody">
            <table width="100%" >
                <tr>
                    @if($data->surat_id==1)
                    <td style="padding:1%;vertical-align:top;border:double 6px #000">
                    
                        <table width="100%" >
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:20px"><b>KLINIK UWEN YUHENI</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Nomor Perijinan : 82100142116710001</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Jalan KH. Abdul Hadi RT 02 RW 14 Kebon Jahe</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Serang – Banten 42117</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Telp. (0254) 7915161, HP/WA. 087809363812, IG: klinikuyuheni</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b><hr style="border:double 1px #000;margin-bottom:4px"></b></td>
                            </tr>
                           
                            <tr>
                                 <td class="tthlb" colspan="2" style="padding:5px;margin:3%;text-align:center;font-weight:bold"><br><u>SURAT KETERANGAN DOKTER</u></br></br></td>
								 <td class="tthlb" colspan="2" style="padding:5px;margin:3%;text-align:center;font-weight:bold">No:</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Yang bertanda tangan dibawah ini menyatakan dengan sesungguhnya bahwa :</td>
                            </tr>
                            
                            
                            <tr>
                                <td style="padding-bottom:5px;" width="35%" class="tthlg">Nama </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->nama_pasien}}</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Umur </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->umur}}</td>
                             </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Pekerjaan </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->pekerjaan}} </td>
                             </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Pada Tanggal </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{date('d M ,Y',strtotime($data->waktu))}} </td>
                             </tr>
                            
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Sudah dilakukan pemeriksaan kesehatan pada orang </td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> tersebut dengan hasil :</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;a. Sehat / tidak sehat</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;b. Perlu istirahat karena sakit selama :   &nbsp;&nbsp;  Hari</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dari tanggal : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  s/d  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            
                            <tr>
                                <td class="tthlg"></td>
                                <td class="tthlb" style="text-align:center"><br><br><br><br><b>Serang, {{date('d M Y',strtotime($data->waktu))}}<br><br><br><br><br><br>(................................)</b></td>
                            </tr>
                            <!-- <tr>
                                <td class="tthlg" width="8%">NOMOR</td>
                                <td class="tthlb"  width="14%">: {{$data->no_transaksi}}</td>
                                <td class="tthlg">KONSUMEN</td>
                                <td class="tthlb">: {{$data->konsumen}}</td>
                                <td class="tthlg">TANGGAL</td>
                                <td class="tthlb"  width="18%">: {{tanggal_eng($data->waktu)}}</td>
                                <td class="tthlg" width="9%" style="text-align:right">BAYAR :</td>
                                <td class="tthlb" style="text-align:right"> {{$data->mstatuskeuangan['status_keuangan']}}</td>
                            </tr> -->
                            
                        </table>
                        
                    </td>
					@endif
                    @if($data->surat_id==2)
                    <td style="padding:1%;vertical-align:top;border:double 6px #000">
                    
                        <table width="100%" >
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:20px"><b>KLINIK UWEN YUHENI</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Sertifikat Standar : 82100142116710001</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Jalan KH. Abdul Hadi RT 02 RW 14 Kebon Jahe</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Serang – Banten 42117</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b>Telp. (0254) 7915161, HP/WA. 087809363812, IG: klinikuyuheni</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="2" style="padding:0px;text-align:center;font-size:12px"><b><hr style="border:double 1px #000;margin-bottom:4px"></b></td>
                            </tr>
                           
                            <tr>
                                 <td class="tthlb" colspan="2" style="padding:5px;margin:3%;text-align:center;font-weight:bold"><br><u>SURAT KETERANGAN DOKTER</u></br></br></td>
                                 <td class="tthlb" colspan="2" style="padding:5px;margin:3%;text-align:center;font-weight:bold">No:</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Yang bertanda tangan dibawah ini menyatakan dengan sesungguhnya bahwa :</td>
                            </tr>
                            
                            
                            <tr>
                                <td style="padding-bottom:5px;" width="35%" class="tthlg">Nama </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->nama_pasien}}</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Umur </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->umur}}</td>
                             </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Alamat </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data2->alamat}} </td>
                             </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Sudah melakukan pemeriksaan pada tanggal </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{date('d-m-Y',strtotime($data->waktu))}} </td>
                             </tr>
                            
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Dilakukan pemeriksaan kesehatan untuk keperluan :</td>
                            </tr>
							<tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> {{$data->tujuan_surat}} </td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Dalam pemeriksaan kesehatan diperoleh hasil :</td>
                            </tr>
							 <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Tinggi Badan </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->tinggi}} Cm </td>
                             </tr>
							 <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Berat Badan </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->berat}} Kg </td>
                             </tr>
							 <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Tekanan Darah </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->tensi_darah_a}}/{{$data->tensi_darah_b}} mm Hg </td>
                             </tr>
							 <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Suhu Badan </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->suhu}} °C </td>
                             </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;Sehat | tidak sehat</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Dan dinyatakan :</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;Memiliki | Tidak Memiliki</td>
                            </tr>
							<tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Penyakit Buta Warna dengan Kondisi :</td>
                            </tr>
							<tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;Sebagian | Penuh | Tidak Sama Sekali</td>
                            </tr>
                            
                            <tr>
                                <td class="tthlg"></td>
                                <td class="tthlb" style="text-align:center"><br><br><br><br><b>Serang, {{date('d-m-Y',strtotime($data->waktu))}}<br><br><br><br><br><br>(................................)</b></td>
                            </tr>
                            <!-- <tr>
                                <td class="tthlg" width="8%">NOMOR</td>
                                <td class="tthlb"  width="14%">: {{$data->no_transaksi}}</td>
                                <td class="tthlg">KONSUMEN</td>
                                <td class="tthlb">: {{$data->konsumen}}</td>
                                <td class="tthlg">TANGGAL</td>
                                <td class="tthlb"  width="18%">: {{tanggal_eng($data->waktu)}}</td>
                                <td class="tthlg" width="9%" style="text-align:right">BAYAR :</td>
                                <td class="tthlb" style="text-align:right"> {{$data->mstatuskeuangan['status_keuangan']}}</td>
                            </tr> -->
                            
                        </table>
                        
                    </td>
                    @endif
					<td width="56%" style="padding:3%;vertical-align:top;">
						<table class="table table-bordered" style="border: 3px solid black;">
							<tr>
								<td colspan="3" class="text-center">Telaah Resep</td>
							</tr>
							<tr>
								<td class="tthlb">Indikator</td>
								<td class="tthlb" colspan="2" >Ceklist</td>
							</tr>
							<tr>
								<td colspan="3" class="text-center">Persyaratan Administrasi</td>
							</tr>
							<tr>
								<td class="tthlb">Nama Dokter</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">No. SIP</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Paraf Dokter</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Tanggal Resep</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Ruang Asal Resep</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="3" class="text-center">Persyaratan Farmasentik</td>
							</tr>
							<tr>
								<td class="tthlb">Indikator</td>
								<td class="tthlb" colspan="2">Ceklist</td>
							</tr>
							<tr>
								<td class="tthlb">Nama Obat</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Bentuk Sediaan</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Dosis</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Jumlah Obat</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Aturan Pakai</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Tepat Waktu Penggunaan</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Alergi</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Kontraindikasi</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Efek Samping</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="3"  class="text-center">Penyerahan Obat Terhadap Pasien</td>
							</tr>
							<tr>
								<td class="tthlb">Indikator</td>
								<td class="tthlb" colspan="2">Ceklist</td>
							</tr>
							<tr>
								<td class="tthlb">Tepat Pasien</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Tepat Waktu</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Tepat Obat</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Tepat Cara</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Tepat Dosis</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Informasi Obat</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Indikator</td>
								<td class="tthlb" colspan="2">Ceklist</td>
							</tr>
							<tr>
								<td class="tthlb">Cara Pemakaian</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Efek Samping</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">K I E</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Tepat Cara</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">P I D</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="3" class="text-center">Waktu Respon Pelayanan Obat Racikan</td>
							</tr>
							<tr>
								<td class="tthlb">Waktu Terima Resep</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td class="tthlb">Waktu Penyerahan Resep</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="3" class="text-center">Tanda Tangan</td>
							</tr>
							<tr>
								<td class="tthlb" colspan="3">Petugas
								</br></br></br></br>
								</td>
							</tr>
							<tr>
								<td class="tthlb" colspan="2">Pasien
								</br></br></br></br>
								</td>
							</tr>
						</table>
					</td>
					@if($data->surat_id==0)
					<td>
					</td>
					@endif
                    <td width="56%" style="padding:3%;vertical-align:top;">
                        <table width="100%" >
						    <tr rowspan="5">
								
							</tr>
                            <tr>
                                <td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:20px"><b>KLINIK UWEN YUHENI</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:12px"><b>Sertifikat Standar : 82100142116710001</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:12px"><b>Alamat : Jalan KH. Abdul Hadi RT 02 RW 14 Kebon Jahe Serang – Banten 42117</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:12px"><b>Telp. (0254) 7915161, HP/WA. 087809363812, IG: klinikuyuheni</b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:14px"><b><hr style="border:double 2px #000;margin-bottom:0px"></b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:14px"><b><hr style="border:double 1px #000;margin-top:0px"></b></td>
                            </tr>
                            <tr>
                                <td class="tthlg" width="22%">No Register</td>
                                <td class="tthlb">: {{$data->no_register}}</td>
                                <td class="tthlg" width="22%">No Transaksi</td>
                                <td class="tthlb" width="30%">: {{tahun_saja_all($data->waktu)}}-{{$data->no_transaksi}}</td>
                            </tr>
                            <tr>
                                <td class="tthlg">Nama Pasien</td>
                                <td class="tthlb" style="font-size:1.3vh;">: {{$data->nama_pasien}}</td>
                                <td class="tthlg">No Rekamedis</td>
                                <td class="tthlb">: {{$data->no_register}}</td>
                            </tr>
                            <tr>
                                <td class="tthlg">Umur Pasien</td>
                                <td class="tthlb">: {{$data->umur}}</td>
                                <td class="tthlg">Tanggal</td>
                                <td class="tthlb">: {{date('d m Y',strtotime($data->waktu))}}</td>
                            </tr>
                            <tr>
                                <td class="tthlg">Alamat Pasien</td>
                                <td class="tthlb" style="font-size:1.3vh;">: {{$data2->alamat}}</td>
                                <td class="tthlg">POLI</td>
                                <td class="tthlb">: {{$data->kode_poli}} - {{$data->nama_poli}}</td>
								
                            </tr>
							<tr>
								<td class="tthlg">Metode Pembayaran</td>
								@if($data->asuransi_id==1)
                                <td class="tthlb">: Umum</td>
							    @endif
								@if($data->asuransi_id==2)
                                <td class="tthlb">: BPJS</td>
								<td class="tthlg">No BPJS</td>
                                <td class="tthlb">: {{$data2->no_bpjs}}</td>
							    @endif
							</tr>
                            <tr>
                                <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b><hr style="border:dotted 2px #0c0b0b;;margin-top:8px"></b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="text-align:left;font-size:14px">
                                    <br>
                                    <b><u>Keluhan Pasien</u></b><br>
                                        <p style="padding-left:3%; font-size:1.3vh;">{{$data->keluhan}}</p><br>
                                    <b><u>Diagnosa Pasien</u></b>
                                        <p style="padding-left:3%">{{$data->diagnosa_eng}}</p>
                                        <p style="padding-left:3%">{{$data->diagnosa_ind}}</p><br>
									@if(count($get) > 0)
                                    <b><u>Resep Obat</u></b>
                                    @foreach($get as $no=>$o)
                                        <p style="padding-left:3%; font-size:1.3vh;">{{$no+1}}. {{$o->nama_obat}} {{$o->qty}}x {{$o->aturan_pakai}}</p>
                                    @endforeach
									@if($data->asuransi_id==1)
									<b><u>Rincian Biaya Obat</u></b>
                                    @foreach($get as $no=>$o)
                                        <p style="padding-left:3%; font-size:1.3vh;">{{$no+1}}. {{$o->nama_obat}} {{$o->qty}}pcs Rp{{$o->total}}</p>
                                    @endforeach
									<b><u>Total Biaya Obat</u></b>
									<p style="padding-left:3%;display:none">{{$biaya=0}}</p>
									@foreach($get as $no=>$o)
									    <p style="padding-left:3%;display:none">{{$biaya=$o->total+$biaya}}</p>
									@endforeach
									    <p style="padding-left:3%; font-size:1.3vh;">Rp {{$biaya}}</p>
									@endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b><hr style="border:dotted 2px #0c0b0b;;margin-top:8px"></b></td>
                            </tr>
                        </table>
                        <table width="100%" >
							<tr>
                                <td class="tthlb" width="30%"style="text-align:center"><b><br>Dokter / Tenaga Kesehatan<br><br><br><br><br><br>(........................)</b></td>
                                <td class="tthlg"></td>
                                <td class="tthlb" width="40%"style="text-align:center"><b>Serang, {{date('d-m-Y',strtotime($data->waktu))}}<br>Klinik Uwen Yuheni<br><br><br><br><br><br><p style="font-size:1.3vh;">({{$data->nama_pasien}}/Pengantar)</p></b></td>
                            </tr>
                            <!-- <tr>
                                <td class="tthlg" width="8%">NOMOR</td>
                                <td class="tthlb"  width="14%">: {{$data->no_transaksi}}</td>
                                <td class="tthlg">KONSUMEN</td>
                                <td class="tthlb">: {{$data->konsumen}}</td>
                                <td class="tthlg">TANGGAL</td>
                                <td class="tthlb"  width="18%">: {{tanggal_eng($data->waktu)}}</td>
                                <td class="tthlg" width="9%" style="text-align:right">BAYAR :</td>
                                <td class="tthlb" style="text-align:right"> {{$data->mstatuskeuangan['status_keuangan']}}</td>
                            </tr> -->
                            
                        </table>
                    </td>
                </tr>

            </table>
            @if($data->asuransi_id==1)
			<table width="100%">
				<tr>
					<td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:20px;width:50%">
						<img src="{{url_plug()}}/img/kwitansi-1.png" width="100%" style="filter: grayscale(100%);"></img>
					</td>
					<td class="tth" colspan="4" style="padding:0px;text-align:center;font-size:20px;width:100%">
						<img src="{{url_plug()}}/img/kwitansi-2.png" width="100%" style="margin-top: -150px;filter: grayscale(100%);"></img>
						</td>
				</tr>
			</table>
			@endif
        </div><br>
       
    </body>
</html>