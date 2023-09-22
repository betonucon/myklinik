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
            <table width="97%" style="margin-left:3%">
                <tr>
                    <td class="tth" colspan="4" style="text-align:center;font-size:19px"><b>KLINIK UWEN SERANG</b></td>
                </tr>
                <tr>
                    <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b>Jl. K.H. Abdul Hadi No.06, Kebon Jahe, Kec. Serang, Kota Serang, Banten 42117</b></td>
                </tr>
                <tr>
                    <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b>Tlp. 0878-0936-3812 Kode POS.42117</b></td>
                </tr>
                <tr>
                    <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b><hr style="border:double 2px #000;margin-bottom:0px"></b></td>
                </tr>
                <tr>
                    <td class="tth" colspan="4" style="text-align:center;font-size:14px"><b><hr style="border:double 1px #000;margin-top:0px"></b></td>
                </tr>
                <tr>
                    <td class="tthlg" width="15%">No Register</td>
                    <td class="tthlb">: {{$data->no_register}}</td>
                    <td class="tthlg" width="15%">No Transaksi</td>
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
                    <td class="tthlb" style="text-align:center"><b>Serang, {{tanggal_indo($data->waktu)}}<br>Klinik Uwen Serang<br><br><br><br><br><br>(................................)</b></td>
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
            
        </div><br>
       
    </body>
</html>