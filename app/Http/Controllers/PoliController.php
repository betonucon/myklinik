<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Validator;
use App\Models\Poli;
use App\Models\ViewUser;
class PoliController extends Controller
{
    
    public function index(request $request)
    {
        if(Auth::user()->role_id==1){
            return view('poli.index');
        }else{
            return view('error');
        }
         
       
        
    }
    
    public function view(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        $data=Poli::find($id);
        
        if($id>0){
            $disabled='readonly';
            $kode_poli=$data->kode_poli;
            
        }else{
            $disabled='readonly';
            $kode_poli=penomoran_poli();
        }
        if(Auth::user()->role_id==1){
            return view('poli.view',compact('template','data','disabled','id','kode_poli'));
        }else{
            return view('error');
        }
        
        
        
    }
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $data = Poli::whereIn('active',array(1,0))->orderBy('kode_poli','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn='
                <div class="btn-group btn-group-sm ">
                    <a href="#" data-toggle="dropdown" class="btn btn-success btn-xs dropdown-toggle" title="Pilih proses"><i class="fas fa-cog fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;" class="dropdown-item" onclick="tambah(`'.encoder($row->id).'`)"><i class="fas fa-pencil-alt fa-fw"></i> Ubah</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:;" class="dropdown-item" onclick="delete_data(`'.encoder($row->id).'`)"><i class="fas fa-trash-alt fa-fw"></i> Hapus</a>
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
           
            
            ->rawColumns(['action','act','status'])
            ->make(true);
    }
    
    
    public function delete_data(request $request){
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            $id=decoder($request->id);
            $data = Poli::where('id',$id)->update(['active'=>2]);
        }
        

    }
    public function switch_status(request $request){
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            $data = Poli::where('id',$request->id)->update(['active'=>$request->act]);
        }
        

    }
    
    public function store(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];

        $rules['nama_poli']= 'required';
        $messages['nama_poli.required']= 'Masukan nama obat';
        
        
       
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
            
            if($request->id==0){
                
                    
                    $data=Poli::create([
                        'kode_poli'=>$request->kode_poli,
                        'nama_poli'=>$request->nama_poli,
                        'active'=>1,
                        'created_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                
                    
                
            }else{
               
                    $data=Poli::where('id',$request->id)->update([
                        'nama_poli'=>$request->nama_poli,
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ]);
                    
                    echo'@ok';
                
            }
        }
    }
    
}
