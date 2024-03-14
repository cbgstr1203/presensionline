@extends('layout.admin.tabler')
@section('content')



<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-item-center">
      <div class="col">
        <h2 class="page-title">Monitoring presensi</h2>
      </div>
    </div>
   </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                 <div class="form-group">
                 <span class="input-icon-addon">
          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                </span>
        <input id="tanggal" type="text" value="" class="form-control" placeholder="Pilih tanggal">
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
         <table class="table table-striped table-haver">
          <thead>
            <tr>
              <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
              </th>
             
              <th><button class="table-sort" data-sort="sort-tanggal">Tanggal</button></th>
              <th><button class="table-sort" data-sort="sort-nama">Nik</button></th>
              <th><button class="table-sort" data-sort="sort-nama">Nama</button></th>
              <th><button class="table-sort" data-sort="sort-lokasi">Lokasi</button></th>
              <th><button class="table-sort" data-sort="sort-jam_masuk">Jam Masuk</button></th>
              <th><button class="table-sort" data-sort="sort-jam_keluar">Jam keluar</button></th>
              <th><button class="table-sort" data-sort="sort-foto_masuk">Lokasi Masuk</button></th>
              <th><button class="table-sort" data-sort="sort-foto_keluar">Lokasi Keluar</button></th>
              <th><button class="table-sort" data-sort="sort-foto_masuk">PIC</button></th>
              <th><button class="table-sort" data-sort="sort-foto_keluar">Keterangan</button></th>
            </tr>
          </thead>
          <tbody id="load"> </tbody>
        </table>
      </div>
      </div>
  </div>

  
</div>
</div>
</div>
</div>


@endsection

@push('myscriptt')
<script>
$(function () {
  $("#tanggal").datepicker({
        autoclose: true, 
        todayHighlight: true,
        format: 'yyyy-mm-dd',
  }).datepicker("setDate",'now');
       $("#tanggal").change(function(e){
         var tanggal =$(this).val();
        $.ajax({
         type:'POST',
         url :'/getpresensi',
         data:{
          _token:"{{csrf_token ()}}"
          ,tanggal:tanggal
         }
         ,cache :false
         ,success : function(respond){
         $("#load").html(respond);
         }

      });


  });


});

 </script>   
@endpush