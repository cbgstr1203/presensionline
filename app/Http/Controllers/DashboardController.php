<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    public function index ()
    {
        $hariini = date ("y-m-d");
        $nikk = Auth::guard('karyawan') ->user()->nik;
        $nama = Auth::guard('karyawan') ->user()->nama_lengkap;
        $dept = Auth::guard('karyawan') ->user()->nik; 
        $hitungabsen = DB::table('list_absensi')->where('TANGGAL',$hariini)->where('NIK',$nikk)->get();
        $profil = DB::table('datakaryawan')->where('nik',$nikk)->first();
       // $dept = DB::table('datakaryawan')-> where('nik',$nikk)->nama_dept -> get();
        $historyhariini = DB::table('list_absensi')-> where('NIK', $nikk)-> where ('TANGGAL',$hariini)
                         -> get();
        return view('dashboard.dashboard', compact('historyhariini','hariini','nikk','nama','dept','profil','hitungabsen'));
    }
public function dashboardadmin(Request $request)
{
    $hariini = date ("y-m-d");
    $hitungabsen = DB::table('list_absensi')->where('TANGGAL',$hariini)->get();
    $hitungkaryawan = DB::table('karyawan')->get();
    $hitunglokasi = DB::table('lokasi')->get();
    $hitungdepartemen = DB::table('departemen')->get();
    $dashboardfilter = DB::table('list_absensi')->where('TANGGAL',$hariini);
    $datadept = DB::table('departemen')->get();
    
    if(!empty($request->nama)){
        $dashboardfilter->where('NAMA','like',"%".$request->nama."%");
     }
     if(!empty($request->dept)){
       $dashboardfilter->where('DEPT',$request->dept);
    }

    $dashboard = $dashboardfilter->paginate();
    return view('dashboard.dashboardadmin', compact('dashboard','hitungabsen','hitungkaryawan','hitunglokasi','hitungdepartemen','datadept'));     

}

public function monitoring(Request $request)
{
    return view('dashboard.Monitoring');
}


public function getpresensi (Request $request){
$tanggal = $request->tanggal;

$adminhistory = DB::table('list_absensi')->where('TANGGAL',$tanggal)->get();
return view('dashboard.getpresensi', compact('adminhistory'));     
  
}

}

