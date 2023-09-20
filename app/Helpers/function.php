<?php

function name(){
   return "PT.UCON BETON";
}
function alamat(){
   return "Link Jombang Kali, Kel Masigit Kec Jombang";
}
function email(){
   return "uconbeton@gmail.com";
}

function phone(){
   return "082312053337";
}

function facebook_time_ago($timestamp){  
   $time_ago = strtotime($timestamp);  
   $current_time = time();  
   $time_difference = $current_time - $time_ago;  
   $seconds = $time_difference;  
   $minutes      = round($seconds / 60 );        // value 60 is seconds  
   $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
   $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
   $weeks        = round($seconds / 604800);     // 7*24*60*60;  
   $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
   $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
   if($seconds <= 60) {  
    return "Just Now";  
   } else if($minutes <=60) {  
    if($minutes==1){  
      return "one minute ago";  
    }else {  
      return "$minutes minutes ago";  
    }  
   } else if($hours <=24) {  
    if($hours==1) {  
      return "an hour ago";  
    } else {  
      return "$hours hour ago";  
    }  
   }else if($days <= 7) {  
    if($days==1) {  
      return "yesterday";  
    }else {  
      return "$days days ago";  
    }  
   }else if($weeks <= 4.3) {  //4.3 == 52/12
    if($weeks==1){  
      return "a week ago";  
    }else {  
      return "$weeks weeks ago";  
    }  
   } else if($months <=12){  
    if($months==1){  
      return "a month ago";  
    }else{  
      return "$months months ago";  
    }  
   }else {  
    if($years==1){  
      return "one year ago";  
    }else {  
      return "$years years ago";  
    }  
   }  
}
function pimpinan(){
   return "SOLAWAT S.E";
}
function repleace_job($job){
   $data=explode('_',$job);
   $tampil=str_replace($data[0].'_',"",$job);
   $expl=explode("_",$tampil);
   return $expl[0];
}
function repleace_name($job){
   $data=explode('_',$job);
   return $data[0];
}
function tanggal_indo_lengkap($date){
   return date('d-m-Y H:i:s',strtotime($date));
}

function tahun_saja($date){
   return date('y',strtotime($date));
}
function tanpa_simbol($string){
   return preg_replace("/[^a-zA-Z ^0-9.]/", " ", $string);
}
function tahun_saja_all($date){
   return date('Y',strtotime($date));
}
function tanggal_indo($date=null){
   if($date==null){
      return "";
   }else{
      return date('d M,y',strtotime($date));
   }
   
}
function jam($date=null){
   if($date==""){
      return null;
   }else{
      return date('H:i:s',strtotime($date));
   }
   
}
function sekarang(){
   return date('Y-m-d H:i:s');
}
function selisih_waktu($waktu1,$waktu2){
   $waktu_awal        =strtotime($waktu1);
   $waktu_akhir    =strtotime($waktu2); // bisa juga waktu sekarang now()
   $diff    =$waktu_akhir - $waktu_awal;
   $jam    =floor($diff / (60 * 60));
   $menit    =$diff - $jam * (60 * 60);
   $data= $jam.'.'. floor( $menit / 60 );
   return $data;
}
function bulan_int($bulan)
{
   Switch ($bulan){
      case 1 : $bulan="Januari";
         Break;
      case 2 : $bulan="Februari";
         Break;
      case 3 : $bulan="Maret";
         Break;
      case 4 : $bulan="April";
         Break;
      case 5 : $bulan="Mei";
         Break;
      case 6 : $bulan="Juni";
         Break;
      case 7 : $bulan="Juli";
         Break;
      case 8 : $bulan="Agustus";
         Break;
      case 9 : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}

function ubah_uang($uang){
   $patr='/([^0-9\.]+)/';
   $ug=explode('.',$uang);
   $data=preg_replace($patr,'',$uang);
   
   return $data;
}
function uang_decimal($nil){
   return number_format($nil,2);
}
function ubah_bulan($bulan){
   if($bulan<10){
      return '0'.$bulan;
   }else{
      return $bulan;
   }
   
}
function bulan($bulan)
{
   Switch ($bulan){
      case '01' : $bulan="Januari";
         Break;
      case '02' : $bulan="Februari";
         Break;
      case '03' : $bulan="Maret";
         Break;
      case '04' : $bulan="April";
         Break;
      case '05' : $bulan="Mei";
         Break;
      case '06' : $bulan="Juni";
         Break;
      case '07' : $bulan="Juli";
         Break;
      case '08' : $bulan="Agustus";
         Break;
      case '09' : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}
function uang($nil){
   return number_format($nil,0);
}
function no_sepasi($text){
   return str_replace(' ', '_', $text);
}
function link_dokumen($file){
   $curl = curl_init();
     curl_setopt ($curl, CURLOPT_URL, "".url_plug()."/".$file);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

     $result = curl_exec ($curl);
     curl_close ($curl);
   print $result;
}
function url_plug(){
    $data=url('/');
    return $data;
}
function barcoderider($id,$w,$h){
    $d = new Milon\Barcode\DNS2D();
    $d->setStorPath(__DIR__.'/cache/');
    return $d->getBarcodeHTML($id, 'QRCODE',$w,$h);
}
function barcoderr($id){
    $d = new Milon\Barcode\DNS2D();
    $d->setStorPath(__DIR__.'/cache/');
    return $d->getBarcodePNGPath($id, 'PDF417');
}
function parsing_validator($url){
    $content=utf8_encode($url);
    $data = json_decode($content,true);
 
    return $data;
}
function encoder($b) {
   $data=base64_encode(base64_encode($b));
   return $data;
}
function decoder($b) {
   $data=base64_decode(base64_decode($b));
   return $data;
}
function tanggal_indo_full($tgl){
    $data=date('d M,Y H:i:s',strtotime($tgl));
    return $data;
}
function tanggal_eng($tgl){
    $data=date('d M,Y',strtotime($tgl));
    return $data;
}



?>