<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PresensiController extends Controller
{
   public function create (Request $request)
   {
  //  $hariini = date ("y-m-d");
  $query= \App\Models\Lokasi ::query();
  $query->select('presensi.*','nama_lokasi');
  $query->join('lokasi','presensi.id_lokasi','=','lokasi.lokasi_id');
     
     $daftarlokasi = DB::table('lokasi')-> get();
      $nik = Auth::guard('karyawan') ->user()->nik;
      //$list_lokasi = DB::table('Lokasi')-> where('id_lokasi')->where('nama_lokasi')->get();
 //  $cek = DB::table('presensi')-> where('tgl_presensi',$hariini)-> where ('nik',$nik)->count();
      return view('presensi.create',compact('daftarlokasi'));
   }

   public function store (Request $request){
      $nik = \Illuminate\Support\Facades\Auth::guard('karyawan')->user()->nik;
      $tgl_presensi = date ("y-m-d");
      $jam = date ("H:i:s");
      $time = date ("Hi");
      $keterangan = $request-> keterangan;
      $pic = $request-> pic;
      $lokasi= $request-> lokasi;
      $image = $request -> image;
      $folderPath ="public/uploads/absensi/";
      $formatName = "Tgl".$tgl_presensi."Pkl".$time;
      $image_parts = explode(";base64",$image);
      $image_base64 = base64_decode ($image_parts[1]);
      $fileName = $formatName . ".png";
      $file = $folderPath . $fileName ;
     // $pilihlokasi = $request -> $pilihlokasi;
     
     
  
      $data = [
         'nik' => $nik,
         'tgl_presensi' => $tgl_presensi,
         'jam_in' => $jam,
         'foto_in' => $fileName,
         'location_in' => $lokasi,
         'id_lokasi' => $pic,

      ];
  
      $simpan = db :: table('presensi')-> insert($data);
      if($simpan){
         echo "success|terimakasih selamat bekerja|in";
         \Illuminate\Support\Facades\Storage::put($file,$image_base64);
      } else{
         echo "gagal";
      }
}

public function action(Request $request){
   
   $data = DB::table('lokasi')->where('nama_lokasi', 'LIKE', '%'.request('q').'%')->paginate(10);
   return response()->json($data);
}

}

