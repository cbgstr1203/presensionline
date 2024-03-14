<?php

namespace App\Http\Controllers;


use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class KaryawanController extends Controller
{
   public function index (Request $request){
    $query= \App\Models\Karyawan ::query();
    $query->select('karyawan.*','nama_dept');
    $query->join('departemen','karyawan.kode_dept','=','departemen.dept_kode');
   // $datakaryawan = DB::table('datakaryawan')-> paginate(10);
    $datadept = DB::table('departemen')->get();

    if(!empty($request->nama)){
       $query->where('nama_lengkap','like',"%".$request->nama."%");
    }
    if(!empty($request->dept)){
      $query->where('kode_dept',$request->dept);
   }
    $datakaryawan = $query->paginate();
    return view('karyawan.index',compact('datakaryawan','datadept'));
  
}
   
  public function store(Request $request){
  $nik = $request->nik;
  $nama = $request->nama;
  $divisi = $request->divisi;
  $nomor = $request->nomor;
  $password = $request->password; 
  $pass = Hash::make($password);
  $dept_kode =$request->dept_kode;


  $datakaryawan = [
   'nik' => $nik,
   'nama_lengkap' => $nama,
   'kode_dept' => $dept_kode,
   'no_hp' => $nomor,
   'password' => $pass
   
];
try
{
$simpan = db :: table('karyawan')-> insert($datakaryawan);
if($simpan){
  return Redirect::back()->with(['success'=>'data berhasil di simpan']);
} else{
   echo "gagal";
}


}

catch(\Exception $e)
{
  // dd($e);
  return Redirect::back()->with(['warning'=>'data gagal di simpan']);
}
}

public function profil(Request $request){
  $nik = Auth::guard('karyawan') ->user()->nik;
  $karyawan = DB::table('karyawan')->where('nik',$nik)->first();

  return view('karyawan.profil',compact('karyawan'));


}

public function updateprofil(Request $request){
  $nik = Auth::guard('karyawan') ->user()->nik;
  $nama_lengkap = $request->nama_lengkap;
  $no_hp = $request->no_hp;
  $password = $request->password;
  $pass = Hash::make($password);
  $karyawan = DB::table('karyawan')->where('nik',$nik)->first();
  if ($request->hasFile('foto')){
  $foto = $nik.".".$request->file('foto')->getClientOriginalExtension();
}
else{
  $foto =$karyawan->foto;
}
  if(empty($request->password)){
  $data = [
   'nama_lengkap' => $nama_lengkap,
   'no_hp' => $no_hp,
   'foto'=>$foto
  ];
}
  else{
    $data = [
      'nama_lengkap' => $nama_lengkap,
      'no_hp' => $no_hp,
      'password' => $pass,
      'foto'=>$foto
    ];
  }
  $simpan = db :: table('karyawan')->where('nik',$nik)-> update($data);
  if($simpan){
    if ($request->hasFile('foto')){
      $folderPath = "public/uploads/karyawan/";
      $request->file('foto')->storeAS($folderPath,$foto);
    }
    return Redirect::back()->with(['success'=>'data berhasil di simpan']);
  } else{
     echo "gagal";
  }
}

public function edit (Request $request){

  $nik = $request->nik;
  $datakaryawan = DB::table('karyawan')->where('nik',$nik)->first();
  $datadept = DB::table('departemen')->get();
  return view('karyawan.edit',compact('datakaryawan','datadept'));

 }

 public function update ($nik,Request $request){
  $nik = $request->nik;
  $nama = $request->nama;
  $nomor = $request->nomor;
  $password = $request->password; 
  $pass = Hash::make($password);
  $dept_kode =$request->dept_kode;

    $data = [
      'nama_lengkap' => $nama,
      'kode_dept' => $dept_kode,
      'no_hp' => $nomor,
      'password' => $pass   
    ];
    $simpan = db :: table('karyawan')->where('nik',$nik)-> update($data);
    if($simpan){
      return Redirect::back()->with(['success'=>'data berhasil di simpan']);
    } else{
       echo "gagal";
    }

 }

}

