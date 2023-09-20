<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewTransaksi;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(request $request)
    {
        return view('home');
    }

    public function get_data_dashboard(request $request)
    {
        error_reporting(0);
        
        $query=ViewTransaksi::query();
        $antrian = ViewTransaksi::where('waktu',date('Y-m-d'))->count();
        $umum = ViewTransaksi::where('kode_poli','P01')->where('waktu',date('Y-m-d'))->count();
        $gigi = ViewTransaksi::where('kode_poli','P02')->where('waktu',date('Y-m-d'))->count();
        $aki = ViewTransaksi::where('kode_poli','P03')->where('waktu',date('Y-m-d'))->count();
        $bayi = ViewTransaksi::where('waktu',date('Y-m-d'))->where('umur','<',5)->count();
        $anak = ViewTransaksi::where('waktu',date('Y-m-d'))->whereBetween('umur',[5,12])->count();
        $dewasa = ViewTransaksi::where('waktu',date('Y-m-d'))->whereBetween('umur',[13,59])->count();
        $lansia = ViewTransaksi::where('waktu',date('Y-m-d'))->where('umur','>',59)->count();
        $selesai = ViewTransaksi::where('waktu',date('Y-m-d'))->where('active',1)->where('status','>',3)->count();
        $proses = ViewTransaksi::where('waktu',date('Y-m-d'))->where('active',1)->where('status','<',4)->count();
        
        
        $success=[];
        $success['antrian']=$antrian;
        $success['selesai']=$selesai;
        $success['proses']=$proses;
        $success['bayi']=$bayi;
        $success['anak']=$anak;
        $success['dewasa']=$dewasa;
        $success['lansia']=$lansia;
        $success['umum']=$umum;
        $success['gigi']=$gigi;
        $success['aki']=$aki;
        return response()->json($success, 200);
    }
}
