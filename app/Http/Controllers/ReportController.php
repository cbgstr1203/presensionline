<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ReportController extends Controller
{
    public function laporan(Request $request){
    $karyawan = DB::table('karyawan')->orderBy('nama_lengkap')->get();
    $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];


     return view('report.laporan',compact('namabulan','karyawan'));
    }

  
    public function cetaklaporan(Request $request){
    $nik = $request->nik;
    $bulan = $request->bulan;
    $tahun = $request->tahun;
    $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    $karyawann = DB::table('datakaryawan')->where('nik',$nik)->first();

    $presensi = DB::table('list_absensi')
    -> where('nik',$nik)
    -> whereRaw('MONTH(TANGGAL)="'.$bulan.'"')
    -> whereRaw('YEAR(TANGGAL)="'.$tahun.'"')
    ->get();

    if(isset($_POST['exportexcel'])){
      $time = date ("d-m-y H:i:s");
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Report Presensi Karyawan $time.xls");

    }

    

    return view('report.cetaklaporan',compact('namabulan','bulan','tahun','karyawann','presensi'));
}

public function laporandept(Request $request){
  $departemen = DB::table('departemen')->orderBy('dept_kode')->get();
  $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];


   return view('report.laporandept',compact('namabulan','departemen'));
  }


  public function cetaklaporandept(Request $request){
  $dept = $request->dept;
  $bulan = $request->bulan;
  $tahun = $request->tahun;
  $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
  $departemen = DB::table('departemen')->where('dept_kode',$dept)->first();

  $presensi = DB::table('list_absensi')
  -> where('DEPT',$dept)
  -> whereRaw('MONTH(TANGGAL)="'.$bulan.'"')
  -> whereRaw('YEAR(TANGGAL)="'.$tahun.'"')
  ->get();

  if(isset($_POST['exportexcel'])){
    $time = date ("d-m-y H:i:s");
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Report Presensi Karyawan $time.xls");

  }

  return view('report.cetaklaporandept',compact('namabulan','bulan','tahun','departemen','presensi'));
}




}
