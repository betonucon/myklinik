<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Validator;
use App\Models\Pasien;
use App\Models\ViewPasien;
use App\Models\Stok;
use App\Models\Obat;
use App\Models\ViewTransaksi;
class RekamMedisController extends Controller
{
    
    public function index(request $request)
    {
       
            return view('rekammedis.index');
       
        
    }
    
    public function view(request $request)
    {
        //error_reporting(0);
        // dd(penomoran_register(3,'23-000020'));
        $template='top';
        $id=decoder($request->id);
        $data=ViewPasien::find($id);
        if($id>0){
            $disabled='readonly';
            
        }else{
            $disabled='readonly';
        }
		
		if(isset($data->tgl_lahir)){
			$orgDate = $data->tgl_lahir;
			$newDate = date("d-m-Y", strtotime($orgDate));
			unset($data->tgl_lahir);
			$data->tgl_lahir = $newDate;
		}
        
        return view('rekammedis.view',compact('template','data','disabled','id'));
        
        
        
        
    }
	public function get_data_rm(request $request)
    {
        error_reporting(0);
		$id=$request->req;
		$history=$request->data;
		$data = "";
		if($history == ""){
			$data = ViewTransaksi::where('no_register',$id)->orderBy('no_transaksi','Asc')->get();
		} else {
			$data = ViewTransaksi::where('no_register',$id)->where('waktu','<',date('Y-m-d'))->orderBy('no_transaksi','Asc')->get();
		}
		if(count($data)>=1){
			return Datatables::of($data)
				->addIndexColumn()
				->addColumn('skrining_dasar', function($row){
					$skrining = "TD = ".$row->tensi." mmHg</br></br>".
					"TB = ".($row->tinggi != "" ? $row->tinggi . "CM" : "Belum Diukur Tingginya")." </br> </br>".
					"BB = ".$row->berat." Kg</br> </br>".
					"S = ".$row->suhu." °C</br> </br>".
					($row->nm == "A" ? "LILA = " .
					($row->lila != "" ? $row->lila : "Belum Diukur Lilanya") ."</br></br>".
					"Triple Eliminasi = ".($row->eliminasi != 0 ? "Sudah Diperiksa Triple Eliminasi"."</br>" : "Belum Diperiksa Triple Eliminasi") ."</br>": "</br>");
					return $skrining;
				})
				->addColumn('array_obat', function ($row) {
					$obat = "";
					$rsp_obat = get_obat($row->no_transaksi);
					if(count($rsp_obat) == 0){
						$obat.="Tidak diberikan obat dari poli";
					} else {
						$obat .="<ul>";
						foreach($rsp_obat as $val){
							$obat.="<li>".$val->nama_obat." ".$val->qty."pcs ".$val->aturan_pakai." </li>";
						}
						$obat .="</ul>";
					}
					return $obat;
				})
				->rawColumns(['skiring_dasar','array_obat'])
				->make(true);
		} else {
			$success['data']="";
			return response()->json($success, 200);
		}
    }

    
    public function get_data(request $request)
    {
        error_reporting(0);
        $data = ViewPasien::whereIn('active',array(1,0))->orderBy('no_kepala','Asc')->get();
		if(count($data)>=1){
			return Datatables::of($data)
				->addIndexColumn()
				->addColumn('action', function ($row) {
				$btn='
					<div class="btn-group btn-group-sm ">
						<a href="#" data-toggle="dropdown" class="btn btn-success btn-xs dropdown-toggle" title="Pilih proses"><i class="fas fa-cog fa-fw"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="javascript:;" class="dropdown-item" onclick="tambah(`'.encoder($row->id).'`)"><i class="fas fa-pencil-alt fa-fw"></i> Lihat</a>
							<div class="dropdown-divider"></div>
								<a href="javascript:;" class="dropdown-item" onclick="delete_data(`'.encoder($row->id).'`)"><i class="fas fa-trash-alt fa-fw"></i> Hapus</a>
							</div>
						</div>
					</div>
                ';
                return $btn;
				})
				->addColumn('act', function ($row) {
					$btn='<input type="checkbox" name="nik[]" value="'.$row->nik.'">';
                
					return $btn;
				})
				->addColumn('harga', function ($row) {
                
					return uang($row->harga);
				})
				->addColumn('status', function ($row) {
					if($row->active==1){
						$btn='<div class="custom-control custom-switch mb-1">
								<input type="checkbox" class="custom-control-input" onclick="switch_data('.$row->id.',0)" id="customSwitch'.$row->id.'" checked>
								<label class="custom-control-label" for="customSwitch'.$row->id.'"></label>
							</div>';
					}else{
						$btn='<div class="custom-control custom-switch mb-1">
								<input type="checkbox" class="custom-control-input" onclick="switch_data('.$row->id.',1)" id="customSwitch'.$row->id.'" >
								<label class="custom-control-label" for="customSwitch'.$row->id.'"></label>
							</div>';
					}
                
                
                return $btn;
				})
				->addColumn('pilih', function ($row) {
					$btn='<span class="btn btn-primary btn-xs" onclick="pilih_pasien(`'.$row->no_register.'`,`'.$row->nik.'`,`'.$row->nama_pasien.'`,`'.$row->no_bpjs.'`)">Pilih</span>';
                
					return $btn;
				})
            
				->rawColumns(['action','act','status','pilih'])
				->make(true);
		} else{
			$success['data']="";
			return response()->json($success, 200);
		}
    }
    
    
    public function delete_data(request $request){
        if(Auth::user()->role_id==1){
            $id=decoder($request->id);
            $data = Dokter::where('id',$id)->update(['active'=>2]);
        }
        

    }
    public function switch_status(request $request){
        if(Auth::user()->role_id==1){
            $data = Dokter::where('id',$request->id)->update(['active'=>$request->act]);
        }
        

    }
    
