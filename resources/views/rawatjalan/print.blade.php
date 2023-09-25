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
                                 <td class="tthlb" colspan="2" style="padding:5px;margin:3%;text-align:center;font-weight:bold"><br><u>SURAT KETERANGAN SAKIT</u></br></br></td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;">Dengan ini saya menyatakan dengan sesungguhnya bahwa :</td>
                            </tr>
                            
                            
                            <tr>
                                <td style="padding-bottom:5px;" width="35%" class="tthlg">Nama </td>
                                <td style="padding-bottom:5px;" class="tthlb">: Tn. {{$data->nama_pasien}}</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Umur </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->umur}} Tahun</td>
                             </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Pekerjaan </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->pekerjaan}} </td>
                             </tr>
                            <tr>
                                <td style="padding-bottom:5px;" class="tthlg">Pada Tanggal </td>
                                <td style="padding-bottom:5px;" class="tthlb">: {{$data->waktu}} </td>
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
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;b. Perlu istirahat karena sakit selama :   {{$data->izin}}  Hari</td>
                            </tr>
                            <tr>
                                <td class="tthlg" colspan="2" style="text-align:justify;padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dari tanggal : {{$data->mulai}}  s/d  {{$data->sampai}}</td>
                            </tr>
                            
                            <tr>
                                <td class="tthlg"></td>
                                <td class="tthlb" style="text-align:center"><br><br><br><br><b>Serang, {{tanggal_indo($data->waktu)}}<br><br><br><br><br><br>(................................)</b></td>
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
                    @else
                    <td ></td>
                    @endif
                    <td width="56%" style="padding:3%;vertical-align:top;">
                        <table width="100%" >
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
                                <td class="tthlb">: Tn. {{$data->nama_pasien}}</td>
                                <td class="tthlg">No Rekamedis</td>
                                <td class="tthlb">: {{$data->no_register}}</td>
                            </tr>
                            <tr>
                                <td class="tthlg">Umur Pasien</td>
                                <td class="tthlb">: {{$data->umur}} Tahun</td>
                                <td class="tthlg">Tanggal</td>
                                <td class="tthlb">: {{$data->waktu}}</td>
                            </tr>
                            <tr>
                                <td class="tthlg">Alamat Pasien</td>
                                <td class="tthlb">: {{$data->alamat}}</td>
                                <td class="tthlg">POLI</td>
                                <td class="tthlb">: {{$data->kode_poli}} - {{$data->nama_poli}}</td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b><hr style="border:dotted 2px #0c0b0b;;margin-top:8px"></b></td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="text-align:left;font-size:14px">
                                    <br>
                                    <b><u>Keluhan Pasien</u></b><br>
                                        <p style="padding-left:3%">{{$data->keluhan}}</p><br>
                                    <b><u>Diagnosa Pasien</u></b>
                                        <p style="padding-left:3%">{{$data->diagnosa_eng}}</p>
                                        <p style="padding-left:3%">{{$data->diagnosa_ind}}</p><br>
                                    <b><u>Resep Obat</u></b>
                                    @foreach($get as $no=>$o)
                                        <p style="padding-left:3%">{{$no+1}}. {{$o->nama_obat}} {{$o->qty}}x {{$o->aturan_pakai}}</p>
                                    @endforeach
                                        
                                </td>
                            </tr>
                            <tr>
                                <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b><hr style="border:dotted 2px #0c0b0b;;margin-top:8px"></b></td>
                            </tr>
                            <tr>
                                <td class="tthlg"></td>
                                <td class="tthlb"></td>
                                <td class="tthlg"></td>
                                <td class="tthlb" style="text-align:center"><b>Serang, {{tanggal_indo($data->waktu)}}<br>Klinik Uwen Yuheni<br><br><br><br><br><br>(................................)</b></td>
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
            
        </div><br>
       
    </body>
</html>