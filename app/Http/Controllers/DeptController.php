<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DeptController extends Controller
{
   
 public function index (Request $request){

    $datadept = DB::table('departemen')->get();
    return view('departemen.index',compact('datadept'));

   // dd($datadept);
 }


 public function store (Request $request)
 {
  $kode_dept = $request->kode_dept;
  $nama_dept = $request->nama_dept;
  

  $datadept = [
   'dept_kode' => $kode_dept,
   'nama_dept' => $nama_dept,
   
  ];
try{
  $simpan = db :: table('departemen')-> insert($datadept);
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

 public function edit (Request $request){

  $dept_kode = $request->dept_kode;
  $datadept = DB::table('departemen')->where('dept_kode',$dept_kode)->first();
  return view('departemen.edit',compact('datadept'));

 }
 public function update ($dept_kode,Request $request){

  $dept_kode = $request->dept_kode;
 // $kode_dept = $request->kode_dept;
  $nama_dept = $request->nama_dept;
    $data = [
     'nama_dept' => $nama_dept
    ];
    $simpan = db :: table('departemen')->where('dept_kode',$dept_kode)-> update($data);
    if($simpan){
      return Redirect::back()->with(['success'=>'data berhasil di simpan']);
    } else{
       echo "gagal";
    }

 }

 public function delete($dept_kode,Request $request){
 $dept_kode = $request->dept_kode;
 $delete = db :: table('departemen')->where('dept_kode',$dept_kode)->delete();

 if($delete){
   return Redirect::back()->with(['success'=>'data berhasil di simpan']);
 } else{
    echo "gagal";
 }
 }
  

}
