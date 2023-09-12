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
    function get_satuan(){
        $data=App\Models\Satuan::orderBy('id','Asc')->get();
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

?>