<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Validator;
use App\Models\Obat;
use App\Models\Persediaan;
use App\Models\ViewPersediaan;
use App\Models\ViewStok;
use App\Models\ViewStokOrder;
use App\Models\Stok;
class TransaksiobatController extends Controller
{
    
    public function index(request $request)
    {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            return view('transaksiobat.index');
        }else{
            return view('error');
        }
            
       
        
    }
    public function index_persediaan(request $request)
    {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            return view('transaksiobat.index_persediaan');
        }else{
            return view('error');
        }
            
       
        
    }
    
    public function view(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        $data=Obat::find($id);
        
        if($id>0){
            $readonly='disabled';
        }else{
            $readonly='';
        }
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            return view('transaksiobat.view',compact('template','data','readonly','id'));
        }else{
            return view('error');
        }
        
        
    }
    public function view_persediaan(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        $data=ViewPersediaan::find($id);
        
        if($id>0){
            $readonly='disabled';
            $name=$data->name;
        }else{
            $readonly='';
            $name=Auth::user()->name;
        }
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            return view('transaksiobat.view_persediaan',compact('name','template','data','readonly','id'));
        }else{
            return view('error');
        }
        
        
    }
    public function modal_stok(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=$request->id;
        $mst=ViewStok::where('kode_obat',$request->kode_obat)->first();
        $data=ViewStokOrder::find($id);
        $stok=$mst->stok;
        $satuan=$mst->satuan;
        if($id>0){
            
            $nama_obat=$data->nama_obat;
            $kode_obat=$data->kode_obat;
            $harga=$data->harga;
            $qty=$data->qty;
        }else{
            
            $nama_obat=$mst->nama_obat;
            $kode_obat=$mst->kode_obat;
            $harga=$mst->harga;
            $qty=0;
        }
        return view('transaksiobat.modal_stok',compact('harga','satuan','qty','stok','template','data','readonly','id','nama_obat','kode_obat'));
        
        
    }
    public function get_data_persediaan(request $request)
    {
        error_reporting(0);
        $query = ViewPersediaan::query();
        
        
        $data=$query->orderBy('created_at','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if($row->status==1){
                    $btn='
                    <div class="btn-group btn-group-sm ">
                        <a href="#" data-toggle="dropdown" class="btn btn-success btn-xs dropdown-toggle" title="Pilih proses"><i class="fas fa-cog fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:;" class="dropdown-item" onclick="tambah(`'.encoder($row->id).'`)"><i class="fas fa-pencil-alt fa-fw"></i> View</a>
                        </div>
                    </div>
                    ';
                }else{
                $btn='
                    <div class="btn-group btn-group-sm ">
                        <a href="#" data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle" title="Pilih proses"><i class="fas fa-cog fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:;" class="dropdown-item" onclick="tambah(`'.encoder($row->id).'`)"><i class="fas fa-pencil-alt fa-fw"></i> Ubah</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item" onclick="delete_data(`'.encoder($row->id).'`)"><i class="fas fa-trash-alt fa-fw"></i> Hapus</a>
                        </div>
                    </div>
                    ';
                }
                return $btn;
            })
            ->addColumn('act', function ($row) {
                $btn='<input type="checkbox" name="nik[]" value="'.$row->nik.'">';
                
                return $btn;
            })
            ->addColumn('total', function ($row) {
                
                return uang($row->total);
            })
            ->addColumn('statusnya', function ($row) {
                if($row->status==1){
                    $btn='<span class="label label-primary">'.$row->statusnya.'</span>';
                }else{
                    $btn='<span class="label label-warning">'.$row->statusnya.'</span>';
                }
                
                
                
                return $btn;
            })
           
            
            ->rawColumns(['action','act','status','statusnya'])
            ->make(true);
    }
    public function get_data_obat(request $request)
    {
        error_reporting(0);
        $query = ViewStokOrder::query();
        
        
        $data=$query->where('no_transaksi',$request->no_transaksi)->orderBy('nama_obat','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if($row->active==1){
                    $btn='
                   
                        <span class="btn btn-default btn-xs dropdown-toggle" title="Pilih proses"><i class="fas fa-cog fa-fw"></i></span>
                        
                    ';
                }else{
                    $btn='
                    <div class="btn-group btn-group-sm ">
                        <a href="#" data-toggle="dropdown" class="btn btn-success btn-xs dropdown-toggle" title="Pilih proses"><i class="fas fa-cog fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:;" class="dropdown-item" onclick="pilih('.$row->id.',`'.$row->kode_obat.'`,0)"><i class="fas fa-pencil-alt fa-fw"></i> Ubah</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item" onclick="delete_detail('.$row->id.')"><i class="fas fa-trash-alt fa-fw"></i> Hapus</a>
                        </div>
                    </div>
                    ';
                }
                
                return $btn;
            })
            ->addColumn('act', function ($row) {
                $btn='<input type="checkbox" name="nik[]" value="'.$row->nik.'">';
                
                return $btn;
            })
            ->addColumn('harga', function ($row) {
                
                return uang($row->harga);
            })
            ->addColumn('total', function ($row) {
                
                return uang($row->total);
            })
            ->addColumn('status', function ($row) {
                $btn='<span class="label label-'.$row->statusnya.'">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                
                
                return $btn;
            })
           
            
            ->rawColumns(['action','act','status'])
            ->make(true);
    }
    
    public function get_data(request $request)
    {
        error_reporting(0);
        $query = ViewStok::query();
        if($request->statusnya!=""){
            $data=$query->where('statusnya',$request->statusnya);
        }
        
        $data=$query->whereIn('active',array(1,0))->orderBy('nama_obat','Asc')->get();

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
            ->addColumn('pilih', function ($row) {
                $btn='<span class="btn btn-primary btn-xs" onclick="pilih(0,`'.$row->kode_obat.'`,'.$row->stok.')">Pilih</span>';
                
                return $btn;
            })
            ->addColumn('harga', function ($row) {
                
                return uang($row->harga);
            })
            ->addColumn('status', function ($row) {
                $btn='<span class="label label-'.$row->statusnya.'">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                
                
                return $btn;
            })
           
            
            ->rawColumns(['action','act','status','pilih'])
            ->make(true);
    }
    public function get_data_layar(request $request)
    {
        error_reporting(0);
        $query = ViewStok::query();
        if($request->statusnya!=""){
            $data=$query->where('statusnya',$request->statusnya);
        }
        
        $data=$query->whereIn('active',array(1,0))->orderBy('nama_obat','Asc')->get();

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
            ->addColumn('pilih', function ($row) {
                $btn='<span class="btn btn-primary btn-xs" onclick="pilih(0,`'.$row->kode_obat.'`,'.$row->stok.')">Pilih</span>';
                
                return $btn;
            })
            ->addColumn('harga', function ($row) {
                
                return uang($row->harga);
            })
            ->addColumn('status', function ($row) {
                $btn='<span class="label label-'.$row->statusnya.'">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                
                
                return $btn;
            })
           
            
            ->rawColumns(['action','act','status','pilih'])
            ->make(true);
    }
    
    
    public function delete_data(request $request){
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            $id=decoder($request->id);
            $mat = Persediaan::where('id',$id)->first();
            $detail = Stok::where('no_transaksi',$mat->no_persediaan)->delete();
            $data = Persediaan::where('id',$id)->delete();
        }
        

    }
    public function delete_detail(request $request){
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            $id=$request->id;
            $data = Stok::where('id',$id)->delete();
        }
        

    }
    public function switch_status(request $request){
        if(Auth::user()->role_id==1 || Auth::user()->role_id==4){
            $data = Obat::where('id',$request->id)->update(['active'=>$request->act]);
        }
        

    }
    
    public function store(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $rules['supplier']= 'required';
        $messages['supplier.required']= 'Masukan supplier';
        if($request->id==0){
            $rules['tanggal']= 'required|date';
            $messages['tanggal.required']= 'Masukan Tanggal';
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
                
                    $no_persediaan=penomoran_persediaan(tahun_saja($request->tanggal),tahun_saja_all($request->tanggal));
                    $data=Persediaan::create([
                        'no_persediaan'=>$no_persediaan,
                        'supplier'=>$request->supplier,
                        'tanggal'=>$request->tanggal,
                        'users_id'=>Auth::user()->id,
                        'created_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok@'.encoder($data->id);
                
                    
                
            }else{
               
                    $data=Persediaan::where('id',$request->id)->update([
                        'supplier'=>$request->supplier,
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ]);
                    
                    echo'@ok';
                
            }
        }
    }
    public function store_publish(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $mst=ViewPersediaan::find($request->id);
        if($mst->status==1){
            $rules['xxxx']= 'required';
            $messages['xxxx.required']= 'Terjadi kesalahan pemrosesan';
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
            
            
               
                    $save=Persediaan::where('id',$request->id)->update([
                        'status'=>1,
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ]);
                    $stok=Stok::where('no_transaksi',$mst->no_persediaan)->update([
                        'active'=>1,
                    ]);
                    
                    echo'@ok';
                
           
        }
    }
    public function store_obat(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $rules['kode_obat']= 'required';
        $messages['kode_obat.required']= 'Masukan kode obat';
        $rules['harga']= 'required|min:0|not_in:0';
        $messages['harga.required']= 'Lengkapi harga';
        $messages['harga.not_in']= 'Lengkapi harga';
        $rules['qty']= 'required|min:0|not_in:0';
        $messages['qty.required']= 'Lengkapi qty';
        $messages['qty.not_in']= 'Lengkapi qty';
        
        
        
        
       
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
            
            
                    $harga=ubah_uang($request->harga);
                    $qty=ubah_uang($request->qty);
                    $data=Stok::UpdateOrcreate([
                        'no_transaksi'=>$request->no_transaksi,
                        'kode_obat'=>$request->kode_obat,
                    ],[
                        'sts_obat'=>1,
                        'type_stok'=>1,
                        'harga_actual'=>$harga,
                        'harga'=>$harga,
                        'potongan'=>0,
                        'qty'=>$qty,
                        'total'=>($harga*$qty),
                        'waktu'=>date('Y-m-d H:i:s'),
                        'created_at'=>date('Y-m-d H:i:s'),
                    ]);

                    echo'@ok';
                
             
        }
    }
    
}
