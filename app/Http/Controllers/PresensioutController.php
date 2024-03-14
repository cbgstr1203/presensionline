<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PresensioutController extends Controller
{
    public function createout(Request $request)
    {
   //$hariini = date ("y-m-d");
   $query= \App\Models\Lokasi ::query();
   $query->select('presensi.*','nama_lokasi');
   $query->join('lokasi','presensi.id_lokasi','=','lokasi.lokasi_id');
   $daftarlokasi = DB::table('lokasi')-> get();
       $nik = Auth::guard('karyawan') ->user()->nik;
  //  $cek = DB::table('presensi')-> where('tgl_presensi',$hariini)-> where ('nik',$nik)->count();
       return view('presensi.createout',compact('daftarlokasi'));
    }
 
    public function storee (Request $request){
       $nik = \Illuminate\Support\Facades\Auth::guard('karyawan')->user()->nik;
       $tgl_presensi = date ("y-m-d");
       $jam = date ("H:i:s");
       $time = date ("Hi");
       $keterangan = $request-> keterangan;
       $lokasiout = $request-> lokasiout;
       $picc = $request-> picc;
       $lokasi= $request-> lokasi;
       $image = $request -> image;
       $folderPath ="public/uploads/absensi/";
       $formatName = "Tgl".$tgl_presensi."Pkl".$time;
       $image_parts = explode(";base64",$image);
       $image_base64 = base64_decode ($image_parts[1]);
       $fileName = $formatName . ".png";
       $file = $folderPath . $fileName ;
       $selectvalue = $request-> selectvalue;
       //$lok =$request-> $lok;
      
   
       $dataout = [
          'nik' => $nik,
          'tgl_presensi' => $tgl_presensi,
          'jam_out' => $jam,
          'foto_out' => $fileName,
          'location_out' => $lokasi,
          'pic' => $picc,
          'id_lokasi' => $lokasiout,
          'keterangan' => $keterangan,
          //'id_lokasi' => $lok
       ];
    
       
try
{
   $simpan = db :: table('presensi')-> insert($dataout);
if($simpan){
   echo "success|terimakasih selamat bekerja|in";
   \Illuminate\Support\Facades\Storage::put($file,$image_base64);
} else{
  echo"gagal";
}


}

catch(\Exception $e)
{
   dd($e);
  // return Redirect::back()->with(['warning'=>'data gagal di simpan']);
}

}

public function action(Request $request){
   
   $data = DB::table('lokasi')->where('nama_lokasi', 'LIKE', '%'.request('q').'%')->paginate(10);
   return response()->json($data);
}


}


 