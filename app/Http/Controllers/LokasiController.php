<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class LokasiController extends Controller
{
    public function lokasi (Request $request) {

        $datalokasi = DB::table('lokasi')
        -> paginate(10);
      return view('lokasi.lokasi',compact('datalokasi'));
       }

       public function addlokasi (Request $request) {

        $datalokasi = DB::table('lokasi')
        -> get();
      return view('lokasi.addlokasi',compact('datalokasi'));
       }


       public function store (Request $request)
       {
        $nama_lokasi = $request->nama_lokasi;
        $alamat = $request->alamat;
        $nomor_telepon = $request->nomor_telepon;

        $datalokasi = [
         'nama_lokasi' => $nama_lokasi,
         'alamat_lokasi' => $alamat,
         'telepon' => $nomor_telepon
        ];
try{
        $simpan = db :: table('lokasi')-> insert($datalokasi);
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


       public function action (Request $request)
       {
        if($request->ajax())
        {
         $output = '';
         $query = $request->get('query');
         if($query != '')
         {
          $data = DB::table('lokasi')
            ->where('nama_lokasi', 'like', '%'.$query.'%')
            ->get();
            
         }
         else
         {
          $data = DB::table('lokasi')
            ->get();
         }

         $total_row = $data->count();
         if($total_row > 0)
         {
          foreach($data as $row)
          {
           $output .= '
           <tr>
            <td>'.$row->nama_lokasi.'</td>
            <td>'.$row->alamat_lokasi.'</td>
           </tr>
           ';
          }
         }
         else
         {
          $output = '
          <tr>
           <td align="center" colspan="5">No Data Found</td>
          </tr>
          ';
         }
         $data = array(
          'table_data'  => $output,
          'total_data'  => $total_row
         );
   
         echo json_encode($data);
        }
        
       }
   
       public function edit (Request $request){

        $lokasi_id = $request->lokasi_id;
        $datalokasi = DB::table('lokasi')->where('lokasi_id',$lokasi_id)->first();
        return view('lokasi.edit',compact('datalokasi'));
      
       }
      
       public function update ($lokasi_id,Request $request){
        $lokasi_id = $request->lokasi_id;
        $alamat = $request->alamat;
        $kota = $request->kota;
        $nomor_telepon = $request->telepon;

        $data = [
         'alamat_lokasi' => $alamat,
         'kota'=> $kota,
         'telepon' => $nomor_telepon
        ];
          $simpan = db :: table('lokasi')->where('lokasi_id',$lokasi_id)-> update($data);
          if($simpan){
            return Redirect::back()->with(['success'=>'data berhasil di simpan']);
          } else{
             echo "gagal";
          }
      
       }

       public function delete($lokasi_id,Request $request){
        $lokasi_id = $request->lokasi_id;
        $delete = db :: table('lokasi')->where('lokasi_id',$lokasi_id)->delete();
       
        if($delete){
          return Redirect::back()->with(['success'=>'data berhasil di simpan']);
        } else{
           echo "gagal";
        }
        }
      


        
        }
        
        
