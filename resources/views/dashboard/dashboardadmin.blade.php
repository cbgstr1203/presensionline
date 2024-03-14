@extends('layout.admin.tabler')
@section('content')



<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-item-center">
      <div class="col">
        <h2 class="page-title">Dashboard presensi</h2>
      </div>
    </div>
   </div>
</div>

<div class="col-12">
  <div class="row row-cards">
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fingerprint" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3" /><path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6" /><path d="M12 11v2a14 14 0 0 0 2.5 8" /><path d="M8 15a18 18 0 0 0 1.8 6" /><path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95" /></svg> </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                {{$hitungabsen->count()}}
              </div>
              <div class="text-secondary">
                Total absen hari ini
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-location" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg></span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                {{$hitunglokasi->count()}}
              </div>
              <div class="text-secondary">
                Total Lokasi
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg></span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
               {{$hitungkaryawan->count()}}
              </div>
              <div class="text-secondary">
                Total Karyawan
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-office" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z" /></svg></span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                {{$hitungdepartemen->count()}}
              </div>
              <div class="text-secondary">
                Total Departemen
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="col-12">
  <div class="card">
    <form action="/panel/dashboardadmin" method="get">
      <div class="card-body border-bottom py-3">
        <div class="d-flex">
          <div class="ms-auto text-secondary">
            <div class="ms-2 d-inline-block">
            <input id="tanggal" type="text" value="{{Request('tanggal')}}" class="form-control" placeholder="Pilih tanggal" name="tanggal">
            </div>
            <div class="ms-2 d-inline-block">
              <input type="text" name="nama" class="form-control w-75 d-inline" id="nama" placeholder="Cari Nama" value="{{Request('nama')}}">
            </div>
            <div class="ms-2 d-inline-block">
              <select name="dept" id="dept" class="form-select" style="font-size: 16px"> 
              <option value="">Departemen</option>
              @foreach ($datadept as $k)
                  <option {{Request('dept')==$k->dept_kode?'selected':''}} value="{{$k ->dept_kode}}"> {{$k->nama_dept}}</option>
              @endforeach
          </select>
          </div>
          <button type="submit" class="btn btn-primary mb-1">Cari</button>
          </div>
        </div>
     
      
          </div>
          
      </div>
      </div>
      </form>
  
    <div class="table-responsive">
      <table class="table card-table table-vcenter text-nowrap datatable">
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
        <tbody>
          @foreach ($dashboard as $ad)
          @php
              $foto_masuk = Storage::url('uploads/absensi/'.$ad->FOTO_MASUK);
              $foto_keluar = Storage::url('uploads/absensi/'.$ad->FOTO_KELUAR);
          @endphp
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$ad->TANGGAL }}</td>
          <td >{{$ad->NIK }}</td>
          <td >{{$ad->NAMA }}</td>
          <td>{{$ad->LOKASI }}</td>
          <td>
              <a class="btn btn-success w-20">{{$ad->JAM_MASUK }}</a> 
              <a href="{{ url($foto_masuk)}}" class="avatar">
                  <img id="img_in"  href="{{ url($foto_masuk)}}" src="{{ url($foto_masuk)}}" class="avatar" alt="img_in"> 
                  <!-- Photo -->
                  <div class="img-responsive img-responsive-1x1 rounded border" style="background-image: {{ url($foto_masuk)}}"></div>
                  
              </a>
              </td>
          <td>
            <a class="btn btn-danger w-20" >{{$ad->JAM_KELUAR != null ? $ad->JAM_KELUAR :'Belum absen'}}</a>
            @if ($ad->JAM_KELUAR != null)
            <img id="img_in" src="{{ url($foto_keluar)}}" class="avatar" alt="img_in"> 
             @else
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.297 4.289a.997 .997 0 0 1 .703 -.289h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v8m-1.187 2.828c-.249 .11 -.524 .172 -.813 .172h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1c.298 0 .58 -.065 .834 -.181" /><path d="M10.422 10.448a3 3 0 1 0 4.15 4.098" /><path d="M3 3l18 18" /></svg>
             @endif
          
        </a>
          
              </td>
              <td>
                <a href="https://www.google.com/maps/place/+{{$ad->LOKASI_MASUK}}" target="_blank" class="btn btn-primary tampilkanpeta" >
               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" /><path d="M9 4v13" /><path d="M15 7v5.5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
                </a>
           </td>
           <td>
               <a href="https://www.google.com/maps/place/+{{$ad->LOKASI_MASUK}}" target="_blank" class="btn btn-primary tampilkanpeta2" >
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" /><path d="M9 4v13" /><path d="M15 7v5.5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
               </a>
           </td>
          <td>{{$ad->PIC}}</td>
          <td>{{$ad->KETERANGAN}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>

<div class="modal modal-blur fade" id="modal-tampilkanpeta" tabindex="-1" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lokasi presensi user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadmap">
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
  });
});
</script>
@endpush