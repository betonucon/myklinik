<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Validator;
use App\Models\Diagnosa;
use App\Models\ViewDiagnosa;
class DiagnosaController extends Controller
{
    
    public function index(request $request)
    {
       
            return view('diagnosa.index');
       
        
    }
    
    public function view(request $request)
    {
        error_reporting(0);
        // dd(penomoran_register(3,'23-000020'));
        $template='top';
        $id=decoder($request->id);
        $data=ViewPasien::find($id);
        if($id>0){
            $disabled='readonly';
            
        }else{
            $disabled='readonly';
        }
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            return view('diagnosa.view',compact('template','data','disabled','id'));
        }else{
            return view('error');
        }
        
        
        
    }
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $query = ViewDiagnosa::query();
        if($request->serial!=""){
            $data=$query->where('serial',$request->serial);
        }else{
            $data=$query->where('serial','A');
        }
        
        $data=$query->orderBy('kode_diagnosa','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            
            
            ->addColumn('pilih', function ($row) {
                $btn='<span class="btn btn-primary btn-xs" onclick="pilih_diagnosa(`'.$row->kode_diagnosa.'`,'.$row->id.',`'.tanpa_simbol($row->diagnosa_ecd).'`,`'.tanpa_simbol($row->diagnosa_ind).'`)">Pilih</span>';
                
                return $btn;
            })
            
            ->rawColumns(['pilih'])
            ->make(true);
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
            
                
                    
                    $data=Pasien::UpdateOrcreate([
                        'id'=>$request->id,
                        
                    ],[
                        'jenis_kelamin'=>$request->jenis_kelamin,
                        'no_bpjs'=>$request->no_bpjs,
                        'nama_pasien'=>$request->nama_pasien,
                        'alamat'=>$request->alamat,
                        'tgl_lahir'=>$request->tgl_lahir,
                        'status_keluarga'=>$request->status_keluarga,
                        'active'=>1,
                        'created_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                
                    
                
            
        }
    }
    
}
