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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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

<div class="col-12" style="margin-top:6rem">
<div class="card">
  <div class="card-body border-bottom py-3">
    <br />
    <div class="container box">
      <div class="d-flex">
        <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#inputkary">
         Tambah data
        </a>
    </div>
     <div class="panel panel-default">
      <div class="panel-heading">Search Customer Data</div>
      <div class="panel-body">
       <div class="form-group">
        <input type="text" name="search" id="cari" class="form-control" placeholder="Search Customer Data" />
       </div>
       <div class="table-responsive">
        <h4 align="center">Total Data Lokasi: <span id="total_records"></span></h4>
        <table class="table table-striped table-bordered">
         <thead>
          <tr>
           <th>Customer Name</th>
           <th>Address</th>
          </tr>
         </thead>
         <tbody>
  
         </tbody>
        </table>
        
       </div>
      </div>    
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
  
$(document).ready(function(){
fetch_customer_data();

function fetch_customer_data(query = '')
{
 $.ajax({
  url:"{{ route('addlokasi.action') }}",
  method:'GET',
  data:{query:query},
  dataType:'json',
  success:function(data)
  {
   $('tbody').html(data.table_data);
   $('#total_records').text(data.total_data);
  }
 })
}


$(document).on('keyup', '#cari', function(){
 var query = $(this).val();
 fetch_customer_data(query);
});
});

  </script>
  
  @endpush