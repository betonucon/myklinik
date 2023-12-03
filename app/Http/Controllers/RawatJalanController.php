<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Validator;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\ViewDokter;
use App\Models\Transaksi;
use App\Models\ViewKepala;
use App\Models\ViewTransaksi;
use App\Models\ViewPasien;
use App\Models\ViewStokOrder;
use App\Models\Stok;
use App\Models\ViewStok;
use App\Events\KirimCreated;  
class RawatJalanController extends Controller
{
    
    public function index(request $request)
    {
        if($request->waktu!=""){
            $waktu=$request->waktu;
        }else{
            $waktu=date('Y-m-d');
        }
        // $data=KirimCreated::dispatch('@P01');
        // dd($data);
        // dd(penomoran_register(3,0));
        return view('rawatjalan.index',compact('waktu'));
       
        
    }
    public function index_medis(request $request)
    {
        if($request->waktu!=""){
            $waktu=$request->waktu;
        }else{
            $waktu=date('Y-m-d');
        }
        // $data=KirimCreated::dispatch('@P01');
        // dd($data);
        return view('rawatjalan.index_medis',compact('waktu'));
       
        
    }
    public function index_apotik(request $request)
    {
        if($request->waktu!=""){
            $waktu=$request->waktu;
        }else{
            $waktu=date('Y-m-d');
        }
        // $data=KirimCreated::dispatch('@P01');
        // dd($data);
        return view('rawatjalan.index_apotik',compact('waktu'));
       
        
    }
    public function index_pasien(request $request)
    {
        if($request->waktu!=""){
            $waktu=$request->waktu;
        }else{
            $waktu=date('Y-m-d');
        }

        return view('pasien.index',compact('waktu'));
       
        
    }
    public function index_layar(request $request)
    {
        
            $kode_poli=$request->kode_poli;
        
        return view('layar',compact('kode_poli'));
       
        
    }
    