    public function store(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $rules['nama_pasien']= 'required|string';
        $messages['nama_pasien.required']= 'Masukan Nama Pasien ';
        $messages['nama_pasien.string']= 'eror inputan Nama Pasien';

        $rules['alamat']= 'required|string';
        $messages['alamat.required']= 'Masukan Alamat Pasien ';
        $messages['alamat.string']= 'eror inputan Alamat Pasien';

        $rules['tgl_lahir']= 'required|date';
        $messages['tgl_lahir.required']= 'Masukan Tanggal Lahir ';
        $messages['tgl_lahir.date']= 'eror inputan  Tanggal Lahir ';

        $rules['jenis_kelamin']= 'required|string';
        $messages['jenis_kelamin.required']= 'Pilih Jenis Kelamin ';
        $messages['jenis_kelamin.string']= 'eror inputan Jenis Kelamin';
        

        $rules['status_keluarga']= 'required|numeric';
        $messages['status_keluarga.required']= 'Pilih Status Keluarga ';
        $messages['status_keluarga.numeric']= 'eror inputan Status Keluarga';
        
        if($request->status_keluarga==3 || $request->status_keluarga==2){
            $rules['nama_kepala']= 'required|string';
            $messages['nama_kepala.required']= 'Pilih Nama Kepala Keluarga ';
            $messages['nama_kepala.string']= 'eror inputan Nama Kepala Keluarga';
        
            $rules['no_kepala']= 'required|string';
            $messages['no_kepala.required']= 'Pilih Nama Kepala Keluarga  ';
            $messages['no_kepala.string']= 'eror inputan Nama Kepala Keluarga ';
        }
        
        
       
        $validator = Validator::make($request->all(), $rules, $messages);
        $val=$validator->Errors();


        if ($validator->fails()) {
            echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">';
                foreach(parsing_validator($val) as $value){
                    
                    foreach($value as $isi){
                        echo'-&nbsp;'.$isi.'<br>';
                    }
                }
            echo'</div></div>';
        }else{
                $mst=Pasien::where('id',$request->id)->first();
                    if($mst->status_keluarga!=$request->status_keluarga){
                        
                         if($mst->status_keluarga==2 || $mst->status_keluarga==3){
                                
                                $penomoran_register=penomoran_register(1,0);
                                $no_kepala=$penomoran_register;

                                $data=Pasien::UpdateOrcreate([
                                    'id'=>$request->id,
                                    
                                ],[
                                    'no_register'=>$penomoran_register,
                                    'no_kepala'=>$no_kepala,
                                ]);
                         }else{

                         
                        
                            
                                
                                $no_kepala=$request->no_kepala;
                                $penomoran_register=penomoran_register($request->status_keluarga,$request->no_kepala);
                                

                                $data=Pasien::UpdateOrcreate([
                                    'id'=>$request->id,
                                    
                                ],[
                                    'no_register'=>$penomoran_register,
                                    'no_kepala'=>$no_kepala,
                                ]);
                                
                            
                        }
                        
                    }else{
                        
                    }
            
                    $orgDate = $request->tgl_lahir;
		     	    $newDate = date("Y-m-d", strtotime($orgDate));
                    
                    $data=Pasien::UpdateOrcreate([
                        'id'=>$request->id,
                        
                    ],[
                        'jenis_kelamin'=>$request->jenis_kelamin,
                        'no_bpjs'=>$request->no_bpjs,
                        'nama_pasien'=>$request->nama_pasien,
                        'alamat'=>$request->alamat,
                        'tgl_lahir'=>$newDate,
                        'status_keluarga'=>$request->status_keluarga,
                        'active'=>1,
                        'created_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                
                    
                
            
        }
    }
    
}
