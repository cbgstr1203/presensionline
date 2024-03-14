<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 }
.tabledatakaryawan{
    margin-top: 10px;
    padding: 10px;
}
.tablepresensi{
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
   
}
.tablepresensi>tr,th{
    border: 2px solid #dfdcdc;
    padding: 10px;
    background-color: #a5a5a5
}
.tablepresensi>tr,td{
    padding: 10px;
}
.avatar{
    width: 80px;
    height: 80px;
}
body.A4.landscape .sheet {
    width: 297mm !important;
    height: auto  !important;
}

</style>


</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">



  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

   <table style="width: 100%" >
    <tr>
        <td>
            <img src="{{asset ('assets/img/pwl_logo.png')}}" width="150" height="100" alt="">
        </td>
        <td>
            <h2>
                LAPORAN PRESENSI DEPARTEMEN {{strtoupper($departemen->nama_dept)}}
                
            </h2>

        </td>
    </tr>
   </table>

   <table class="tabledatakaryawan">
    <tr>
        <td>
            DEPARTEMEN
        </td>
        <td>:</td>
        <td> {{strtoupper($departemen->nama_dept)}}</td>
    </tr>
    <tr>
        <td>
            PERIODE
        </td>
        <td>:</td>
        <td>{{strtoupper($namabulan[$bulan])}} {{$tahun}}</td>
    </tr>
   </table>
   <table class="tablepresensi">
    <tr>
    <th>No.</th>
    <th>Tanggal</th>
    <th>Nik</th>
    <th>Nama</th>
    <th>Depart</th>
    <th>Lokasi</th>
    <th>jam In</th>
    <th>Jam Out</th>
    <th>Pic</th>
    <th>Keterangan</th>
    </tr>
    @foreach ($presensi as $ad)
          @php
              $foto_masuk = Storage::url('uploads/absensi/'.$ad->FOTO_MASUK);
              $foto_keluar = Storage::url('uploads/absensi/'.$ad->FOTO_KELUAR);
             // $durasi = selisih ($ad->JAM_MASUK,$ad->JAM_KELUAR);
           //   $jamawal= $ad->JAM_MASUK;
             // $jamakhir= $ad->JAM_KELUAR; 
              //$durasi = $jamawal-$jamakhir;
              //$jam=floor($durasi/(60*60));
              //$menit = $durasi-$jam;
@endphp
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$ad->TANGGAL }}</td>
          <td >{{strtoupper($ad->NIK) }}</td>
          <td >{{$ad->NAMA }}</td>
          <td>{{strtoupper($ad->DEPT)}}</td>
          <td>{{strtoupper($ad->LOKASI) }}</td>
          <td> {{$ad->JAM_MASUK }}</td>
          <td> {{$ad->JAM_KELUAR != null ? $ad->JAM_KELUAR :'Tidak Absen'}}</td>
          <td>{{$ad->PIC}}</td>
          <td>{{$ad->KETERANGAN}}</td>
          </tr>
          @endforeach



   </table>

  </section>

</body>

</html>