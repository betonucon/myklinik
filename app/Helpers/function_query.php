<?php
    
    function create_dbtabel($name){
        $sql = "CREATE TABLE $name  (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `receive_at` datetime NULL DEFAULT NULL,
            `processed_at` datetime NULL DEFAULT NULL,
            `status` enum('1','2','3') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
            `error_message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
            `response_message` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
            `payload` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
            PRIMARY KEY (`id`) USING BTREE
          ) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;";
        
        DB::statement($sql);
    }
   
    function get_role(){
        $data=App\Models\Role::orderBy('id','Asc')->get();
        return $data;
    }
    function get_serial(){
        $data=App\Models\ViewSerialDiagnosa::orderBy('srl','Asc')->get();
        return $data;
    }
    function get_satuan(){
        $data=App\Models\Satuan::orderBy('id','Asc')->get();
        return $data;
    }
    function get_asuransi(){
        $data=App\Models\Asuransi::orderBy('id','Asc')->get();
        return $data;
    }
    function get_poli(){
        $data=App\Models\Poli::orderBy('kode_poli','Asc')->get();
        return $data;
    }
    function penomoran_obat(){
    
   
        $cek=App\Models\Obat::count();
        if($cek>0){
            $mst=App\Models\Obat::orderBy('kode_obat','Desc')->firstOrfail();
            $urutan = (int) substr($mst['kode_obat'], 3, 6);
            $urutan++;
            $nomor='UW-'.sprintf("%06s",  $urutan);
        }else{
            $nomor='UW-'.sprintf("%06s",  1);
        }
        return $nomor;
     }
    function penomoran_poli(){
    
   
        $cek=App\Models\Poli::count();
        if($cek>0){
            $mst=App\Models\Poli::orderBy('kode_poli','Desc')->firstOrfail();
            $urutan = (int) substr($mst['kode_poli'], 1, 2);
            $urutan++;
            $nomor='P'.sprintf("%02s",  $urutan);
        }else{
            $nomor='P'.sprintf("%02s",  1);
        }
        return $nomor;
     }
    function penomoran_persediaan($tahun,$th){
    
   
        $cek=App\Models\Persediaan::whereYear('tanggal',$th)->count();
        if($cek>0){
            $mst=App\Models\Persediaan::whereYear('tanggal',$th)->orderBy('no_persediaan','Desc')->firstOrfail();
            $urutan = (int) substr($mst['no_persediaan'], 4, 5);
            $urutan++;
            $nomor='OD'.$tahun.sprintf("%05s",  $urutan);
        }else{
            $nomor='OD'.$tahun.sprintf("%05s",  1);
        }
        return $nomor;
     }
    function penomoran_register($id,$no_kepala){
        if($id==1){
            $th=date('y');
    
            $cek=App\Models\Pasien::whereYear('tgl_register',date('Y'))->where('status_keluarga',1)->count();
            if($cek>0){
                $mst=App\Models\Pasien::whereYear('tgl_register',date('Y'))->where('status_keluarga',1)->orderBy('no_register','Desc')->firstOrfail();
                $urutan = (int) substr($mst['no_register'], 3, 5);
                $urutan++;
                $nomor=$th.'-'.sprintf("%05s",  $urutan).'0';
            }else{
                $nomor=$th.'-'.sprintf("%05s",  1).'0';
            }
        }else{
            if($no_kepala==0){
                $th=date('y');
                if($id==2){
                    $no=1;
                }else{
                    $no=2;
                }
                $cek=App\Models\Pasien::whereYear('tgl_register',date('Y'))->count();
                if($cek>0){
                    $mst=App\Models\Pasien::whereYear('tgl_register',date('Y'))->orderBy('no_register','Desc')->firstOrfail();
                    $urutan = (int) substr($mst['no_register'], 3, 5);
                    $urutan++;
                    $nomor=$th.'-'.sprintf("%05s",  $urutan).$no;
                }else{
                    $nomor=$th.'-'.sprintf("%05s",  1).$no;
                }
            }else{
                if($id==2){
                    $no=1;
                }else{
                    $no=2;
                }
                $nomr=substr($no_kepala, 0, 8);
                $cek=App\Models\Pasien::where('no_kepala',$no_kepala)->whereIn('status_keluarga',array(3,2))->count();
                if($cek>0){
                    $mst=App\Models\Pasien::where('no_kepala',$no_kepala)->whereIn('status_keluarga',array(3,2))->orderBy('no_register','Desc')->firstOrfail();
                    $urutan = (int) substr($mst['no_register'], 8, 1);
                    $urutan++;
                    $nomor=$nomr.sprintf("%01s",  $urutan);
                }else{
                    $nomor=$nomr.sprintf("%01s",  $no);
                }
            }
                
        }
        return $nomor;
     }
    function penomoran_dokter(){
    
   
        $cek=App\Models\Dokter::count();
        if($cek>0){
            $mst=App\Models\Dokter::orderBy('kode_dokter','Desc')->firstOrfail();
            $urutan = (int) substr($mst['kode_dokter'], 2, 2);
            $urutan++;
            $nomor='DR'.sprintf("%02s",  $urutan);
        }else{
            $nomor='DR'.sprintf("%02s",  1);
        }
        return $nomor;
     }
    function penomoran_transaksi(){
        $th=date('y');
        $tahun=date('Y');
   
        $cek=App\Models\Transaksi::whereYear('waktu',$tahun)->count();
        if($cek>0){
            $mst=App\Models\Transaksi::whereYear('waktu',$tahun)->orderBy('no_transaksi','Desc')->firstOrfail();
            $urutan = (int) substr($mst['no_transaksi'], 2, 5);
            $urutan++;
            $nomor=$th.sprintf("%05s",  $urutan);
        }else{
            $nomor=$th.sprintf("%05s",  1);
        }
        return $nomor;
     }
    function penomoran_urut($kode_poli){
        $waktu=date('Y-m-d');
   
        $kode=App\Models\Poli::where('kode_poli',$kode_poli)->first();
        $cek=App\Models\Transaksi::where('waktu',$waktu)->where('kode_poli',$kode_poli)->count();
        if($cek>0){
            $mst=App\Models\Transaksi::where('waktu',$waktu)->where('kode_poli',$kode_poli)->orderBy('nomor','Desc')->firstOrfail();
            $urutan = (int) substr($mst['nomor'], 1, 3);
            $urutan++;
            $nomor=$kode->nm.sprintf("%03s",  $urutan);
        }else{
            $nomor=$kode->nm.sprintf("%03s",  1);
        }
        return $nomor;
     }

?>