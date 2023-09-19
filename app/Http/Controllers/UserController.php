<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Validator;
use App\Models\User;
use App\Models\ViewUser;
class UserController extends Controller
{
    
    public function index(request $request)
    {
       if(Auth::user()->role_id==1){
            return view('user.index');
       }else{
            return view('error');
       }
        
    }
    
    public function view(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        $data=User::find($id);
        
        if($id>0){
            $readonly='disabled';
        }else{
            $readonly='';
        }
        if(Auth::user()->role_id==1){
            return view('user.view',compact('template','data','readonly','id'));
        }else{
            return view('error');
        }
        
    }
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $data = ViewUser::whereIn('active',array(1,0))->orderBy('name','Asc')->get();

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
        if(Auth::user()->role_id==1){
            $id=decoder($request->id);
            $data = User::where('id',$id)->update(['active'=>2]);
        }
        

    }
    public function switch_status(request $request){
        if(Auth::user()->role_id==1){
            $data = User::where('id',$request->id)->update(['active'=>$request->act]);
        }
        

    }
    
    public function store(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $rules['name']= 'required';
        $messages['name.required']= 'Masukan nama penggguna';
        $rules['role_id']= 'required|numeric';
        $messages['role_id.required']= 'Pilih jenis otorisasi';
        if($request->role_id==3){
            $rules['kode_poli']= 'required|string';
            $messages['kode_poli.required']= 'Pilih Poli / Penugasan';
        }
        if($request->id==0){
            $rules['email']= 'required|email|unique:users';
            $messages['email.required']= 'Masukan email penggguna';
            $messages['email.email']= 'Format email tidak sesuai';
            $rules['password']= 'required';
            $messages['password.required']= 'Masukan password penggguna';
            
            if($request->password!=$request->password_confirmation){
                $rules['password_confirmation_confirmed']= 'required';
                $messages['password_confirmation_confirmed.required']= 'Konfirmasi password salah';
            }
        }else{
            if($request->password!=""){
                
                if($request->password!=$request->password_confirmation){
                    $rules['password_confirmation_confirmed']= 'required';
                    $messages['password_confirmation_confirmed.required']= 'Konfirmasi password salah';
                }
            }
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
            
            if($request->id==0){
                
                    $exp=explode('@',$request->email);
                    $data=User::create([
                        'username'=>$exp[0],
                        'role_id'=>$request->role_id,
                        'email'=>$request->email,
                        'name'=>$request->name,
                        'kode_poli'=>$request->kode_poli,
                        'password'=>Hash::make($request->password),
                        'password_token'=>encoder($exp[0]),
                        'active'=>1,
                        'created_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                
                    
                
            }else{
               
                    $data=User::where('id',$request->id)->update([
                        'name'=>$request->name,
                        'role_id'=>$request->role_id,
                        'kode_poli'=>$request->kode_poli,
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ]);
                    if($request->password!=""){
                        $data=User::where('id',$request->id)->update([
                            'password'=>$password,
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]);
                    }
                    echo'@ok';
                
            }
        }
    }
    
}
