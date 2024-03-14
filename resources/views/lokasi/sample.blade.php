@extends('layout.presensi')
@section('header')

<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Daftar Lokasi</div>
    <div class="right"></div>
</div>

@endsection
@section('content')



<div id="inputkary" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h4 class="modal-title">Input Data Lokasi</h4>
</div>

<form action="/addlokasi/store" method="POST" id="simpanlokasi" enctype="multipart/form-data">
@csrf
<div class="modal-body">
<h3>Form Tambah Lokasi</h3>
<div class="form-group">
<label >ID Lokasi</label>
<input class="form-control" type="text"  name="id_lokasi"  id="id_lokasi" placeholder="Masukkan id lokasi">
</div>
<div class="form-group">
<label>Nama Lokasi</label>
<input class="form-control" type="text" name="nama_lokasi" id="nama_lokasi" placeholder="masukkan Nama lokasi">
</div>
<div class="form-group">
<label>Alamat</label>
<input class="form-control" type="text" name="alamat" id="alamat" placeholder="masukkan alamat ">
</div>
<div class="form-group">
<label>Nomor telepon</label>
<input class="form-control" type="text" name="nomor_telepon" id="nomor_telepon" placeholder="masukkan Nomor telepon">
</div>
     
      <button class="btn btn-danger btn-block">
          <ion-icon name="camera-outline"></ion-icon>
        Simpan
       </button> 
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
 </form>
</div>

<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List data Lokasi</h3>
    </div>
    <div class="card-body border-bottom py-3">
      <div class="d-flex">
          <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#inputkary">
           Tambah data
          </a>
      </div>
      <br>
        <div class="ms-auto text-secondary">
          Search:
          <div class="ms-2 d-inline-block">
            <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card">
  <div class="card-body border-bottom py-3">
  <div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
      <thead>
        <tr>
          <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
          </th>
          <th>Nama Lokasi</th>
          <th>Alamat</th>
          </tr>

      </thead>
      <tbody>
        <tr>
        <?php $no=1;?>
     @foreach ($datalokasi as $dl)
       <td>{{$no}}</td>
       <td>{{$dl->nama_lokasi }}</td>
       <td>{{$dl->alamat_lokasi }}</td>
        </tr>
          <?php $no++ ;?>
        @endforeach


    </table>
</div>
  </div>
</div>
</div>
</div>
</div>




@endsection
@push('myscript')

<script>
$(function(){

  $('#simpanlokasi').submit(function(){
         var id_lokasi =$("#id_lokasi").val();
         var nama_lokasi =$("#nama_lokasi").val();
         var alamat =$("#alamat").val();
         var nomor_telepon =$("#nomor_telepon").val();
  
  
        });
      });
  
  </script>
  
  @endpush