    public function view(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        $data=ViewTransaksi::find($id);
        
        if(Auth::user()->role_id==2){
            if($id>0){
                $disabled='readonly';
                return view('rawatjalan.view_edit',compact('template','data','disabled','id'));
            }else{
                $disabled='readonly';
                return view('rawatjalan.view',compact('template','data','disabled','id'));
            }
            
        }else{
            return view('error');
        }
        
        
        
    }
    public function print_struk(request $request)
    {
        error_reporting(0);
        $template='top';
        $no_transaksi=$request->no_transaksi;
        $data=ViewTransaksi::where('no_transaksi',$no_transaksi)->first();
        $query = ViewStokOrder::query();
		$data2=ViewPasien::where('nik',$data->nik)->first();
        
        
        $get=ViewStokOrder::where('no_transaksi',$request->no_transaksi)->orderBy('nama_obat','Asc')->get();
        return view('rawatjalan.print',compact('template','data','disabled','no_transaksi','get','data2'));
            
        
        
        
    }
    public function view_medis (request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        $data=ViewTransaksi::find($id);
		$data2=ViewPasien::where('nik',$data->nik)->first();
        if(Auth::user()->role_id==3){
			
            return view('rawatjalan.view_medis',compact('template','data','disabled','id','data2'));
            
        }else{
            return view('error');
        }
        
        
    }
    public function view_apotik (request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        $data=ViewTransaksi::find($id);
		$data1=Transaksi::find($id);
		$data2=ViewPasien::where('nik',$data->nik)->first();
		var_dump($data3);
        
        
            return view('rawatjalan.view_apotik',compact('template','data','disabled','id','data2','data1'));
            
        
        
        
        
    }
    public function get_data_obat(request $request)
    {
        error_reporting(0);
        $query = ViewStokOrder::query();
        
        
        $data=$query->where('no_transaksi',$request->no_transaksi)->orderBy('nama_obat','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                    $btn='
                   
                        <span class="btn btn-danger btn-xs dropdown-toggle" onclick="delete_detail('.$row->id.')" title="Pilih proses"><i class="fas fa-trash-alt fa-fw"></i></span>
                        
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
        $query=ViewTransaksi::query();
        if($request->waktu!=""){
            $data = $query->where('waktu',date('Y-m-d',strtotime($request->waktu)));
        }else{
            $data = $query->where('waktu',date('Y-m-d'));
        }
        $data = $query->where('active',1)->orderBy('id','Desc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if($row->status<=1){
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
                }else{
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
                }
                return $btn;
            })
            ->addColumn('act', function ($row) {
                $btn='<a href="javascript:;"  class="btn btn-xs btn-'.$row->color.'" title="Dalam '.$row->nama_status.'">&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                
                return $btn;
            })
            ->addColumn('harga', function ($row) {
                
                return uang($row->harga);
            })
            ->addColumn('suhunya', function ($row) {
                
                return $row->suhunya;
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
           
            
            ->rawColumns(['action','act','status','suhunya'])
            ->make(true);
    }
    public function get_data_medis(request $request)
    {
        error_reporting(0);
        $query=ViewTransaksi::query();
        $kode_poli=Auth::user()->kode_poli;
        if($request->waktu!=""){
            $data = $query->where('waktu',date('Y-m-d',strtotime($request->waktu)));
            
        }else{
            $data = $query->where('waktu',date('Y-m-d'));
        }
        $data = $query->where('kode_poli',$kode_poli)->whereIn('status',array(1,2));
        $data = $query->where('active',1)->orderBy('id','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if($row->status==1){
                    $btn='
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-warning" onclick="proses_antrian('.$row->id.')" href="javascript:;">Proses</a>
                        </div>
                    ';
                }else{
                    $btn='
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-blue" onclick="tambah(`'.encoder($row->id).'`)" href="javascript:;"><i class="fa fa-check-square"></i></a>
                            <a class="btn btn-warning" onclick="proses_antrian('.$row->id.')" href="javascript:;"><i class="fa fa-info"></i></a>
                        </div>
                    ';
                }
                return $btn;
            })
            ->addColumn('act', function ($row) {
                $btn='<a href="javascript:;"  class="btn btn-xs btn-'.$row->color.'" title="Dalam '.$row->nama_status.'">&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                
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
    public function get_data_apotik(request $request)
    {
        error_reporting(0);
        $query=ViewTransaksi::query();
        $kode_poli=Auth::user()->kode_poli;
        if($request->waktu!=""){
            $data = $query->where('waktu',date('Y-m-d',strtotime($request->waktu)));
            
        }else{
            $data = $query->where('waktu',date('Y-m-d'));
        }
        $data = $query->whereIn('status',array(3,4));
        $data = $query->where('active',1)->orderBy('id','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if($row->status==4){
                    $btn='
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-warning" onclick="tambah(`'.encoder($row->id).'`)"  href="javascript:;">View</a>
                        </div>
                    ';
                }else{
                    $btn='
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-blue" onclick="tambah(`'.encoder($row->id).'`)" href="javascript:;"><i class="fa fa-check-square"></i></a>
                            <a class="btn btn-red " href="javascript:;"><i class="fa fa-window-close"></i></a>
                        </div>
                    ';
                }
                return $btn;
            })
            ->addColumn('act', function ($row) {
                $btn='<a href="javascript:;"  class="btn btn-xs btn-'.$row->color.'" title="Dalam '.$row->nama_status.'">&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                
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
    
    public function get_data_kepala(request $request)
    {
        error_reporting(0);
        $query = ViewKepala::query();
        
        
        $data=$query->orderBy('nama_kepala','Asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('pilih', function ($row) {
                $btn='<span class="btn btn-primary btn-xs" onclick="pilih(`'.$row->no_kepala.'`,`'.$row->nama_kepala.'`)">Pilih</span>';
                
                return $btn;
            })
            ->rawColumns(['pilih'])
            ->make(true);
    }
    public function get_data_layar(request $request)
    {
        error_reporting(0);
        $query=ViewTransaksi::query();
        $data = $query->where('kode_poli',$request->kode_poli);
        $data = $query->where('waktu',date('Y-m-d'));
        $data = $query->where('active',1)->where('status',1)->orderBy('nomor','asc')->get();
        $cekaktif = ViewTransaksi::where('kode_poli',$request->kode_poli)->where('waktu',date('Y-m-d'))->where('active',1)->where('status',2)->count();
        if($cekaktif>0){
            $aktif = ViewTransaksi::where('kode_poli',$request->kode_poli)->where('waktu',date('Y-m-d'))->where('active',1)->where('status',2)->orderBy('nomor','desc')->FirstOrfail();
            $noaktif=$aktif->nomor;
            $nama_pasien=$aktif->nama_pasien;
        }else{
            $noaktif='000';
            $nama_pasien='';
        }
        $success=[];
            $sub=[];
            foreach($data as $o){
                $aws=explode(' ',$o->nama_pasien);
                $detail['nomor']=$o->nomor;
                $detail['nama_pasien']=$o->nama_pasien;
                $detail['no_register']=$o->no_register;
                $sub[]=$detail;
            }
        $success['nomor_aktif']=$noaktif;
        $success['nama_pasien']=$nama_pasien;
        $success['item']=$sub;
        return response()->json($success, 200);
    }
    public function get_data_antrian(request $request)
    {
        error_reporting(0);
        $query=ViewTransaksi::query();
        $data = $query->where('waktu',date('Y-m-d'));
        $all = $query->where('active',1)->count();
        $umum = $query->where('kode_poli','P01')->where('active',1)->count();
        $gigi = $query->where('kode_poli','P02')->where('active',1)->count();
        $anak = $query->where('kode_poli','P03')->where('active',1)->count();
        
        
        $success=[];
        $success['all']=$all;
        $success['umum']=$umum;
        $success['gigi']=$gigi;
        $success['anak']=$anak;
        return response()->json($success, 200);
    }
    public function get_data_antrian_medis(request $request)
    {
        error_reporting(0);
        $kode_poli=Auth::user()->kode_poli;
        $query=ViewTransaksi::query();
        $antrian = $query->where('waktu',date('Y-m-d'))->where('kode_poli',$kode_poli)->where('active',1)->whereIn('status',array(1,2))->count();
        $selesai = $query->where('waktu',date('Y-m-d'))->where('kode_poli',$kode_poli)->where('active',1)->where('status','>',2)->count();
        
        
        $success=[];
        $success['antrian']=$antrian;
        $success['selesai']=$selesai;
        return response()->json($success, 200);
    }
    public function modal_stok(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=$request->id;
        $mst=ViewStok::where('kode_obat',$request->kode_obat)->first();
        $data=ViewTransaksi::find($id);
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
        return view('rawatjalan.modal_stok',compact('harga','satuan','qty','stok','template','data','readonly','id','nama_obat','kode_obat'));
        
        
    }
    public function get_data_antrian_apotik(request $request)
    {
        error_reporting(0);
        
        $query=ViewTransaksi::query();
        $antrian = $query->where('waktu',date('Y-m-d'))->where('active',1)->whereIn('status',array(3))->count();
        $selesai = $query->where('waktu',date('Y-m-d'))->where('active',1)->where('status','>',3)->count();
        
        
        $success=[];
        $success['antrian']=$antrian;
        $success['selesai']=$selesai;
        return response()->json($success, 200);
    }
    public function delete_data(request $request){
        if(Auth::user()->role_id==2){
            $id=decoder($request->id);
            $data = Transaksi::where('id',$id)->update(['active'=>2]);
        }
        

    }
    public function delete_detail(request $request){
        
            $id=$request->id;
            $data = Stok::where('id',$id)->delete();
       
        

    }
    public function proses_antrian(request $request){
       
            $mst = Transaksi::where('id',$request->id)->first();
            $data = Transaksi::where('id',$request->id)->update(['status'=>2]);
            $datanot='@P@'.$mst->kode_poli.'@22@';
            KirimCreated::dispatch($datanot);
        

    }
    
    public function store(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $rules['nik']= 'required|numeric';
        $messages['nik.required']= 'Masukan NIK atau Nomor KTP';
        $messages['nik.numeric']= 'NIK atau Nomor KTP hanya menerima angka';

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

        $rules['kode_poli']= 'required|string';
        $messages['kode_poli.required']= 'Pilih Poli Tujuan ';
        $messages['kode_poli.string']= 'eror inputan Poli Tujuan';

        $rules['asuransi_id']= 'required|numeric';
        $messages['asuransi_id.required']= 'Pilih Metode Bayar ';
        $messages['asuransi_id.numeric']= 'eror inputan Metode Bayar';


        if($request->asuransi_id==2){
            $rules['no_bpjs']= 'required|string';
            $messages['no_bpjs.required']= 'Masukan No BPJS ';
            $messages['no_bpjs.string']= 'eror inputan No BPJS ';
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
            
            
                    $cek=Pasien::where('nik',$request->nik)->count();
                    if($cek>0){
                        echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">- NIK Sudah Terdaftar</div></div>';
                    }else{

                        if($request->status_keluarga==3 || $request->status_keluarga==2){
                            $kepala=$request->nama_kepala;
                        }else{
                            $kepala=$request->nama_pasien;
                        }
                        $tgl_register=date('Y-m-d');
                        if($request->status_keluarga==1){
							$orgDate = $request->tgl_lahir;
						    $newDate = date("Y-m-d", strtotime($orgDate));
                            $penomoran_register=penomoran_register(1,0);
                            $data=Pasien::UpdateOrcreate([
                                'nik'=>$request->nik,
                                'no_register'=>$penomoran_register,
                                'no_kepala'=>$penomoran_register,
                            ],[
                                'jenis_kelamin'=>$request->jenis_kelamin,
                                'no_bpjs'=>$request->no_bpjs,
                                'tgl_register'=>$tgl_register,
                                'nama_pasien'=>$request->nama_pasien,
                                'nama_orangtua'=>$kepala,
                                'alamat'=>$request->alamat,
                                'tgl_lahir'=>$newDate,
                                'status_keluarga'=>$request->status_keluarga,
                                'active'=>1,
                                'created_at'=>date('Y-m-d H:i:s'),
                            ]);
                        }else{
							$orgDate = $request->tgl_lahir;
						    $newDate = date("Y-m-d", strtotime($orgDate));
                            // if($request->no_kepala!=""){
                            //     $no_kepala=$request->no_kepala;
                            //     $penomoran_register=penomoran_register($request->status_keluarga,0);
                            // }else{
                               
                                $penomoran_register=penomoran_register($request->status_keluarga,0);
                                $no_kepala=$penomoran_register;
                            // }
                            
                            $data=Pasien::UpdateOrcreate([
                                'nik'=>$request->nik,
                                'no_register'=>$penomoran_register,
                                'no_kepala'=>$no_kepala,
                            ],[
                                'jenis_kelamin'=>$request->jenis_kelamin,
                                'no_bpjs'=>$request->no_bpjs,
                                'tgl_register'=>$tgl_register,
                                'nama_pasien'=>$request->nama_pasien,
                                'nama_orangtua'=>$kepala,
                                'alamat'=>$request->alamat,
                                'tgl_lahir'=>$newDate,
                                'status_keluarga'=>$request->status_keluarga,
                                'active'=>1,
                                'created_at'=>date('Y-m-d H:i:s'),
                            ]);
                        }
                        $no_transaksi=penomoran_transaksi();
                        $nomor=penomoran_urut($request->kode_poli);
                        $waktu=date('Y-m-d');
                        $created_at=date('Y-m-d H:i:s');
                        $trs=Transaksi::UpdateOrcreate([
                            'no_transaksi'=>$no_transaksi,
                            'no_register'=>$penomoran_register,
                            'nik'=>$request->nik,
                            'created_at'=>$created_at,
                        ],[
                            'kode_poli'=>$request->kode_poli,
                            'tujuan_id'=>$request->tujuan_id,
                            'asuransi_id'=>$request->asuransi_id,
                            'tensi_darah_a'=>$request->tensi_darah_a,
                            'tensi_darah_b'=>$request->tensi_darah_b,
                            'berat'=>$request->berat,
                            'suhu'=>$request->suhu,
                            'keluhan'=>$request->keluhan,
                            'tinggi'=>$request->tinggi,
                            'nomor'=>$nomor,
                            'waktu'=>$waktu,
                            'status'=>1,
                            'active'=>1,
                        ]);
                        $datanot='@P@'.$request->kode_poli.'@';
                        KirimCreated::dispatch($datanot);
                        echo'@ok';
                    }
                    
                
            
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
            
            $mst=ViewStok::where('kode_obat',$request->kode_obat)->first();
            $fistr = Transaksi::where('no_transaksi',$request->no_transaksi)->first();
            if($fistr->status==2 || $fistr->status==3){
                if($mst->stok>=ubah_uang($request->qty)){
                        $harga=ubah_uang($request->harga);
                        $qty=ubah_uang($request->qty);
                        $data=Stok::UpdateOrcreate([
                            'no_transaksi'=>$request->no_transaksi,
                            'kode_obat'=>$request->kode_obat,
                        ],[
                            'sts_obat'=>2,
                            'type_stok'=>2,
                            'harga_actual'=>$harga,
                            'aturan_id'=>$request->aturan_id,
                            'harga'=>$harga,
                            'potongan'=>0,
                            'qty'=>$qty,
                            'active'=>1,
                            'total'=>($harga*$qty),
                            'waktu'=>date('Y-m-d H:i:s'),
                            'created_at'=>date('Y-m-d H:i:s'),
                        ]);

                        echo'@ok';
                    }else{
                        echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">Stok tidak mencukupi</div></div>';
                    }
                    
                
                }else{
                    echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">Tidak dapat menambah obat</div></div>';
                } 
            } 
    }
    public function store_lama(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $rules['no_register']= 'required|string';
        $messages['no_register.required']= 'Masukan No register';
        $messages['no_register.string']= 'Nomor register error';

        
        $rules['kode_poli']= 'required|string';
        $messages['kode_poli.required']= 'Pilih Poli Tujuan ';
        $messages['kode_poli.string']= 'eror inputan Poli Tujuan';

        $rules['asuransi_id']= 'required|numeric';
        $messages['asuransi_id.required']= 'Pilih Metode Bayar ';
        $messages['asuransi_id.numeric']= 'eror inputan Metode Bayar';

        $rules['tensi_darah_a']= 'required|string';
        $messages['tensi_darah_a.required']= 'Masukan Tensi Darah ';
        $messages['tensi_darah_a.string']= 'eror inputan Tensi Darah';

        $rules['tensi_darah_b']= 'required|string';
        $messages['tensi_darah_b.required']= 'Masukan Tensi Darah ';
        $messages['tensi_darah_b.string']= 'eror inputan Tensi Darah';

        $rules['suhu']= 'required|string';
        $messages['suhu.required']= 'Masukan suhu Badan ';
        $messages['suhu.string']= 'eror inputan suhu Badan';

        $rules['berat']= 'required|string';
        $messages['berat.required']= 'Masukan Berat Badan ';
        $messages['berat.string']= 'eror inputan Berat Badan';

        if($request->asuransi_id==2){
            $rules['no_bpjs']= 'required|string';
            $messages['no_bpjs.required']= 'Masukan No BPJS ';
            $messages['no_bpjs.string']= 'eror inputan No BPJS ';
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
            
            
                    $mst=Pasien::where('no_register',$request->no_register)->first();
                    
                    $no_transaksi=penomoran_transaksi();
                    $nomor=penomoran_urut($request->kode_poli);
                    $waktu=date('Y-m-d');
                    $created_at=date('Y-m-d H:i:s');
                    $trs=Transaksi::UpdateOrcreate([
                        'no_transaksi'=>$no_transaksi,
                        'no_register'=>$request->no_register,
                        'nik'=>$mst->nik,
                        'created_at'=>$created_at,
                    ],[
                        'kode_poli'=>$request->kode_poli,
                        'tujuan_id'=>$request->tujuan_id,
                        'tensi_darah_a'=>$request->tensi_darah_a,
                        'tensi_darah_b'=>$request->tensi_darah_b,
                        'berat'=>$request->berat,
                        'asuransi_id'=>$request->asuransi_id,
                        'suhu'=>$request->suhu,
                        'tinggi'=>$request->tinggi,
                        'keluhan'=>$request->keluhan,
                        'nomor'=>$nomor,
                        'waktu'=>$waktu,
                        'status'=>1,
                        'active'=>1,
                    ]);
                    $datanot='@P@'.$request->kode_poli.'@';
                    KirimCreated::dispatch($datanot);
                    echo'@ok';
                    
                
            
        }
    }
    public function store_edit(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        

        $rules['asuransi_id']= 'required|numeric';
        $messages['asuransi_id.required']= 'Pilih Metode Bayar ';
        $messages['asuransi_id.numeric']= 'eror inputan Metode Bayar';

        $rules['tensi_darah_a']= 'required|string';
        $messages['tensi_darah_a.required']= 'Masukan Tensi Darah ';
        $messages['tensi_darah_a.string']= 'eror inputan Tensi Darah';

        $rules['tensi_darah_b']= 'required|string';
        $messages['tensi_darah_b.required']= 'Masukan Tensi Darah ';
        $messages['tensi_darah_b.string']= 'eror inputan Tensi Darah';

        $rules['suhu']= 'required|string';
        $messages['suhu.required']= 'Masukan suhu Badan ';
        $messages['suhu.string']= 'eror inputan suhu Badan';
        $rules['berat']= 'required|string';
        $messages['berat.required']= 'Masukan Berat Badan ';
        $messages['berat.string']= 'eror inputan Berat Badan';

        if($request->asuransi_id==2){
            $rules['no_bpjs']= 'required|string';
            $messages['no_bpjs.required']= 'Masukan No BPJS ';
            $messages['no_bpjs.string']= 'eror inputan No BPJS ';
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
            
            
                    $mst=Transaksi::where('id',$request->id)->first();
                    if($request->asuransi_id==2){
                        $pasien=Pasien::where('no_register',$mst->no_register)->update(['no_bpjs'=>$request->no_bpjs]);
                    }
                    $trs=Transaksi::UpdateOrcreate([
                        'id'=>$request->id,
                    ],[
                        'tensi_darah_a'=>$request->tensi_darah_a,
                        'tujuan_id'=>$request->tujuan_id,
                        'tensi_darah_b'=>$request->tensi_darah_b,
                        'asuransi_id'=>$request->asuransi_id,
                        'berat'=>$request->berat,
                        'suhu'=>$request->suhu,
                        'tinggi'=>$request->tinggi,
                        'keluhan'=>$request->keluhan,
                        'active'=>1,
                    ]);

                    echo'@ok';
                    
                
            
        }
    }
    public function store_medis(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        $mst=Transaksi::where('id',$request->id)->first();
        if($mst->tujuan_id==1){
            $rules['diagnosa_id']= 'required|numeric';
            $messages['diagnosa_id.required']= 'Pilih Diagnosa ';
            $messages['diagnosa_id.numeric']= 'eror inputan Diagnosa';

            if($request->surat_id==1){
                $rules['mulai']= 'required|string';
                $messages['mulai.required']= 'Masukan Tanggal mulai ';
                $messages['mulai.string']= 'eror inputan Tanggal mulai';
                $rules['sampai']= 'required|string';
                $messages['sampai.required']= 'Masukan Tanggal sampai ';
                $messages['sampai.string']= 'eror inputan Tanggal sampai';
                $rules['pekerjaan']= 'required|string';
                $messages['pekerjaan.required']= 'Masukan Pekerjaan ';
            }
            if($request->surat_id==2){
                $rules['berat']= 'required|string';
                $messages['berat.required']= 'Masukan Berat Badan ';
                $messages['berat.string']= 'eror inputan Berat Badan';
                $rules['tinggi']= 'required|string';
                $messages['tinggi.required']= 'Masukan tinggi Badan ';
                $messages['tinggi.string']= 'eror inputan tinggi Badan';
                $rules['tujuan_surat']= 'required|string';
                $messages['tujuan_surat.required']= 'Masukan tujuan surat ';
            }
        }else{
            $rules['berat']= 'required|string';
            $messages['berat.required']= 'Masukan Berat Badan ';
            $messages['berat.string']= 'eror inputan Berat Badan';
            $rules['tinggi']= 'required|string';
            $messages['tinggi.required']= 'Masukan tinggi Badan ';
            $messages['tinggi.string']= 'eror inputan tinggi Badan';
            $rules['tujuan_surat']= 'required|string';
            $messages['tujuan_surat.required']= 'Masukan tujuan surat ';
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
            
            
                if($mst->tujuan_id==1){   
//                    $cek = ViewStokOrder::where('no_transaksi',$mst->no_transaksi)->count();
//                    if($cek>0){

                    
                        $trs=Transaksi::UpdateOrcreate([
                            'id'=>$request->id,
                        ],[
                            'diagnosa_id'=>$request->diagnosa_id,
                            'diagnosa_eng'=>$request->diagnosa_eng,
                            'diagnosa_ind'=>$request->diagnosa_ind,
                            'tensi_darah_a'=>$request->tensi_darah_a,
                            'tensi_darah_b'=>$request->tensi_darah_b,
                            'suhu'=>$request->suhu,
                            'berat'=>$request->berat,
                            'tinggi'=>$request->tinggi,
                            'surat_id'=>$request->surat_id,
                            'pekerjaan'=>$request->pekerjaan,
							'tindak_lanjut'=>$request->tindak_lanjut,
                            'status'=>3,
                            'mulai'=>$request->mulai,
                            'sampai'=>$request->sampai,
                        ]);
                        $stok=Stok::where('no_transaksi',$mst->no_transaksi)->update([
                            'active'=>1,
                        ]);
                        echo'@ok';
//                    }else{
//                        echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">Masukan Resep Obat</div></div>';
//                    } 
                }else{
                    $trs=Transaksi::UpdateOrcreate([
                        'id'=>$request->id,
                    ],[
                        'diagnosa_id'=>0,
                        'diagnosa_eng'=>'Surat Kesehatan',
                        'diagnosa_ind'=>'Surat Kesehatan',
                        'berat'=>$request->berat,
                        'tinggi'=>$request->tinggi,
                        'status'=>3,
                        'surat_id'=>$request->surat_id,
                        'tujuan_surat'=>$request->tujuan_surat,
                        'mulai'=>$request->mulai,
                        'sampai'=>$request->sampai,
                    ]);
                    echo'@ok';
                }   
                
            
        }
    }
    public function store_apotik(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        

        
        
       
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
            
            
                    $mst=Transaksi::where('id',$request->id)->first();
                    $cek = ViewStokOrder::where('no_transaksi',$mst->no_transaksi)->count();
                    if($mst->status==3){

                    
                        $trs=Transaksi::UpdateOrcreate([
                            'id'=>$request->id,
                        ],[
                            'status'=>4,
                        ]);

                        echo'@ok';
                    }else{
                        echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">Error pemrosesan</div></div>';
                    } 
                    
                
            
        }
    }
    
}
