<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class UsersController extends Controller
{
    public function index (Request $request){

    $datauser = DB::table('users')-> get();
    return view('user.index',compact('datauser'));
  
}
   
  public function store(Request $request){
  $id = $request->id;
  $nama = $request->nama;
  $email = $request->email;
  $password = $request->password; 
  $pass = Hash::make($password);


  $datauser = [
   'id' => $id,
   'name' => $nama,
   'email' => $email,
   'password' => $pass
   
];
try
{
$simpan = db :: table('users')-> insert($datauser);
if($simpan){
  return Redirect::back()->with(['success'=>'data berhasil di simpan']);
} else{
   echo "gagal";
}


}

catch(\Exception $e)
{
  dd($e);
   //return Redirect::back()->with(['warning'=>'data gagal di simpan']);
}
}


}



